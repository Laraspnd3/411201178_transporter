@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid ">
          <h1 class="display-5 fw-bold">Halo, {{ Auth::user()->name }} </h1>
          <h4>You are logged in!</h4>
          <p class="col-md-8 fs-4">Selamat datang di aplikasi <i>
            Transporter!
          </i> Jangan lupa untuk menggunakan fitur dengan bijaksana. Perhatikan bahwa kurir harus menginput data dengan benar</p>
         </div>
      </div>
</div>
@endsection
