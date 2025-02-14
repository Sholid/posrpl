@extends('front')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ url('addbarang') }}"><i class="fa fa-plus"></i> Tambah
                            barang</a><br><br>
                        <table class="table table-bordered table-hover">
                            <tr class="bs-secondary-bg-rgb">
                                <th>#ID</th>
                                <th>Nama</th>
                                <th>jumlah</th>
                                <th>Harga</th>
                                <th>gambar</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($barangs as $barang)
                                <tr>
                                    <td width="1%">{{ $barang->idbarang }}</td>
                                    <td width="40%">{{ $barang->namabarang }}</td>
                                    <td width="5%">{{ $barang->jumlah }}</td>
                                    <td width="5%">{{ $barang->harga }}</td>
                                    <td width="8%"><img src="{{ asset('storage/' . $barang->gambar) }}" alt=""
                                            height="80" width="80"></td>
                                    <td width="10%">
                                        <a href="/barang/ubah/{{ $barang->idbarang }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="/barang/hapus/{{ $barang->idbarang }}"
                                            onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
