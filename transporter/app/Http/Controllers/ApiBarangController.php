<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class ApiBarangController extends Controller
{
    public function index()
    {
    $products = Barang::all();
    return response()->json(['message' => 'Successfully fetched products', 'data'
    => $products], 200);
    }
    public function store(Request $request)
    {
    $product = Barang::create($request->all());
    return response()->json(['message' => 'Product successfully created', 'data'
    => $product], 201);
    }
    public function show(Barang $product)
    {
    return response()->json(['message' => 'Successfully fetched product', 'data'
    => $product], 200);
    }
    public function update(Request $request, Barang $product)
    {
    $product->update($request->all());
    return response()->json(['message' => 'Product successfully updated', 'data'
    => $product], 200);
    }
    public function destroy(Barang $product)
    {
    $product->delete();
    return response()->json(['message' => 'Product successfully deleted'], 200);
    }
}
