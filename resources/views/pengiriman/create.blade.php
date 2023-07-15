@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Penambahan Pengiriman</h2><br />
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
    <form method="post" action="{{url('pengiriman')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">No Pengiriman:</label>
                <input type="text" class="form-control" name="no_pengiriman">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Tanggal:</label>
                <input type="date" class="form-control" name="tanggal">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mb-4">
                <label for="" class="form-label">Lokasi</label>
                <select class="form-select form-select-md" name="lokasi_id" id="lokasi_id">
                    @foreach($lokasis as $lok)
                    @php $i = 1;
                    
                    @endphp
                    <option value="{{$lok['id']}}">{{$lok['nama_lokasi']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mb-4">
                <label for="" class="form-label">Barang</label>
                <select class="form-select form-select-md" name="barang_id" id="">
                    @foreach($barangs as $lok)
                    <option value="{{$lok['id']}}">{{$lok['nama_barang']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Jumlah:</label>
                <input type="number" class="form-control" name="jumlah_barang">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Harga:</label>
                <input type="number" class="form-control" name="harga_barang">
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
                <button type="submit" class="btn btn-success" style="marginleft:38px">Tambahkan Pengiriman</button>
            </div>
        </div>
    </form>
</div>
@endsection
<script>
    
</script>