<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Detailtransaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use PhpParser\Node\Stmt\Echo_;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  view('penjualan');
        echo "datanya disini";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreTransaksiRequest $request)
    {
        $carts = session()->get('cart', []);
        $user = session()->get('idpetugas');

        $transaksi = new Transaksi();
        $transaksi->idpetugas = $user['idpetugas'];
        $transaksi->total = $request->total;
        $transaksi->kembali = $request->kembali;
        $transaksi->bayar = $request->bayar;
        $transaksi->save();

        $notrans = $transaksi->notrans;
        foreach ($carts as $item) {
            $detailtransaksi = new Detailtransaksi();
            $detailtransaksi->idbarang = $item['idbarang'];
            $detailtransaksi->notrans = $notrans;
            $detailtransaksi->harga = $item['harga'];
            $detailtransaksi->jumlah = $item['jumlah'];
            $detailtransaksi->save();
        }
        $carts = session()->forget('cart');
        return redirect('/penjualan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
