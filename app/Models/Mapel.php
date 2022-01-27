<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mapel extends Model
{
    use HasFactory;

    protected $table = "mapel";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Mapel',
        'nama_Mapel',
        'status',
        'id_mapel',
        'detail_Mapel_id',
        'thn_bertugas'
    ];
}
