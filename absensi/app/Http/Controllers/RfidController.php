<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RfidController extends Controller
{
    public function tmprfid_get(){
        $card_id = \App\Tmprfid::lastest('id')->first();

        return response($card_id, 200);
    }

    public function tmprfid_post(Request $request){
        $tmprfid = new \App\Tmprfid;
        $tmprfid->card_id = $request->card_id;

        if ($tmprfid->save()) {
            return response([
                'success' => 'ID kartu berhasil ditambahkan'
            ]);
        }else{
            return response([
                'error' => 'ID kartu gagal ditambahkan'
            ]);
        }
    }
    public function mode_get(){
        $mode = \App\Mode::lastest('id')->first();

        return response([
            'status' => $mode->status
        ], 200);
    }
    
    public function kehadian_post(Request $request){

        $user = \App\User::where('card_id', '=', $request->card_id)->first();

        $kehadiran = new \App\Kehadiran;
        $kehadiran->user_id = $user->id;
        $kehadiran->waktu_kehadiran = date('Y-m-d H:i:s');

        if ($kehadiran->save()) {
            return response([
                'success' => 'Kehadiran berhasil ditambahkan'
            ]);
        }else{
            return response([
                'error' => 'Kehadiran gagal ditambahkan'
            ]);
        }
    }
}
