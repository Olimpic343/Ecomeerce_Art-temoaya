<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.products.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:brands,name',
            'description' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['name']);
        Brand::create($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Marca creada correctamente.');
    }

    public function edit(Brand $brand)
    {
        return redirect()->route('admin.products.index');
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'description' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $brand->update($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Marca actualizada correctamente.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.products.index')
                         ->with('success', 'Marca eliminada correctamente.');
    }
}
