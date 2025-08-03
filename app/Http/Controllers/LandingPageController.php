<?php

namespace App\Http\Controllers;

use App\Models\TipeSepatu;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function formPemesanan(Request $request)
    {
        // Ambil data request
        $namaPelanggan  = $request->input('nama_pelanggan');
        $noPelanggan    = $request->input('no_pelanggan');
        $tipeSepatuId   = $request->input('tipe_sepatu_id');
        $jumlah         = (int) $request->input('jumlah', 1);
        $diskon         = (float) $request->input('diskon', 0);
        $alamat         = $request->input('alamat');
        $latitude       = $request->input('latitude');
        $longitude      = $request->input('longitude');

        // Buat nomor nota unik
        $nomorNota = 'CS-' . now()->format('Ymd') . mt_rand(1000, 9999);

        // Ambil harga tipe sepatu
        $tipeSepatu = TipeSepatu::findOrFail($tipeSepatuId);
        $harga      = $tipeSepatu->harga;

        // Hitung total bayar
        $totalBayar = ($harga * $jumlah) - $diskon;

        // Simpan ke database
        $transaksi = new Transaksi([
            'nota'           => $nomorNota,
            'nama_pelanggan' => $namaPelanggan,
            'no_pelanggan'   => $noPelanggan,
            'tipe_sepatu_id' => $tipeSepatuId,
            'jumlah'         => $jumlah,
            'diskon'         => $diskon,
            'total_bayar'    => $totalBayar,
            'alamat'         => $alamat,
            'latitude'       => $latitude,
            'longitude'      => $longitude,
            'tgl_masuk'      => now(),
        ]);
        $transaksi->save();

        // Format pesan WhatsApp
        $pesan = "*Form Pemesanan Cuci Sepatu*\n";
        $pesan .= "Nama: $namaPelanggan\n";
        $pesan .= "No. WA: $noPelanggan\n";
        $pesan .= "Tipe Layanan: {$tipeSepatu->tipe_sepatu} (Rp $harga)\n";
        $pesan .= "Jumlah Sepatu: $jumlah\n";
        if ($diskon > 0) {
            $pesan .= "Diskon: Rp $diskon\n";
        }
        $pesan .= "Total Bayar: Rp $totalBayar\n";
        $pesan .= "Alamat: $alamat\n";
        if ($latitude && $longitude) {
            $pesan .= "Lokasi: https://www.google.com/maps?q=$latitude,$longitude\n";
        }
        $pesan .= "Nota: $nomorNota";

        // Encode pesan dan redirect ke WhatsApp
        $pesanEncoded = urlencode($pesan);
        $noAdmin = '6285799857403'; // GANTI dengan nomor admin
        $waUrl = "https://wa.me/$noAdmin?text=$pesanEncoded";

        return redirect($waUrl);
    }
}
