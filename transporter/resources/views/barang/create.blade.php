@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Penambahan Barang</h2><br />
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
    <form method="post" action="{{url('barang')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Kode Barang:</label>
                <input type="text" class="form-control" name="kode_barang">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Nama Barang:</label>
                <input type="text" class="form-control" name="nama_barang">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" cols="46" rows="2"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Stok Barang:</label>
                <input type="number" class="form-control" name="stok_barang">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Harga Barang:</label>
                <input type="number" class="form-control" name="harga_barang">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="marginleft:38px">Tambahkan Barang</button>
            </div>
        </div>
    </form>
</div>
@endsection
