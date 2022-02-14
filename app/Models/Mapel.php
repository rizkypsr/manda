<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mapel extends Model
{
    use HasFactory;

    protected $table = "mapel";

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_mapel',
    ];
}
