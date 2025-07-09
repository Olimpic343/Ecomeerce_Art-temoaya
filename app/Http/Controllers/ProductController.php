<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $products   = Product::with(['category', 'brand'])
                             ->orderBy('id', 'desc')
                             ->paginate(10); // 10 productos por página

        $categories = Category::all();
        $brands     = Brand::all();

        return view('admin.products.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'brand_id'    => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

          // Generar un slug único a partir del nombre
    $baseSlug = Str::slug($data['name']);

    // 2) Intentar usar ese slug; si ya existe, agregar sufijo numérico
    $slug     = $baseSlug;
    $counter  = 1;

    while (Product::where('slug', $slug)->exists()) {
        $slug = $baseSlug . '-' . $counter;
        $counter++;
    }

    $data['slug'] = $slug;

        Product::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Producto creado correctamente.');
    }


    public function show(string $id)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        // 1) Validar datos
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'slug'         => 'required|string|max:255|unique:products,slug,' . $product->id,
            'description'  => 'nullable|string',
            'category_id'  => 'required|exists:categories,id',
            'brand_id'     => 'required|exists:brands,id',
            'price'        => 'required|numeric|min:0',
            'price2'       => 'nullable|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'status'       => 'required|in:active,inactive',
            'image'        => 'nullable|image|max:5120',
        ]);

        // 2) Asignar campos
        $product->name        = $data['name'];
        $product->slug        = $data['slug'];
        $product->description = $data['description'] ?? $product->description;
        $product->category_id = $data['category_id'];
        $product->brand_id    = $data['brand_id'];
        $product->price       = $data['price'];
        $product->price2      = $data['price2'] ?? $product->price2;
        $product->stock       = $data['stock'];
        $product->status      = $data['status'];

        // 1) Generar el slug base
    $baseSlug = Str::slug($data['name']);

    // 2) Si cambió el nombre (o si quieres forzar el recálculo), buscamos un slug único
    if ($baseSlug !== $product->slug) {
        $slug    = $baseSlug;
        $counter = 1;

        // Mientras exista alguno distinto al producto actual, le añadimos sufijo
        while (
            Product::where('slug', $slug)
                   ->where('id', '<>', $product->id)
                   ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $data['slug'] = $slug;
    } else {
        // Si el slug no cambió (por ejemplo no cambiaste el nombre), lo dejamos igual
        $data['slug'] = $product->slug;
    }

        // 3) Si suben imagen, procesarla
        if ($request->hasFile('image')) {
            // (a) Borrar imagen anterior
            if ($product->image && \Storage::disk('public')->exists($product->image)) {
                \Storage::disk('public')->delete($product->image);
            }
            // (b) Guardar nueva imagen
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        // 4) Guardar cambios
        $product->save();

        // 5) Redirigir con mensaje flash
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Producto actualizado correctamente.');
    }







   public function destroy(Product $product)
{
    // Si existe imagen anterior, la borramos
    if ($product->image && \Storage::disk('public')->exists($product->image)) {
        \Storage::disk('public')->delete($product->image);
    }

    $product->delete();

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Producto eliminado correctamente.');
}



    public function details($id, $slug)
    {
        $product = Product::where('id', $id)
                          ->where('slug', $slug)
                          ->firstOrFail();

         $topSellingProducts = $this->getTopSellingProducts(6);

        return view('products.details', compact('product', 'topSellingProducts'));
    }


    public function getTopSellingProducts($limit = 6){

        return Product::withCount('orderItems')
        ->orderBy('order_items_count')
        ->take($limit)
        ->get();
    }


    public function shop(Request $request)
    {
        // Convertir las categorías en un array si están en formato "1,2,3"
        $categoriesFilter = $request->has('categories')
            ? explode(',', $request->input('categories'))
            : [];

        $brandsFilter = $request->has('brands')
            ? explode(',', $request->input('brands'))
            : [];

        $pricesFilter = $request->has('prices')
            ? explode(',', $request->input('prices'))
            : [];

        $ratingsFilter = $request->has('ratings')
            ? explode(',', $request->input('ratings'))
            : [];

        $search = $request->input('search'); // Obtener texto de búsqueda

        // Consultar productos con filtro de categorías múltiple
        $products = Product::with('category')
            ->when(!empty($categoriesFilter), function ($query) use ($categoriesFilter) {
                return $query->whereIn('category_id', $categoriesFilter);
            })
            ->when(!empty($brandsFilter), function ($query) use ($brandsFilter) {
                return $query->whereIn('brand_id', $brandsFilter);
            })
            ->when(!empty($pricesFilter), function ($query) use ($pricesFilter) {
                return $query->where(function ($q) use ($pricesFilter) {
                    foreach ($pricesFilter as $priceRange) {
                        [$min, $max] = explode('-', $priceRange);
                        $q->orWhereBetween('price', [(int)$min, (int)$max]);
                    }
                });
            })
            ->when(!empty($ratingsFilter), function ($query) use ($ratingsFilter) {
                return $query->whereIn('id', function ($subQuery) use ($ratingsFilter) {
                    $subQuery->select('product_id')
                        ->from('reviews')
                        ->groupBy('product_id')
                        ->havingRaw('AVG(rating) IN (' . implode(',', array_map('intval', $ratingsFilter)) . ')');
                });
            })
            ->when(!empty($search), function ($query) use ($search) {
                return $query->where('name', 'LIKE', "%{$search}%");
            })
            ->paginate(12); // Se mantiene la paginación

        // Obtener todas las categorías para los filtros
        $categories = Category::all();
        $brands = Brand::all();

        return view('shop.index', compact('products','brands', 'categories', 'categoriesFilter', 'brandsFilter','pricesFilter','ratingsFilter', 'search'));
    }
}
