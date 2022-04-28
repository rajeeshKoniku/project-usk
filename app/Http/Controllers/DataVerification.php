<?php

namespace App\Http\Controllers;

use App\Models\KK;
use Illuminate\Http\Request;

class DataVerification extends Controller
{

    public function verificationPerkin()
    {
        $data = KK::whereNotNull(['tw_1', 'tw_2','tw_3','tw_4'])->get();
        $options = [KK::DISETUJUI => 'Disetujui', KK::DITOLAK => 'Ditolak'];
        return view('dataverification.verificationPerkin', compact('data', 'options'));
    }

    public function updateVerificationPerkin(Request $req)
    {
        $data = Kk::find($req->id)->update($req->all());
        return $data;
    }

    public function verificationRekat()
    {
        // $data = KK::whereNotNull(['tw_1', 'tw_2','tw_3','tw_4'])->get();
        return view('dataverification.verificationRekat');
    }
}
