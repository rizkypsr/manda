<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with(['jurusan'])->get();

        return view('kelas', [
            "kelas" => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $jurusan = Jurusan::all();

        return view('create-kelas', [
            "jurusan" => $jurusan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'semester' => 'required',
            'thn_ajaran' => 'required',
            'jurusan' => 'required',
        ]);

        $kelas = new Kelas();

        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->semester = $request->semester;
        $kelas->thn_ajaran = $request->thn_ajaran;
        $kelas->jurusan_id = $request->jurusan;

        $kelas->save();

        return redirect()->route('kelas.index')
            ->with('success', 'Berhasil menambahkan data kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route("kelas.index")->with('success', 'Berhasil menghapus data kelas');
    }
}
