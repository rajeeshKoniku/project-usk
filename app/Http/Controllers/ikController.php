<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ik;
use App\Models\Ss;
use App\Models\Kk;
use Illuminate\Support\Facades\DB;

class IkController extends Controller
{
   
    public function index()
    {
        $data = Ik::get();
        return view('ik.index',compact('data'));
    }
    public function del(Request $x)
    {
        Ik::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $lastData = Ik::latest()->first();
        $req = [
            "id"=> rand(1000,9999),
            "kode_ik" => $x->kode_ik,
            "indikator_kinerja" => $x->indikator_kinerja,
            "ss_id" => $x->ss_id
        ];
        Ik::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(["SUKSES"]);
    }

}
