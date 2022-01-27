<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Informasi;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $informasi = Informasi::where('status', 1)->orderBy('updated_at')->get();
        $guru = Guru::all();
        $mapel = Mapel::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();

        return view('dashboard', [
            "informasi" => $informasi,
            "guru" => $guru->count(),
            "mapel" => $mapel->count(),
            "siswa" => $siswa->count(),
            "kelas" => $kelas->count(),
        ]);
    }
}
