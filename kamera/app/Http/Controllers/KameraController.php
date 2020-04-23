<?php

namespace App\Http\Controllers;

use App\Kamera;
use Illuminate\Http\Request;

class KameraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $kamera=Kamera::paginate(5);
        return view('admin.beranda',compact('kamera'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $title= 'Input Kamera';
        return view('admin.inputkamera');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi',
            'required' => 'Kolom :attribute harus diisi',
            'required' => 'Kolom :attribute harus diisi',
            'required' => 'Kolom :attribute harus diisi'
        ];
        $validasi = $request->validate([
            'id' => 'required',
            'nama_kamera' => 'required',
            'seri_kamera' => 'required',
            'harga_sewa' => 'required'
        ],$messages);
        $kamera=Kamera::create($validasi);
        return redirect('kamera')->with('success','Data berhasil diupdate');
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
        $title= 'Input Kamera';
        $kamera =Kamera::find($id);
        return view('admin.inputkamera', compact('kamera'));
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
        $messages = [
            'required' => 'Kolom :attribute harus diisi',
            'required' => 'Kolom :attribute harus diisi',
            'required' => 'Kolom :attribute harus diisi',
            'required' => 'Kolom :attribute harus diisi'
        ];
        $validasi = $request->validate([
            'id' => 'required',
            'nama_kamera' => 'required',
            'seri_kamera' => 'required',
            'harga_sewa' => 'required'
        ],$messages);
        $kamera=Kamera::whereid($id)->update($validasi);
        return redirect('kamera')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kamera::whereid($id)->delete();
        return redirect('kamera')->with('success','Data berhasil diupdate');
    }
}
