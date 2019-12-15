<?php

namespace App\Http\Controllers;

use App\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = new Paket();
        $data->nama_paket = $request->nama;
        $data->lama_paket = $request->lama;
        $data->harga_paket = $request->harga;

        if ($request->file('icon')) {
            $image_path = $request->file('icon')->store('paket', 'public');
            $data->icon_paket = $image_path;
        }

        $data->save();
        return back()->with('alert', 'Paket berhasil  ditambahkan');
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
        $data = Paket::findOrFail($request->id);
        // dd($data);
        $data->nama_paket = $request->nama;
        $data->lama_paket = $request->lama;
        $data->harga_paket = $request->harga;

        if ($request->file('icon')) {
            if ($data->icon_paket && file_exists(storage_path('app/public/' . $data->icon_paket))) {
                \Storage::delete('public/' . $data->icon_paket);
            }
            $image_path = $request->file('icon')->store('paket', 'public');
            $data->icon_paket = $image_path;
        }

        $data->save();
        return back()->with('alert', 'Paket berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->all());
        Paket::destroy($request->id);
        return back()->with('alert', 'Paket berhasil dihapus');
    }
}
