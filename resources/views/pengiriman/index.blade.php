@extends('layouts.app')

@section('content')

<div class="container">
    <br />
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @endif
    <a class="btn btn-primary mb-2" href="{{url('pengiriman/create')}}">Tambah Pengiriman</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>No Pengiriman</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Kurir</th>
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
                <td>{{$product['no_pengiriman']}}</td>
                <td>{{$product['tanggal']}}</td>
                <td>{{$product['lokasi_id']}}</td>
                <td>{{$product['barang_id']}}</td>
                <td>{{$product['jumlah_barang']}}</td>
                <td>{{$product['harga_barang']}}</td>
                <td>{{$product['kurir_id']}}</td>
                <td>
                    @if(Auth::user()->id!=$product['kurir_id'])
                    <a href="{{action('PengirimanController@edit', $product['id'])}}" class="btn btn-warning" hidden>Ubah</a>

                    Tidak memliki akses
                    @else
                    <a href="{{action('PengirimanController@edit', $product['id'])}}" class="btn btn-warning" >Ubah</a>
                    @endif
                </td>
                <td>
                    @if(Auth::user()->id!=$product['kurir_id'])
                    <form action="{{action('PengirimanController@destroy',$product['id'])}}" method="post" hidden>
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                    Tidak memliki akses
                    @else
                    <form action="{{action('PengirimanController@destroy',$product['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
