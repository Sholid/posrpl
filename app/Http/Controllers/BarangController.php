<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::paginate(5);
        return view('viewbarang', compact('barangs'));
    }
    public function addbarang(Request $request)
    {
        return view('addbarang');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // membuat validasi
        $data = $request->validate([
            'idbarang' => 'required',
            'namabarang' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            //   'gambar' => 'required',
        ]);
        // dd($data);
        $file = $request->file('gambar')->store('gambar', 'public');
        Barang::create([
            'idbarang' => $data['idbarang'],
            'namabarang' => $data['namabarang'],
            'jumlah' => $data['jumlah'],
            'harga' => $data['harga'],
            'gambar' => $file
        ]);
        return redirect('/');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
