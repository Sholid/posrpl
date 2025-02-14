@extends('front')

@section('content')
    @if (session('cart'))
        <div>
            <div>
                <a class="btn btn-danger" href="{{ url('batal') }}">Batal</a>
            </div>
            @php
                $total = 0;
            @endphp
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('cart') as $ibarang => $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang['namabarang'] }}</td>
                            <td>{{ $barang['harga'] }}</td>
                            <td>
                                <span><a href="{{ url('kurang/' . $barang['idbarang']) }}">[-]</a></span>
                                {{ $barang['jumlah'] }}
                                <span><a href="{{ url('tambah/' . $barang['idbarang']) }}">[+]</a></span>
                            </td>
                            <td>{{ $barang['jumlah'] * $barang['harga'] }}</td>
                            <td><a href="{{ url('hapus/' . $barang['idbarang']) }}">Hapus</a></td>

                        </tr>

                        @php

                            $total += $barang['jumlah'] * $barang['harga'];
                        @endphp
                    @endforeach

                    <tr>
                        <td colspan="4">Total Pembayaran</td>
                        <td id="kolom-tot">{{ $total }}</td>
                    </tr>

                </tbody>
            </table>

            {{-- form pembayaran --}}
            <form action="{{ route('cart.simpan') }}" method="POST">
                @csrf
                @method('POST')
                <div class="d-flex justify-content-left flex-column">
                    <div class="mx-2">
                        <label class="form-label " for="">Bayar :</label>
                        <input id="kolom-bayar" class="form-control" oninput="hitungKembalian()" style="width: 25%"
                            value="{{ old('bayar') }}" type="text" name="bayar" id="">
                        {{-- <span class="text-danger">
                        @error('bayar')
                            {{ $message }}
                        @enderror
                    </span> --}}
                    </div>
                    <div class="mx-2">
                        <label class="form-label " for="kembali">Kembali :</label>
                        <input id="kolom-kembali" class= "form-control" style="width: 25%" value="{{ old('kembali') }}"
                            type="text" name="kembali" id="">
                        {{-- <span class="text-danger">
                        @error('kembali')
                            {{ $message }}
                        @enderror
                    </span> --}}


                        <div class="mt-2">

                            <input type="hidden" name="total" value="{{ $total }}" />
                            <button class="btn btn-primary" type="submit">Checkout</button>
                        </div>
                    </div>
                </div>
            </form>
        @else
            <script>
                window.location.href = "/";
            </script>
    @endif
    <script>
        const kolom_bayar = document.getElementById('kolom-bayar');
        const kolom_total = document.getElementById('kolom-tot');
        const kolom_kembali = document.getElementById('kolom-kembali');

        function hitungKembalian() {
            kolom_kembali.value = kolom_bayar.value - kolom_total.innerHTML;
            // kolom_kembali.value = 0;
        }
    </script>
@endsection
