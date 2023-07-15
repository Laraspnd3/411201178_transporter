@extends('layouts.app')

@section('content')

<div class="container">
    <br />
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @endif
    <a class="btn btn-primary mb-2" href="{{url('lokasi/create')}}">Tambah Lokasi</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Nama</th>
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
                <td>{{$product['kode_lokasi']}}</td>
                <td>{{$product['nama_lokasi']}}</td>
                <td><a href="{{action('LokasiController@edit', $product['id'])}}" class="btn btn-warning">Ubah</a></td>
                <td>
                    <form action="{{action('LokasiController@destroy',$product['id'])}}" method="post">
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
