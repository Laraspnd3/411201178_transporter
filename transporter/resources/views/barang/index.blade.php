@extends('layouts.app')

@section('content')

<div class="container">
    <br />
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @endif
    <a class="btn btn-primary mb-2" href="{{url('barang/create')}}">Tambah Barang</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach($products as $product)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$product['kode_barang']}}</td>
                <td>{{$product['nama_barang']}}</td>
                <td>{{$product['stok_barang']}}</td>
                <td>{{$product['harga_barang']}}</td>
                <td><a href="{{action('BarangController@edit', $product['id'])}}" class="btn btn-warning">Ubah</a></td>
                <td>
                    <form action="{{action('BarangController@destroy',$product['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
