@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Edit Pengiriman</h2><br />
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
    <form method="post" action="{{action('PengirimanController@update',$id)}}">
        {{csrf_field()}}

        <input type="hidden" name="_method" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">No Pengiriman:</label>
                <input type="text" class="form-control" name="no_pengiriman" value="{{$product->no_pengiriman}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Tanggal:</label>
                <input type="date" class="form-control" name="tanggal" value="{{$product->tanggal}}">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mb-4">
                <label for="" class="form-label">Lokasi</label>
                <select class="form-select form-select-md" name="lokasi_id" id="">
                    <option value="{{$product->lokasi_id}}" selected>{{$product->lokasi_id}}</option>
                    @foreach($lokasis as $lok)
                    <option value="{{$lok['id']}}">{{$lok['id'].'. '.$lok['nama_lokasi']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mb-4">
                <label for="" class="form-label">Barang</label>
                <select class="form-select form-select-md" name="barang_id" id="">
                    <option value="{{$product->barang_id}}" selected>{{$product->barang_id}}</option>
                    @foreach($barangs as $lok)
                    <option value="{{$lok['id']}}">{{$lok['id'].'. '.$lok['nama_barang']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Jumlah:</label>
                <input type="number" class="form-control" name="jumlah_barang" value="{{$product->jumlah_barang}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Harga:</label>
                <input type="number" class="form-control" name="harga_barang" value="{{$product->harga_barang}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Kurir:{{Auth::user()->name}}</label>
                <input type="text" class="form-control" name="kurir_id" value="{{Auth::user()->id}}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="marginleft:38px">Perbarui Pengiriman</button>
            </div>
        </div>
    </form>
</div>
@endsection
