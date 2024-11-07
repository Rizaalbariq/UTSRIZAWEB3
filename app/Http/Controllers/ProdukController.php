<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::paginate(10);
        return view('pages.products.index', compact('produk'));
    }

    // Method untuk menyimpan data produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:products',
            'name' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        Produk::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('produk.index')->with('success', 'Product added successfully!');
    }

    // Method untuk menampilkan data produk untuk diedit
    public function edit($id)
    {
        $product = Produk::findOrFail($id);
        return view('produk.edit', compact('product'));
    }

    // Method untuk memperbarui data produk yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:products,nim,' . $id,
            'name' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        $product = Produk::findOrFail($id);
        $product->update([
            'nim' => $request->nim,
            'name' => $request->name,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('produk.index')->with('success', 'Product updated successfully!');
    }

    // Method untuk menghapus data produk
    public function destroy($id)
    {
        $product = Produk::findOrFail($id);
        $product->delete();

        return redirect()->route('produk.index')->with('success', 'Product deleted successfully!');
    }
}
