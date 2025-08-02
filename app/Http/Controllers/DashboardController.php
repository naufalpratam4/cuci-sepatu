<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $tipeSepatu = Transaksi::with('tipeSepatu')->get();
    $totalTransaksi = Transaksi::count();
    $diterima = Transaksi::where('is_acc', 'Disetujui')->count();
    $ditolak = Transaksi::where('is_acc', 'Ditolak')->count();
    $totalPemasukan = Transaksi::where('is_acc', 'Disetujui')->sum('total_bayar'); // asumsi ada field total
    $transaksiTerkini = Transaksi::latest()->take(5)->get();

    $monthlyTransaksi = Transaksi::selectRaw('MONTH(tgl_masuk) as bulan, COUNT(*) as total')
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

    return view('admin.dashboard', compact(
        'totalTransaksi', 'diterima', 'ditolak', 'monthlyTransaksi', 'totalPemasukan', 'transaksiTerkini', 'tipeSepatu'
    ));
}

}
