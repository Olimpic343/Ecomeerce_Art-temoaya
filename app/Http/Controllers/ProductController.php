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
       $products = Product::latest()->paginate(10);
    $brands   = Brand::all();           // <— añadimos marcas
     $categories = Category::all();
    return view('admin.products.index', compact('products','brands','categories'));
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
    $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                                  ->store('products', 'public');
        }

        Product::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Producto creado correctamente.');
    }

   public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('admin.products.edit', compact('product','brands'));
    }
    public function show(string $id)
    {
        //
    }


   public function update(Request $request, Product $product)
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

         $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image')) {
            // Borra imagen anterior si existe
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')
                                  ->store('products', 'public');
        }

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Producto actualizado correctamente.');
    }



    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
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
