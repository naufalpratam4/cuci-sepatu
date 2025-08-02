<?php

namespace App\Http\Controllers;

use App\Models\TipeSepatu;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function viewDataTransaksi()
    {
        $data = Transaksi::paginate(5);
        return view('admin.transaksi.dataTransaksi', compact('data'));
    }
    public function viewTambahTransaksi()
    {
        $tipeSepatu = TipeSepatu::all();
        return view('admin.transaksi', compact('tipeSepatu'));
    }

    public function tambahTransaksi(Request $request)
    {
        // Buat nomor nota unik
        $dateCode = Carbon::now()->format('Ymd');
        $random = mt_rand(1000, 9999);
        $nomorNota = 'CS-' . $dateCode . $random;

        // Ambil tipe sepatu dan harga
        $tipeSepatu = TipeSepatu::findOrFail($request->input('tipe_sepatu_id'));
        $harga = $tipeSepatu->harga;

        // Hitung total bayar
        $jumlah = $request->input('jumlah');
        $diskon = $request->input('diskon') ?? 0;
        $totalBayar = ($harga * $jumlah) - $diskon;

        // Simpan data transaksi
        $data = new Transaksi([
            'nota' => $nomorNota,
            'tipe_sepatu_id' => $tipeSepatu->id,
            'nama_pelanggan' => $request->input('nama_pelanggan'),
            'tgl_masuk' => $request->input('tgl_masuk'),
            'estimasi_selesai' => $request->input('estimasi_selesai'),
            'diskon' => $diskon,
            'jumlah' => $jumlah,
            'total_bayar' => $totalBayar,
            'no_pelanggan' => $request->input('no_pelanggan')
        ]);

        $data->save();

        return redirect('/admin/invoice/' . $data->id)->with('success', 'Berhasil menambahkan transaksi.');
    }
    public function invoice($id)
    {
        $transaksi = Transaksi::with('tipeSepatu')->findOrFail($id);

        return view('admin.transaksi.invoice', ['transaksi' => $transaksi]);
    }
    public function detailTransaksi($id)
    {
        $data = Transaksi::find($id);
        return view('admin.transaksi.detailTransaksi', compact('data'));
    }
    public function konfirmasiPesanan(Request $request, $id)
    {
        $data = Transaksi::find($id);
        $data->update([
            'is_acc' => $request->input('is_acc')
        ]);
        return redirect()->back()->with('success', 'Berhasil konfirmasi pesanan');
    }

    public function hapusTransaksi($id)
    {
        $data = Transaksi::findorfail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil hapus');
    }

    public function searchTransaksi(Request $request)
    {
        $query = Transaksi::query();

        if ($request->has('search')) {
            $query->where('nota', 'like', '%' . $request->search . '%');
        }

        $data = $query->paginate(5); // atau sesuai jumlah

        return view('admin.transaksi.dataTransaksi', compact('data'));
    }
}
