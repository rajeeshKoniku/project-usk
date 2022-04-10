<?php

namespace App\Http\Controllers;

use App\Models\Rpk;
use App\Models\Kk;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RpkController extends Controller
{  
    public function index()
    {
        $data = Rpk::get();
        // $dataLooping = Kk::whereNotNull(['tw_1','tw_2','tw_3','tw_4',])->get()->all('kode_ik');
        $dataLooping = Kk::get()->all('kode_ik');
        return view('rpk.index',compact('data', 'dataLooping'));
    }
    public function get(Request $x)
    {
        $iku = substr($x->kode_ik,0,8);
        $results = DB::select( DB::raw("SELECT kode_prog from tb_prog where kode_prog LIKE '%$iku%'"));
        return $results;
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
