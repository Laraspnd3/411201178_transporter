<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DonutChart extends Component
{
    public function render()
    {
        $currentMonth = Carbon::now()->month;

        $data = DB::table('pengirimen')
            ->select('lokasi_id', DB::raw('SUM(jumlah_barang) as total_jumlah_barang'))
            ->whereMonth('tanggal', $currentMonth)
            ->groupBy('lokasi_id')
            ->havingRaw('SUM(jumlah_barang) > 100')
            ->get();

        $labels = $data->pluck('lokasi_id');
        $values = $data->pluck('total_jumlah_barang');

        return view('livewire.donut-chart', compact('labels', 'values'));
    }
}
