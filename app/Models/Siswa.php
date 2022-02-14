<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswa";

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function detail_siswa()
    {
        return $this->belongsTo(DetailSiswa::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nama_siswa',
        'jurusan_id',
        'kelas_id',
        'detail_siswa_id',
        'detail_ayah_id',
        'detail_ibu_id',
        'angkatan'
    ];
}
