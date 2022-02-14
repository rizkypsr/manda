<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DetailSiswa extends Model
{
    use HasFactory;

    protected $table = "detail_siswa";

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tgl_lahir',
        'jns_kelamin',
        'agama',
        'alamat',
        'foto',
    ];
}
