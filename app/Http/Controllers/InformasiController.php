<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();

        return view('informasi', [
            "informasi" => $informasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-informasi');
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
            'jdl_informasi' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        $path = $request->file('foto')->store('public/images');

        $informasi = new Informasi();

        $informasi->jdl_informasi = $request->jdl_informasi;
        $informasi->foto = $path;
        $informasi->deskripsi = $request->deskripsi;
        $informasi->status = $request->status;


        $informasi->save();

        return redirect()->route('informasi.index')
            ->with('success', 'Berhasil menambahkan data informasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $informasi)
    {
        return view('edit-informasi', compact("informasi"));
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
            'jdl_informasi' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        $informasi = Informasi::find($id);

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('foto')->store('public/images');
            $informasi->foto = $path;
        }

        $informasi->jdl_informasi = $request->jdl_informasi;
        $informasi->deskripsi = $request->deskripsi;
        $informasi->status = $request->status;

        $informasi->save();

        return redirect()->route('informasi.index')
            ->with('success', 'Berhasil memperbaharui data informasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi)
    {
        $informasi->delete();

        return redirect()->route("informasi.index")->with('success', 'Berhasil menghapus data informasi');
    }
}
