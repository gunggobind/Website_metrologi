<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengujian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_pengujian';
    protected $fillable = [
        'id',
        'nomor_pengujian',
        'alat_ukur_yang_diuji',
        'pemilik',
        'alamat_pemilik',
        'tanggal_pengujian',
        'metoda_pengujian',
        'standar_pengujian',
        'hasil_pengujian',
        'berlaku_sampai_dengan',
        'telepon',
        'harga'
    ];

    protected $casts = [
        'id' => 'integer',
        'harga' => 'integer',
        
    ];

    protected $with = [
        'penguji',
        'alat'
    ];

    public function penguji(){
        return $this->hasMany('App\Models\PengujianPenguji','pengujian_id');
    }

    public function alat(){
        return $this->hasMany('App\Models\PengujianAlat','pengujian_id');
    }
}
