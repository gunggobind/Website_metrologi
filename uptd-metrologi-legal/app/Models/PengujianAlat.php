<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengujianAlat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_pengujian_alat';
    protected $fillable = [
        'id',
        'pengujian_id',
        'jenis_uttp',
        'nama_alat',
        'kapasitas_skala_terkecil',
        'merk_model',
        'no_seri',
        'keterangan'
    ];

    protected $casts = [
        'id' => 'integer',
        'pengujian_id' => 'integer'
    ];
}
