<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['jurusan', 'kelas'])->get();

        return view('siswa', [
            "siswa" => $siswa
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
        $kelas = Kelas::all();

        return view('create-siswa', [
            "jurusan" => $jurusan,
            "kelas" => $kelas
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
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'angkatan' => 'required',
        ]);

        $siswa = new Siswa();

        $siswa->id = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jurusan_id = $request->jurusan_id;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->angkatan = $request->angkatan;

        $siswa->save();

        return redirect()->route('siswa.index')
            ->with('success', 'Berhasil menambahkan data siswa');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $siswa = Siswa::find($id);
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();

        return view('edit-siswa', [
            "siswa" => $siswa,
            "jurusan" => $jurusan,
            "kelas" => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'angkatan' => 'required',
        ]);

        $siswa = Siswa::find($id);

        $siswa->id = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jurusan_id = $request->jurusan_id;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->angkatan = $request->angkatan;

        $siswa->save();

        return redirect()->route('siswa.index')
            ->with('success', 'Berhasil memperbaharui data siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Siswa::destroy($id);

        return redirect()->route("siswa.index")->with('success', 'Berhasil menghapus data siswa');
    }
}
