<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guru extends Model
{
    use HasFactory;

    protected $table = "guru";

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nama_guru',
        'status',
        'mapel_id',
        'detail_guru_id',
        'thn_bertugas'
    ];
}
