<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function beli($idbarang)
    {
        // if(session()->missing('idpelanggan')){
        // return redirect('login');
        //  }
        $barang = Barang::where('idbarang', $idbarang)->first();

        // die();
        $cart = session()->get('cart', []);
        if (isset($cart[$idbarang])) {
            // dd($cart[$idbarang]);
            $cart[$idbarang]['jumlah']++;
        } else {
            $cart[$idbarang] = [
                'idbarang' => $idbarang,
                'namabarang' => $barang->namabarang,
                'harga' => $barang->harga,
                'jumlah' => 1,
            ];
            //  dd($idbarang);
        }
        session()->put('cart', $cart);
        // Meagtur redirect ke cart 
        return redirect('cart');
    }
    public function cart()
    {

        return  view('cart');
    }
    public function hapus($idbarang)
    {
        $cart = session()->get('cart');
        if (isset($cart[$idbarang])) {
            unset($cart[$idbarang]);
            session()->put('cart', $cart);
        }
        return redirect('cart');
    }
    public function batal()
    {
        session()->forget('cart');
        return redirect('/');
    }
    public function tambah($idbarang)
    {
        $cart = session()->get('cart');
        $cart[$idbarang]['jumlah']++;
        session()->put('cart', $cart);

        return redirect('cart');
    }
    public function checkout()
    {
        //  $idorder = date('YmdHms');
        //  $total = 0;

        //  foreach  (session('cart') as $key => $value){
        //      $data =[
        //          'idorder'=>$idorder,
        //          'idmenu'=>$value['idmenu'],
        //          'jumlah'=>$value['jumlah'],
        //          'hargajual'=>$value['harga'],
        //      ];
        //      $total = $total + ($value['jumlah'] * $value['harga']);
        //    Orderdetail::create($data);
        // }
        //      $tanggal = date('Y-m-d');
        //      $data =[
        //          'idorder' => $idorder,
        //          'idpelanggan' => session('idpelanggan')['idpelanggan'],
        //          'tglorder' => $tanggal,
        //          'total' => $total,
        //          'bayar' => 0,
        //          'kembali' => 0,

        //      ];
        //      Order::create($data);
        //      return redirect('logout');

    }
}
