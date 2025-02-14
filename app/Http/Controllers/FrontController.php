<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::paginate(5);
        $logins = Petugas::all();
        if (session()->missing('idpetugas')) {
            return view('login', [
                'logins' => $logins
            ]);
        } else {
            return view('viewbarang', [
                'barangs' => $barangs,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function postlogin(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required|min:3',
        ]);
        $petugas = Petugas::where('username', $data)->first();
        if ($petugas) {
            if ($data['password'] == $petugas['password']) {

                // Membuat sesion pengganti login sukses
                $data = [
                    'idpetugas' => $petugas['idpetugas'],
                    'username' => $petugas['username'],
                ];
                $request->session()->put('idpetugas', $data);
                return redirect('/');
            } else {
                echo 'Password salah';
            }
        } else {
            echo 'username belum ada';
        }
    }

    public function create()
    {
        //
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
     * Display the specified resource.
     */
    public function show()
    {
        $barangs = Barang::paginate(5);
        return view('penjualan', compact('barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function logout()
    {
        //menghapus session
        session()->flush();
        return redirect('/');
    }
}
