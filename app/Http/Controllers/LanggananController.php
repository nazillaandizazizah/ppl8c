<?php

namespace App\Http\Controllers;

use App\Saldo;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanggananController extends Controller
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
    { }

    public function tambahSaldo(Request $request)
    {
        $data = Saldo::where('user_id', Auth::user()->id)->get()->all();
        $cek = count($data);
        // dd($data);
        foreach ($data as $item) {
            # code...
            // dd($item->id);
            if (isset($cek)) {
                Saldo::where('user_id', $request->id)->update([
                    'saldo' => $item->saldo + $request->nominal
                ]);
            } else {
                $saldo = new Saldo();
                $saldo->user_id = Auth::user()->id;
                $saldo->saldo = $request->nominal;
                $saldo->save();
            }

            Transaksi::create([
                'user_id' => Auth::user()->id,
                'saldo_id' => $item->id,
                'status' => 'menambah',
                'nominal' => $request->nominal
            ]);
        }

        return back()->with('alert', 'Saldo berhasil ditambahkan');
    }

    public function tarikSaldo(Request $request)
    {
        // dd($request->all());
        $data = Saldo::where('user_id', Auth::user()->id)->get()->all();
        $cek = count($data);
        // dd($data);
        foreach ($data as $item) {
            # code...

            Transaksi::create([
                'user_id' => Auth::user()->id,
                'saldo_id' => $item->id,
                'status' => 'menarik',
                'nominal' => $request->nominal
            ]);
            // dd($item->user_id);
            if (isset($cek)) {
                if ($item->saldo > $request->nominal) {
                    # code...
                    Saldo::where('user_id', $request->id)->update([
                        'saldo' => $item->saldo - $request->nominal
                    ]);
                    return back()->with('alert', 'Saldo berhasil ditarik');
                } else {
                    return back()->with('alert', 'Saldo tidak mencukupi');
                }
            }
        }
    }

    public function tarikSaldoDokter(Request $request)
    {
        $data = Saldo::where('user_id', Auth::user()->id)->get()->all();
        $cek = count($data);
        foreach ($data as $item) {
            # code...
            Transaksi::create([
                'user_id' => Auth::user()->id,
                'saldo_id' => $item->id,
                'status' => 'menarik',
                'nominal' => $request->nominal
            ]);
            // dd($item->user_id);
            if (isset($cek)) {
                if ($item->saldo > $request->nominal) {
                    # code...
                    Saldo::where('user_id', $request->id)->update([
                        'saldo' => $item->saldo - $request->nominal
                    ]);
                    return back()->with('alert', 'Saldo berhasil ditarik');
                } else {
                    return back()->with('alert', 'Saldo tidak mencukupi');
                }
            } else {
                return back()->with('alert', 'Anda belum mempunyai saldo');
            }
        }
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
        $data = Saldo::where('user_id', Auth::user()->id)->get()->all();
        $cek = count($data);
        foreach ($data as $item) {
            # code...
        }
        Transaksi::create([
            'user_id' => Auth::user()->id,
            'saldo_id' => $item->id,
            'status' => 'menarik',
            'nominal' => $request->nominal
        ]);
        // dd($request->all());
        if (isset($cek)) {
            if ($item->saldo > $request->nominal) {
                # code...
                Saldo::where('user_id', $request->id)->update([
                    'saldo' => $item->saldo - $request->nominal
                ]);
                return back()->with('alert', 'Saldo berhasil ditarik');
            } else {
                return back()->with('alert', 'Saldo tidak mencukupi');
            }
        } else {
            return back()->with('alert', 'Anda belum mempunyai saldo');
        }
    }

    public function tambahSaldoPeternak(Request $request)
    {
        $data = Saldo::where('user_id', Auth::user()->id)->get()->all();
        $cek = count($data);
        // dd($cek);
        foreach ($data as $item) {
            # code...
        }
        // dd($request->all());
        if (isset($cek)) {
            Saldo::where('user_id', $request->id)->update([
                'saldo' => $item->saldo + $request->nominal
            ]);
        } else {
            $saldo = new Saldo();
            $saldo->user_id = Auth::user()->id;
            $saldo->saldo = $request->nominal;
            $saldo->save();
        }

        Transaksi::create([
            'user_id' => Auth::user()->id,
            'saldo_id' => $item->id,
            'status' => 'menambah',
            'nominal' => $request->nominal
        ]);

        return back()->with('alert', 'Saldo berhasil ditambahkan');
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

    public function getCities($id)
    {
        $city = \DB::table('cities')->where('province_id', $id)->pluck('title', 'city_id');
        return json_encode($city);
        // dd($city);
    }

    public function transaksidokter($id)
    {
        // $data = Transaksi::where('user_id', 8);

        $role = \DB::table('role_user')->where('role_id', 3)->get()->all();

        foreach ($role as $user) {
            $users = \DB::table('transaksi')->where(['user_id' => $user->user_id, 'status' => ['berakhir', 'proses']])->get();
            // dd($users);
        }

        return view('admin.transaksidokter', compact('users'));
    }

    public function transaksi($id)
    {
        return view('admin.transaksipeternak', compact('id'));
    }

    public function pilihPaket(Request $request)
    {
        // dd($request->all());
        $saldo = Saldo::where('user_id', Auth::user()->id)->get()->all();
        $saldoAdmin = Saldo::where('user_id', 3)->get()->all();
        // dd($saldoAdmin[0]);
        $transaksi = Transaksi::where(['user_id' => Auth::user()->id, 'status' => 'proses'])->get()->all();
        $cek = count($transaksi);
        // dd($saldo[0]->saldo - intval($request->harga));

        if ($cek > 0) {
            if ($transaksi[0]->user_id == Auth::user()->id) {
                return back()->with('alert', 'Anda masih memiliki paket!');
            }
        } else {
            if ($saldo[0]->saldo > $request->harga) {
                Transaksi::create([
                    'user_id' => Auth::user()->id,
                    'paket_id' => $request->id,
                    'status' => 'proses',
                ]);
                Saldo::where('user_id', Auth::user()->id)->update([
                    'saldo' => $saldo[0]->saldo - intval($request->harga)
                ]);

                Saldo::where('user_id', 3)->update([
                    'saldo' => $saldoAdmin[0]->saldo + intval($request->harga)
                ]);
                return back()->with('alert', 'Paket telah dibeli');
            } else {
                return back()->with('alert', 'Saldo anda tidak mencukupi untuk membeli paket telah dibeli');
            }
        }
    }
}
