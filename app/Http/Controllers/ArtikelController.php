<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::all();
        // dd($data);
        return view('dokter.artikel', compact('data'));
    }

    public function indexPeternak()
    {
        $data = Artikel::all();
        // dd($data);
        return view('peternak.artikel', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = new Artikel;
        $data->dokter_id = Auth::user()->id;
        $data->judul_artikel = $request->judul_artikel;
        $data->isi_artikel = $request->isi_artikel;

        $data->save();

        return back()->with('alert', 'Artikel berhasil ditambahkan');
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
    public function edit($id)
    {
        //
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
        $data = Artikel::findOrFail($request->id);
        // dd($data);
        $data->dokter_id = Auth::user()->id;
        $data->judul_artikel = $request->judul_artikel;
        $data->isi_artikel = $request->isi_artikel;

        $data->save();

        return back()->with('alert', 'Artikel berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Artikel::destroy($request->id);

        return back()->with('alert', 'Artikel Berhasil Dihapus');
    }
}
