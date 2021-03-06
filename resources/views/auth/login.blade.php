@extends('layouts.auth')

@section('content')

<section class="hold-transition login-page">
    <div class="login-box">

      <div class="card">
        <div class="card-body login-card-body">
          <div class="text-center mb-4 login-title">
            <span>Masuk ke aplikasi ARL Laundry</span>
          </div>
          <div class="text-center">
            <h5 class="text-black">Selamat datang di {{ config('app.name')}}</h5>
            <p class="description">anda bisa masuk menggunakan akun yang sudah diberikan manager</p>
          </div>

          <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus placeholder="username">
              @error('username')
                <span class="invalid-feedback bg-white text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="input-group mb-3">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
              @error('password')
                <span class="invalid-feedback bg-white text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="row">
                <div class="col mt-2">
                    <button type="submit" class="btn btn-login">masuk</button>
                </div>
            </div>
          </form>

        </div>

      </div>
    </div>
</section>

@endsection
