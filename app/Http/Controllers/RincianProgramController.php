<?php

namespace App\Http\Controllers;

use App\Models\RincianProgram;
use Illuminate\Http\Request;

class RincianProgramController extends Controller
{
    public function index()
    {
        $RincianProgram = RincianProgram::get();
        return view('rincianprogram.index',compact('RincianProgram'));
    }
    public function del(Request $x)
    {
        RincianProgram::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $req = [
            "codebase" => $x->Keg .'.'. $x->KRO .'.'. $x->RO .'.'. $x->KP .'.'. $x->SK,
            "Rip" => $x->Rip,
            "Keg" => $x->Keg,
            "KRO" => $x->KRO,
            "RO" => $x->RO,
            "KP" => $x->KP,
            "SK" => $x->SK,
            "MAK" => $x->MAK,
        ];
        RincianProgram::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(["SUKSES"]);
    }

}
