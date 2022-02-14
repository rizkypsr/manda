<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
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

    public function detail(int $id)
    {
        $siswa = Siswa::with(['detail_siswa'])->where('kelas_id', $id)->get();

        return view('detail-kelas', [
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

        return response()->json([
            'data' => $jurusan
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $kelas = Kelas::find($id);
        $jurusan = Jurusan::all();

        return view('edit-kelas', [
            "kelas" => $kelas,
            "jurusan" => $jurusan
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
            'nama_kelas' => 'required',
            'semester' => 'required',
            'thn_ajaran' => 'required',
            'jurusan' => 'required',
        ]);

        $kelas = Kelas::find($id);

        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->semester = $request->semester;
        $kelas->thn_ajaran = $request->thn_ajaran;
        $kelas->jurusan_id = $request->jurusan;

        $kelas->save();

        return redirect()->route('kelas.index')
            ->with('success', 'Berhasil memperbaharui data kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Kelas::destroy($id);

        return redirect()->route("kelas.index")->with('success', 'Berhasil menghapus data kelas');
    }
}
