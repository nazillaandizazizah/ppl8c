<?php

namespace App\Http\Controllers;

use App\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Question::where('peternak_id', Auth::user()->id)->get()->all();
        // dd($data);
        return view('peternak.konsultasi', compact('data'));
    }

    public function verifikasi()
    {
        $data = Question::where('status', 'proses')->get()->all();
        // dd($data);
        return view('admin.verifikasi', compact('data'));
    }

    public function getVerifikasi(Request $request)
    {
        $data = Question::findOrFail($request->id);
        $data->status = 'belum';
        $data->save();

        return back()->with('alert', 'Data berhasil diverifikasi');
    }

    public function getBatal(Request $request)
    {
        $data = Question::findOrFail($request->id);
        $data->status = 'batal';
        $data->alasan = $request->alasan;
        $data->save();

        return back()->with('alert', 'Data berhasil dibatalkan');
    }

    public function riwayat()
    {
        $data = Question::where('status', 'sudah')->get()->all();

        return view('dokter.riwayat', compact('data'));
    }

    public function getPertanyaan()
    {
        $data = Question::where('status', 'belum')->get()->all();
        // dd($data);
        return view('dokter.konsultasi', compact('data'));
    }

    public function jawab(Request $request)
    {
        $data = Question::findOrFail($request->id);
        // dd($data);
        $data->jawaban = $request->jawab;
        $data->status = 'sudah';
        $data->tanggal_jawaban = Carbon::now();
        $data->save();

        return back()->with('alert', 'Jawaban berhasil ditambahkan');
    }

    public function allPertanyaan()
    {
        $data = Question::where(['dokter_id' => "0"])->whereIn('status', ['belum', 'sudah'])->get()->all();
        // dd($data);
        return view('dokter.konsultasi', compact('data'));
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
        $data = new Question();
        $data->peternak_id = Auth::user()->id;
        $data->dokter_id = $request->dokter;
        $data->pertanyaan = $request->pertanyaan;
        $data->status = "proses";
        $data->save();

        return back();
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
        //
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
