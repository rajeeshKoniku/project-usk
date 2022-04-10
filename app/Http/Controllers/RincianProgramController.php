<?php

namespace App\Http\Controllers;

use App\Models\RincianProgram;
use Illuminate\Http\Request;

class RincianProgramController extends Controller
{
    

    public function index()
    {
        $data = RincianProgram::get();
        return view('rincianprogram.index',compact('data'));
    }
    public function del(Request $x)
    {
        RincianProgram::where('id_kegiatan', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $req = [
            "Keg" => $x->Keg,
            "KRO" => $x->KRO,
            "RO" => $x->RO,
            "KP" => $x->KP,
            "SK" => $x->SK,
            "MAK" => $x->MAK,
            "CODEBASE" => $x->Keg .'.'. $x->KRO .'.'. $x->RO .'.'. $x->KP .'.'. $x->SK,
        ];
        RincianProgram::UpdateOrCreate(["id_kegiatan" => $x->id],$req);
        return response()->json(["SUKSES"]);
    }

}
