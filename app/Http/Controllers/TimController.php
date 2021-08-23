<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tims = Tim::all();
        return view('list_tim',compact('tims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_tim');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        // ]);
        $v = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        if ($request->hasFile('logo')) {
            $filenameWithExt = $request->file('logo')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename.'_'. time().'.'.$extension;
            // Upload Image
            $path = $request->file('logo')->storeAs('public/image', $fileNameToStore);
            }
            // Else add a dummy image
            else {
            $fileNameToStore = 'noimage.jpg';
        }
        // $logo = $request->get('logo');
        // if(isset($logo)){
        //     $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($logo, 0, strpos($logo, ';')))[0])[0];
        //     \Image::make($request->get('logo'))->save(public_path('images/').$fileName);
        // }
        $tim = new Tim;
        $tim->nama = $request->nama;
        $tim->logo = $fileNameToStore;
        $tim->tahun_berdiri = $request->tahun_berdiri;
        $tim->alamat = $request->alamat;
        $tim->kota = $request->kota;
        $tim->save();

        return redirect(route('addTimPage'))->with(['success' => 'Tim berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function show(Tim $tim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tim  $tim
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
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $tim = Tim::findOrFail($request->id);
        $v = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        if ($request->hasFile('logo')) {
            $filenameWithExt = $request->file('logo')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename.'_'. time().'.'.$extension;
            // Upload Image
            $path = $request->file('logo')->storeAs('public/image', $fileNameToStore);
            }
            // Else add a dummy image
            else {
            $fileNameToStore = 'noimage.jpg';
        }
        $tim->nama = $request->nama;
        $tim->logo = $fileNameToStore;
        $tim->tahun_berdiri = $request->tahun_berdiri;
        $tim->alamat = $request->alamat;
        $tim->kota = $request->kota;
        $tim->save();
        return redirect()->back()->with(['success' => 'Tim berhasil diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tim = Tim::findOrFail($id);
        if($tim->pemain){
            return redirect()->back()->with(['failed' => 'Tim mempunyai daftar pemain, tidak bisa menghapus tim!']);
        }
        $tim->delete();
        return redirect()->back()->with(['success' => 'Tim berhasil dihapus!']);
    }
}
