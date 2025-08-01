<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeSepatu extends Model
{
    protected $fillable = ['tipe_sepatu', 'harga'];
    protected $table = 'tipe_sepatus';
}
