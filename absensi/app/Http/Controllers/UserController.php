<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mode = \App\Mode::findOrFa(1);
        $mode->status = "user";
        $mode->save();

        $data['user'] = \App\User::all();

        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new \App\User;
        $user->nim = $request->nim;
        $user->card_id = $request->card_id;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $imageName = time().'.'.$request->foto->getClientOriginalExtension();
        $user->foto = $imageName;
        $request->foto->move(public_path('image'), $imageName);
        if ($user->save()) {
            return redirect('user')->with('success','Data user berhasil ditambahkan!');
        }else{
            return redirect('user/create')->with('error','Data user gagal ditambahkan!');
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
        $data['user'] = \App\User::findOrFail($id);
        return view('user.edit', $data);
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
        $user = \App\User::findOrFail($id);
        $user->nim = $request->nim;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $imageName = time().'.'.$request->foto->getClientOriginalExtension();
        $user->foto = $imageName;
        $request->foto->move(public_path('image'), $imageName);
        if ($user->save()) {
            return redirect('user')->with('success','Data user berhasil diperbaharui!');
        }else{
            return redirect('user/create')->with('error','Data user gagal diperbaharui!');
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
        $user = \App\User::findOrFail($id);
        if ($user->delete()) {
            return redirect('user')->with('success','Data user berhasil dihapus!');
        }else{
            return redirect('user/create')->with('error','Data user gagal dihapus!');
        } 
    }
}
