<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Illuminate\Http\Request;

class ApiLokasiController extends Controller
{
    public function index()
    {
    $products = Lokasi::all();
    return response()->json(['message' => 'Successfully fetched Lokasi', 'data'
    => $products], 200);
    }
    public function store(Request $request)
    {
    $product = Lokasi::create($request->all());
    return response()->json(['message' => 'Lokasi berhasil dibuat', 'data'
    => $product], 201);
    }
    public function show(Lokasi $product)
    {
    return response()->json(['message' => 'Successfully fetched Lokasi', 'data'
    => $product], 200);
    }
    public function update(Request $request, Lokasi $product)
    {
    $product->update($request->all());
    return response()->json(['message' => 'Pengirimaan Berhasil Diperbarui', 'data'
    => $product], 200);
    }
    public function destroy(Lokasi $product)
    {
    $product->delete();
    return response()->json(['message' => 'Lokasi berhasil dihapus'], 200);
    }
}
