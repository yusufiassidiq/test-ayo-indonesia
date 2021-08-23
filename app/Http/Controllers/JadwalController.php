<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Tim;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $asd = Jadwal::whereHas('hasil')->get();
        // return $asd;
        $tims = Tim::all();
        $jadwals = Jadwal::all();
        foreach ($jadwals as $jadwal){
            $jadwal->homeTim = Tim::findOrFail($jadwal->home_id)->nama;
            $jadwal->awayTim = Tim::findOrFail($jadwal->away_id)->nama;
            $jadwal->hasil = $jadwal->hasil;
        }
        // return $jadwals;
        return view('list_jadwal',compact('jadwals','tims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tims = Tim::all();

        return view('add_jadwal',compact('tims'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal = new Jadwal;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->waktu = $request->waktu;
        $jadwal->home_id = $request->home_id;
        $jadwal->away_id = $request->away_id;
        $jadwal->save();

        return redirect(route('addJadwalPage'))->with(['success' => 'Jadwal berhasil ditambahkan!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $jadwal = Jadwal::findOrFail($request->id);
        $jadwal->tanggal = $request->tanggal;
        $jadwal->waktu = $request->waktu;
        $jadwal->home_id = $request->home_id;
        $jadwal->away_id = $request->away_id;
        if($request->home_id == $request->away_id){
            return redirect()->back()->with(['failed' => 'Tim Tuan Rumah dan Tim Tamu tidak boleh sama!']);
        }
        $jadwal->save();

        return redirect()->back()->with(['success' => 'Jadwal berhasil diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
