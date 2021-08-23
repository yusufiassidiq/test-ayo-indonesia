<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use App\Models\Tim;
use Illuminate\Http\Request;

class PemainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemains = Pemain::all();
        foreach($pemains as $pemain){
            $pemain->tim = $pemain->tim->nama;
        }
        $tims = Tim::all();
        return view('list_pemain',compact('pemains','tims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tims = Tim::all();
        return view('add_pemain',compact('tims'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tim = Tim::findOrFail($request->tim_id);
        $pemainTim = $tim->pemain;
        $noPunggung = [];
        foreach($pemainTim as $pt){
            array_push($noPunggung,$pt->nomor_punggung);
        }
        if(in_array($request->nomor_punggung, $noPunggung)){
            return redirect(route('addPemainPage'))->with(['failed' => 'Pemain dalam satu tim mempunyai nomor yang sama, Pilih Nomor yang lain!']);
        }
        // dd($noPunggung);
        $pemain = new Pemain;
        $pemain->nama = $request->nama;
        $pemain->tinggi = $request->tinggi;
        $pemain->berat = $request->berat;
        $pemain->nomor_punggung = $request->nomor_punggung;
        $pemain->posisi = $request->posisi;
        $pemain->tim()->associate($request->tim_id);
        $pemain->save();

        return redirect(route('addPemainPage'))->with(['success' => 'Pemain berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function show(Pemain $pemain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemain $pemain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $pemain = Pemain::findOrFail($request->id);
        $tim = Tim::findOrFail($request->tim_id);

        $pemainTim = $tim->pemain;
        $noPunggung = [];
        foreach($pemainTim as $pt){
            array_push($noPunggung,$pt->nomor_punggung);
        }
        if(in_array($request->nomor_punggung, $noPunggung)){
            return redirect()->back()->with(['failed' => 'Pemain dalam satu tim mempunyai nomor yang sama, Pilih Nomor yang lain!']);
        }
        
        $pemain->nama = $request->nama;
        $pemain->tinggi = $request->tinggi;
        $pemain->berat = $request->berat;
        $pemain->nomor_punggung = $request->nomor_punggung;
        $pemain->posisi = $request->posisi;
        $pemain->tim()->associate($request->tim_id);
        $pemain->save();

        return redirect()->back()->with(['success' => 'Pemain berhasil diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemain $pemain)
    {
        //
    }
}
