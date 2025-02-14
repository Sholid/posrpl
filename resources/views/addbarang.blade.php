@extends('front')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ url('/postbarang') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-2">
                                <label class="form-label" for="">ID Barang</label>
                                <input class="form-control" value="{{ old('idbarang') }}" type="text" name="idbarang"
                                    id="">
                                <span class="text-danger">
                                    @error('idpenggan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mt-2">
                                <label class="form-label for="">Nama Barang</label>
                                <input class="form-control" value="{{ old('namabarang') }}" type="text" name="namabarang"
                                    id="">
                                <span class="text-danger">
                                    @error('namabarang')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mt-2">
                                <label class="form-label for="">Jumlah</label>
                                <input class="form-control" value="{{ old('jumlah') }}" type="text" name="jumlah"
                                    id="">
                                <span class="text-danger">
                                    @error('jumlah')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mt-2">
                                <label class="form-label for="">Harga</label>
                                <input class="form-control" value="{{ old('harga') }}" type="text" name="harga"
                                    id="">
                                <span class="text-danger">
                                    @error('harga')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mt-2">
                                <label class="form-label for="">Gambar</label>
                                <input class="form-control" value="" type="file" name="gambar" id="">
                                <span class="text-danger">
                                    @error('gambar')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mt-4 mb-2">
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
