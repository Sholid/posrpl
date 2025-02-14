@extends('front')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            {{-- Panggil Routes Postlogin --}}
            <form action="{{ url('/postlogin') }}" method="post">
                @csrf
                <div class="mt-2">
                    <label class="form-label">Username</label>
                    <input class="form-control" value="{{ old('username') }}" type="username" name="username" id="">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-2">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" id="">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
