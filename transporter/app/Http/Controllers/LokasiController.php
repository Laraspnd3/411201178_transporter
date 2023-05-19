<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $products = Lokasi::all()->toArray();
        return view('lokasi.index', compact('products'));
        }
    public function create() {
        return view('lokasi.create');
    }
    
    public function store(Request $request) {
        $product = $this->validate(request(), [
            'kode_lokasi' => 'required',
            'nama_lokasi' => 'required',
        ]);
        Lokasi::create($product);
        return back()->with('success', 'Lokasi Berhasil ditambahkan!');
    }
    
    public function edit($id) {
        $product = Lokasi::find($id);
        return view('lokasi.edit',compact('product','id'));
    }
    
    public function update(Request $request, $id) {
        $product = Lokasi::find($id);
        $this->validate(request(), [
            'kode_lokasi' => 'required',
            'nama_lokasi' => 'required',
        ]);
        $product->nama_lokasi = $request->get('nama_lokasi');
        $product->kode_lokasi = $request->get('kode_lokasi');
        $product->save();
        return redirect('lokasi')->with('success','Lokasi Berhasil Diperbarui');
    }

    public function destroy($id) {
        $product = Lokasi::find($id);
        $product->delete();
        return redirect('lokasi')->with('success','Lokasi Berhasil dihapus');
        }
}
