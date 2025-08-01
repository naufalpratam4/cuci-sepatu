<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TipeSepatu;
class Transaksi extends Model
{
    protected $fillable = ['tipe_sepatu_id', 'nota', 'nama_pelanggan', 'tgl_masuk', 'estimasi_selesai','status_bayar', 'diskon', 'jumlah', 'total_bayar' ];
    protected $table = 'transaksis';

    public function tipeSepatu(){
       return $this->belongsTo(TipeSepatu::class);
    }
}
