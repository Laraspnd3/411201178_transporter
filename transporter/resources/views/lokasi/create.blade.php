@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Penambahan Lokasi</h2><br />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @endif
    <form method="post" action="{{url('lokasi')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Kode Lokasi:</label>
                <input type="text" class="form-control" name="kode_lokasi">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Nama Lokasi:</label>
                <input type="text" class="form-control" name="nama_lokasi">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="marginleft:38px">Tambahkan Lokasi</button>
            </div>
        </div>
    </form>
</div>
@endsection
