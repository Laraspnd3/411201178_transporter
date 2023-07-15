<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Lokasi;
use App\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        
        $currentMonth = Carbon::now()->month;

        $chartData = Pengiriman::join('lokasis', 'pengirimen.lokasi_id', '=', 'lokasis.id')
        ->select('lokasis.nama_lokasi', DB::raw('SUM(pengirimen.jumlah_barang) as total_barang'))
        ->whereMonth('pengirimen.tanggal', $currentMonth)
        ->groupBy('lokasis.nama_lokasi')
        ->having('total_barang', '>', 100)
        ->get();

        $dataPoints = [];
        foreach ($chartData as $data) { 
            $dataPoints[] = [
                "name" => $data['nama_lokasi'],
                "y" => floatval($data['total_barang'])
            ];
        }

        $startDate = Carbon::now()->subYear();
        $endDate = Carbon::now();

        $dataBarang = Barang::where('harga_barang', '>', 1000)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $dataPoints2 = [];
        foreach ($dataBarang as $data) { 
            $dataPoints2[] = [
                "name" => $data['nama_barang'],
                "y" => floatval($data['stok_barang'])
            ];
        }

        $today = Carbon::now();
        $duaBelasBulanLalu = $today->subMonths(12);

        $totalPengiriman = DB::table('pengirimen')
            ->where('tanggal', '>=', $duaBelasBulanLalu)
            ->sum('jumlah_barang');

            // Menghitung tanggal 1 bulan yang lalu dari sekarang
        $tanggalSatuBulanLalu = Carbon::now()->subMonth()->toDateString();

        // Mendapatkan jumlah pengiriman per lokasi selama 1 bulan terakhir
        $lokasiTerbanyak = Pengiriman::select('lokasi_id', DB::raw('count(*) as total'))
            ->where('tanggal', '>=', $tanggalSatuBulanLalu)
            ->groupBy('lokasi_id')
            ->orderByDesc('total')
            ->first();

        if ($lokasiTerbanyak) {
            $lokasi = Lokasi::find($lokasiTerbanyak->lokasi_id);
            $namaLokasiTerbanyak = $lokasi->nama_lokasi;
        } else {
            $namaLokasiTerbanyak = 'Tidak ada data pengiriman dalam 1 bulan terakhir.';
        }

        $currentDate = Carbon::now();

        // Mengurangi 3 bulan dari tanggal saat ini
        $s3Bulan = $currentDate->subMonths(3);

        // Menjalankan query untuk menghitung total pengiriman dalam 3 bulan terakhir
        $totalPengiriman3Bulan = DB::table('pengirimen')
            ->where('tanggal', '>=', $s3Bulan)
            ->count();

        return view('home',  ["data" => json_encode($dataPoints),"data2" => json_encode($dataPoints2), "total"=>$totalPengiriman,
                    'lokasiTerbanyak'=>$namaLokasiTerbanyak,'totalLokasi'=>$lokasiTerbanyak->total,'total3Bulan'=>$totalPengiriman3Bulan]);

    }
}
