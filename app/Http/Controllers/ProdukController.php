<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;
use Illuminate\Http\RedirectResponse;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::latest()->paginate(10);
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'required|string',
            'harga_produk' => 'required|numeric',
            'stock_produk' => 'required|integer',
            'foto_produk' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $image = $request->file('foto_produk');
        $image->storeAs('produk', $image->hashName());

        ProdukModel::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk,
            'stock_produk' => $request->stock_produk,
            'foto_produk' => $image->hashName(),
        ]);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $produk = ProdukModel::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

}
