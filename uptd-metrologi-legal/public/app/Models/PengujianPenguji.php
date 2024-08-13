<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengujianPenguji extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_pengujian_penguji';
    protected $fillable = [
        'id',
        'pengujian_id',
        'nama',
        'nip',
    ];

    protected $casts = [
        'id' => 'integer',
        'pengujian_id' => 'integer'
    ];
}
