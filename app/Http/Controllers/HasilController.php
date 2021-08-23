<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Jadwal;
use App\Models\Tim;
use App\Models\Pemain;
use App\Models\Pencetak_Gol;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwals = Jadwal::whereDoesntHave('hasil')->get();
        foreach($jadwals as $jadwal){
            $jadwal->homeTim = Tim::findOrFail($jadwal->home_id)->nama;
            $jadwal->awayTim = Tim::findOrFail($jadwal->away_id)->nama;
            $jadwal->tanggal = Carbon::parse($jadwal->tanggal)->format('l, d-m-Y');
        }
        // return $jadwals;
        return view('add_hasil',compact('jadwals'));
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
        $hasil = new Hasil;
        $hasil->jadwal()->associate($request->jadwal_id);
        $hasil->save();

        return redirect()->route('editHasil',$hasil->id)->with(['success' => 'Hasil Pertandingan berhasil ditambahkan!']);;
        // return view('edit_hasil', ['id' => $hasil->id]);
        // return redirect('edit-hasil/'.$hasil->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil $hasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    // public function edit(Hasil $hasil)
    public function edit($id)
    {
        $hasil = Hasil::findOrFail($id);
        $jadwal = Jadwal::findOrFail($hasil->jadwal_id);
        $hometim = Tim::findOrFail($jadwal->home_id);
        $awaytim = Tim::findOrFail($jadwal->away_id);

        $hasil->homeTim = $hometim->nama;
        $hasil->homeTimId = $hometim->id;
        $hasil->awayTim = $awaytim->nama;
        $hasil->awayTimId = $awaytim->id;
        $hasil->tanggal = Carbon::parse($jadwal->tanggal)->format('l, d-m-Y');
        $hasil->waktu = $jadwal->waktu;

        $pemainHome = $hometim->pemain;
        $pemainAway = $awaytim->pemain;
        // dd( $hasil);
        $pencetakGol = $hasil->pencetak_gol;
        foreach($pencetakGol as $pg){
            $pg->namaTim = Pemain::findOrFail($pg->pencetak_gol_id)->tim->nama;
            $pg->namaPemain = Pemain::findOrFail($pg->pencetak_gol_id)->nama;
        }
        $groupingSkorByNamaTim = $pencetakGol->groupBy('namaTim');
        $skorHome = isset($groupingSkorByNamaTim[$hometim->nama])?$groupingSkorByNamaTim[$hometim->nama]:[];
        $skorAway = isset($groupingSkorByNamaTim[$awaytim->nama])?$groupingSkorByNamaTim[$awaytim->nama]:[];
        // dd($skorAway);
        // return $hasil;
        return view('edit_hasil',compact('hasil','pemainHome','pemainAway','skorHome','skorAway'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hasil $hasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hasil $hasil)
    {
        //
    }
}
