<?php

namespace App\Http\Controllers;

use App\Models\Pencetak_Gol;
use App\Models\Jadwal;

use Illuminate\Http\Request;

class PencetakGolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
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
        $jadwal = Jadwal::findOrFail($id);
        dd($jadwal);
        return view('add_pencetak_gol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $pencetakGol = new Pencetak_Gol;
        $pencetakGol->waktu_gol = $request->waktu_gol;
        $pencetakGol->pencetak_gol_id = $request->pencetak_gol_id;
        $pencetakGol->hasil()->associate($request->hasil_id);
        $pencetakGol->save();

        return redirect()->route('editHasil',$request->hasil_id)->with(['success' => 'Pencetak Gol berhasil ditambahkan!']);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pencetak_Gol  $pencetak_Gol
     * @return \Illuminate\Http\Response
     */
    public function show(Pencetak_Gol $pencetak_Gol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pencetak_Gol  $pencetak_Gol
     * @return \Illuminate\Http\Response
     */
    public function edit(Pencetak_Gol $pencetak_Gol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pencetak_Gol  $pencetak_Gol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return $request;
        $pencetakGol = Pencetak_Gol::findOrFail($request->id);
        $pencetakGol->waktu_gol = $request->waktu_gol;
        $pencetakGol->hasil_id = $request->hasil_id;
        $pencetakGol->pencetak_gol_id = $request->pencetak_gol_id;
        $pencetakGol->hasil()->associate($request->hasil_id);
        $pencetakGol->save();

        return redirect()->back()->with(['success' => 'Pencetak Gol berhasil diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pencetak_Gol  $pencetak_Gol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pencetak_Gol $pencetak_Gol)
    {
        //
    }
}
