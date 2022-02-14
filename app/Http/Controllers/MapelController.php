<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();

        return view('mapel', [
            "mapel" => $mapel
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

        return view('create-mapel', [
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
            'nama_mapel' => 'required',
        ]);

        $mapel = new Mapel();
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->save();

        return redirect()->route('mapel.index')
            ->with('success', 'Berhasil menambahkan data mata pelajaran');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $mapel = Mapel::find($id);

        return view('edit-mapel', [
            "mapel" => $mapel,
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
            'nama_mapel' => 'required',
        ]);

        $mapel = Mapel::find($id);

        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->save();

        return redirect()->route('mapel.index')
            ->with('success', 'Berhasil memperbaharui data mata pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Mapel::destroy($id);

        return redirect()->route("mapel.index")->with('success', 'Berhasil menghapus data mata pelajaran');
    }
}
