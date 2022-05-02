<?php

namespace App\Http\Controllers;

use App\Models\KKmentri;
use App\Models\Kk;
use App\Models\Ik;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KkController extends Controller
{
   public function index()
    {
        $dataIK = Ik::all('kode_ik');
        $data = KKmentri::whereNotNull(['pk_menteri', 'bobot'])->get();
        return view('kk.index', compact('data','dataIK'));
    }
    public function del(Request $x)
    {
        Kk::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $req = [
            "satuan" => $x->satuan,
            "tw_1" => $x->tw_1,
            "tw_2" => $x->tw_2,
            "tw_3" => $x->tw_3,
            "tw_4" => $x->tw_4
        ];
        $data = Kk::find($x->id)->update($req);
        return $data;
    }
    public function add_nip(Request $req)
    {
         $data = DB::STATEMENT("UPDATE tb_kk SET nip = '$req->nip', nama_pimpinan = '$req->nama_pimpinan' WHERE kode_ik = '$req->kode_ik'");
         return $data;
    }
}
