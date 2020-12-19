<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mode = \App\Mode::findOrFa(1);
        $mode->status = "kehadiran";
        $mode->save();

        $data['kehadiran'] = \App\Kehadiran::all();
        return view('kehadiran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user'] = \App\User::all(); 
        return view('kehadiran.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kehadiran = new \App\Kehadiran;
        $kehadiran->user_id = $request->user_id;
        $kehadiran->waktu_kehadiran = $request->waktu_kehadiran;
        if ($kehadiran->save()) {
            return redirect('kehadiran')->with('success','Data kehadiran berhasil ditambahkan!');
        }else{
            return redirect('kehadiran/create')->with('error','Data kehadiran gagal ditambahkan!');
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
        $data['kehadiran'] = \App\Kehadiran::findOnFail($id);
        $data['user'] = \App\User::all();
        return view('kehadiran.edit', $data);
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
        $kehadiran = \App\Kehadiran::findOrFail($id);
        $kehadiran->user_id = $request->user_id;
        $kehadiran->waktu_kehadiran = $request->waktu_kehadiran;
        if ($kehadiran->save()) {
            return redirect('kehadiran')->with('success','Data kehadiran berhasil diperbaharui!');
        }else{
            return redirect('kehadiran/create')->with('error','Data kehadiran gagal diperbaharui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kehadiran = \App\Kehadiran::findOrFail($id);
        if ($kehadiran->delete()) {
            return redirect('kehadiran')->with('success','Data kehadiran berhasil dihapus!');
        }else{
            return redirect('kehadiran/create')->with('error','Data kehadiran gagal dihapus!');
        }
    }
}
