@extends('front')
@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                 <div class="container-fluid">Transaksi Penjualan Barang</div>
                <div class="card border-0 shadow rounded">
                    <div class="card-body"> 
                       
                        <table class="table table-bordered table-hover">
                        <tr class="bs-secondary-bg-rgb">
                            <th>ID</th>
                            <th>Nama</th>
                            <th>jumlah</th>
                            <th>Harga</th>
                            <th>gambar</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($barangs as $barang) 
                        <tr>
                            <td width="1%">{{$barang->idbarang}}</td>
                            <td width="40%">{{$barang->namabarang}}</td>
                            <td width="5%">{{$barang->jumlah}}</td>
                            <td width="5%">{{$barang->harga}}</td>
                            <td width="10%"><img src="{{ asset('storage/'.$barang->gambar) }}" alt="" height="100" width="100"></td>
                            <td width="4%">
                            <a href="{{ url('beli/'.$barang->idbarang) }}" class="btn btn-primary">Beli</a>
                            </td>
                        </tr>
                    </div>
                 </div>
            </div>
        </div>   
 @endforeach
  
 </table>
         <div class="d-flex justify-content-center mt-2">
            {{ $barangs->links() }}
        </div>
@endsection
