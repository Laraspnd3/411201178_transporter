<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Lokasi;
use App\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
{   
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $products = Pengiriman::all()->toArray();
        $lokasis = Lokasi::all()->toArray();
        $barangs = Barang::all()->toArray();
        return view('pengiriman.index', compact('products','lokasis','barangs'));
        }
    public function create() {
        $lokasis = Lokasi::all()->toArray();
        $barangs = Barang::all()->toArray();
        return view('pengiriman.create',compact('lokasis','barangs'));
    }
    
    public function store(Request $request) {

        $userId = $request->user()->id;
        $maxEntriesPerOption = 5;
    
        // $validator = Validator::make($request->all(), [
        //     'lokasi_id' => [
        //         'required',
        //         Rule::unique('table_name')->where(function ($query) use ($userId, $maxEntriesPerOption) {
        //             $query->where('user_id', $userId)
        //                 ->whereDate('created_at', now())
        //                 ->groupBy('lokasi_id')
        //                 ->havingRaw('COUNT(*) < ' . $maxEntriesPerOption);
        //         })
        //     ],
        // ]);

        $product = $this->validate(request(), [
            'no_pengiriman' => [
                'required',
                function ($attribute, $value, $fail) use ($userId) {
                    $existingData = DB::table('pengirimen')
                        ->where('no_pengiriman', $value)
                        ->exists();
    
                    if ($existingData) {
                        $fail('Nomor pengiriman tidak boleh sama.');
                    }
                },
            ],
            'tanggal' => 'required',
            'lokasi_id' => [
                'required',
                function ($attribute, $value, $fail) use ($userId, $maxEntriesPerOption) {
                    $entryCount = DB::table('pengirimen')
                        ->where('lokasi_id', $value)
                        ->whereDate('created_at', now())
                        ->count();
    
                    if ($entryCount > $maxEntriesPerOption) {
                        $fail('Batas entri harian telah tercapai untuk opsi ' . $value);
                    }
                },
            ],
            'barang_id' => 'required',
            'jumlah_barang' => 'required',
            'harga_barang' => 'required',
            'kurir_id' => 'required',
        // Aturan validasi lainnya
    ]
            
        );
        
        Pengiriman::create($product);
        return back()->with('success', 'Data Pengiriman Berhasil ditambahkan!');
    }
    
    public function edit($id) {
        $product = Pengiriman::find($id);
        $lokasis = Lokasi::all()->toArray();
        $barangs = Barang::all()->toArray();
        return view('pengiriman.edit',compact('product','id','lokasis','barangs'));
    }
    
    public function update(Request $request, $id) {
        $product = Pengiriman::find($id);
        $this->validate(request(), [
            'no_pengiriman' => 'required',
            'tanggal' => 'required',
            'lokasi_id' => 'required',
            'barang_id' => 'required',
            'jumlah_barang' => 'required',
            'harga_barang' => 'required',
            'kurir_id' => 'required',
        ]);
        
        $product->no_pengiriman = $request->get('no_pengiriman');
        $product->tanggal = $request->get('tanggal');
        $product->lokasi_id = $request->get('lokasi_id');
        $product->barang_id = $request->get('barang_id');
        $product->jumlah_barang = $request->get('jumlah_barang');
        $product->harga_barang = $request->get('harga_barang');
        $product->kurir_id = $request->get('kurir_id');
        $product->save();
        return redirect('pengiriman')->with('success','Data Pengiriman Berhasil Diperbarui');
    }

    public function destroy($id) {
        $product = Pengiriman::find($id);
        $product->delete();
        return redirect('pengiriman')->with('success','Data Pengiriman Berhasil dihapus');
        }
}
