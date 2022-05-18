<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
      public function index()
    {
        $UNITKERJA = UnitKerja::get();
        return view('UnitKerja.index',compact('UNITKERJA'));
    }
    public function del(Request $x)
    {
        UnitKerja::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $req = [
            'unit_kerja' => $x->unitkerja,
            'nama_pengguna' => $x->nama,
            'level_pengguna' => $x->level,
            ];
        UnitKerja::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(['SUKSES']);
    }
}
