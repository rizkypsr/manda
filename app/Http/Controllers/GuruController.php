<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with(["mapel"])->get();

        return view('guru', [
            "guru" => $guru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();

        return view('create-guru', [
            "mapel" => $mapel
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
            'nip' => 'required',
            'nama_guru' => 'required',
            'status' => 'required',
            'mapel_id' => 'required',
            'thn_bertugas' => 'required',
        ]);

        $guru = new Guru();

        $guru->id = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->status = $request->status;
        $guru->mapel_id = $request->mapel_id;
        $guru->thn_bertugas = $request->thn_bertugas;

        $guru->save();

        return redirect()->route('guru.index')
            ->with('success', 'Berhasil menambahkan data guru');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $guru = Guru::find($id);
        $mapel = Mapel::all();

        return view('edit-guru', [
            "guru" => $guru,
            "mapel" => $mapel
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
            'nip' => 'required',
            'nama_guru' => 'required',
            'status' => 'required',
            'mapel_id' => 'required',
            'thn_bertugas' => 'required',
        ]);

        $guru = Guru::find($id);

        $guru->id = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->status = $request->status;
        $guru->mapel_id = $request->mapel_id;
        $guru->thn_bertugas = $request->thn_bertugas;

        $guru->save();

        return redirect()->route('guru.index')
            ->with('success', 'Berhasil memperbaharui data guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Guru::destroy($id);

        return redirect()->route("guru.index")->with('success', 'Berhasil menghapus data guru');
    }
}
