<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

    public function profildokter($id)
    {
        return view('peternak.profildokter', compact('id'));
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
        $dokter = Role::where('name', 'dokter')->first();

        $data = new User();
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->lulusan = $request->lulusan;
        $data->tahunLulus = $request->tahunlulus;
        $data->nomorHP = $request->nomorHP;
        $data->bank = $request->bank;
        $data->nomorRekening = $request->nomorRekening;
        $data->province = $request->province;
        $data->city = $request->city;
        $data->status = 'aktif';

        if ($request->file('avatar')) {
            $image_path = $request->file('avatar')->store('avatar', 'public');
            $data->avatar = $image_path;
        }

        $data->save();
        $data->roles()->attach($dokter);

        return back()->with('alert', 'Data dokter berhasil ditambahkan');
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
        // dd($request->all());
        $data = User::findOrFail($request->id);
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->lulusan = $request->lulusan;
        $data->tahunLulus = $request->tahunlulus;
        $data->nomorHP = $request->nomorHP;
        $data->bank = $request->bank;
        $data->nomorRekening = $request->nomorRekening;
        $data->province = $request->province;

        if ($request->city) {
            $data->city = $request->city;
        }

        if ($request->file('avatar')) {
            $image_path = $request->file('avatar')->store('avatar', 'public');

            $data->avatar = $image_path;
        }

        $data->save();

        return back()->with('alert', 'Profile berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
