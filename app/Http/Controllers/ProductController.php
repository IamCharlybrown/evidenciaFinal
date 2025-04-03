<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Muestra todos los productos
    public function index()
    {
        // Traemos todos los productos, puedes modificarlo si deseas filtrar por algún criterio
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Muestra el formulario para crear un nuevo producto
    public function create()
    {
        return view('products.create');
    }

    // Almacena un nuevo producto en la base de datos
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
        ]);

        // Crear el producto
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description'=> $request->description,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto creado con éxito');
    }

    // Muestra el formulario para editar un producto
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Actualiza un producto en la base de datos
    public function update(Request $request, Product $product)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
        ]);

        // Actualizar el producto
        $product->update([
            'name' => $request->name,
            'price' => (float) $request->price,
            'stock' => $request->stock,
            'description' => $request->description,

        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto actualizado con éxito');
    }

    // Muestra los detalles de un producto
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Elimina un producto de la base de datos
    public function destroy(Product $product)
    {
        // Eliminar el producto
        $product->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto eliminado con éxito');
    }
}
