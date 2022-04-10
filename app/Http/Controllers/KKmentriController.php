<?php

namespace App\Http\Controllers;

use App\Models\KKmentri;
use App\Models\Ik;
use Illuminate\Http\Request;

class KKmentriController extends Controller
{
    public function index()
    {
        $dataIK = Ik::get();
        $data = KKmentri::get();
        return view('kkmenteri.index',compact('data','dataIK'));
    }
    public function get()
    {
        $dataIK = Ik::select('kode_ik')->pluck('kode_ik');
        return $dataIK;
    }
    public function del(Request $x)
    {
        KKmentri::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $req = [
            "kode_ik" => $x->kode_ik,
            "pk_menteri" => $x->pk_menteri,
            "bobot" => $x->bobot
        ];
        KKmentri::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(["SUKSES"]);
    }

}
