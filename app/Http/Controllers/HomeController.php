<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function daftar(Request $request)
    {
        $peternak = Role::where('name', 'peternak')->first();
        $data = new User();
        // dd($request->all());
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->province = $request->province;
        $data->city = $request->city;
        $data->nomorHp = $request->nomorhp;
        $data->bank = $request->bank;
        $data->nomorRekening = $request->nomorrekening;
        $data->password = bcrypt($request->password);
        $data->status = 'aktif';
        if ($request->file('foto')) {
            $image_path = $request->file('foto')->store('avatar', 'public');
            $data->avatar = $image_path;
        }
        $data->save();
        $data->roles()->attach($peternak);
        return redirect('login');
    }

    public function editEmail(Request $request)
    {
        $data = User::findOrFail($request->id);
        // dd($data);
        $data->email = $request->email;
        $data->save();
        return back()->with('alert', 'Email berhasil diupdate');
    }

    public function editBank(Request $request)
    {
        $data = User::findOrFail($request->id);
        // dd($data);
        $data->bank = $request->bank;
        $data->save();
        return back()->with('alert', 'Bank berhasil diupdate');
    }

    public function editRek(Request $request)
    {
        $data = User::findOrFail($request->id);
        // dd($data);
        $data->nomorRekening = $request->rekening;
        $data->save();
        return back()->with('alert', 'Nomor Rekening berhasil diupdate');
    }
}
