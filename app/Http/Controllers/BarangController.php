<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $products = Barang::all()->toArray();
        return view('barang.index', compact('products'));
        }
    public function create() {
        return view('barang.create');
    }
    
    public function store(Request $request) {
        $product = $this->validate(request(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'stok_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric'
        ]);
        Barang::create($product);
        return back()->with('success', 'Barang berhasil ditambahkan!');
    }
    
    public function edit($id) {
        $product = Barang::find($id);
        return view('barang.edit',compact('product','id'));
    }
    
    public function update(Request $request, $id) {
        $product = Barang::find($id);
        $this->validate(request(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'stok_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric'
        ]);
        $product->nama_barang = $request->get('nama_barang');
        $product->kode_barang = $request->get('kode_barang');
        $product->deskripsi = $request->get('deskripsi');
        $product->harga_barang = $request->get('harga_barang');
        $product->stok_barang = $request->get('stok_barang');
        $product->save();
        return redirect('barang')->with('success','Barang Berhasil Diperbarui');
    }

    public function destroy($id) {
        $product = Barang::find($id);
        $product->delete();
        return redirect('barang')->with('success','Barang berhasil dihapus');
        }
}
