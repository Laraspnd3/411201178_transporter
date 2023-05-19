<?php

namespace App\Http\Controllers;

use App\Pengiriman;
use Illuminate\Http\Request;

class ApiPengirimanController extends Controller
{
    public function index()
    {
    $products = Pengiriman::all();
    return response()->json(['message' => 'Successfully fetched Pengiriman', 'data'
    => $products], 200);
    }
    public function store(Request $request)
    {
    $product = Pengiriman::create($request->all());
    return response()->json(['message' => 'Pengiriman berhasil dibuat', 'data'
    => $product], 201);
    }
    public function show(Pengiriman $product)
    {
    return response()->json(['message' => 'Successfully fetched Pengiriman', 'data'
    => $product], 200);
    }
    public function update(Request $request, Pengiriman $product)
    {
    $product->update($request->all());
    return response()->json(['message' => 'Pengirimaan Berhasil Diperbarui', 'data'
    => $product], 200);
    }
    public function destroy(Pengiriman $product)
    {
    $product->delete();
    return response()->json(['message' => 'Pengiriman berhasil dihapus'], 200);
    }
}
