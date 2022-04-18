<?php

namespace App\Http\Controllers;

use App\Models\Ik;
use App\Models\program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class programController extends Controller
{
    public function index()
    {
        $Program = program::get();
        $IK = IK::get();
        return view('Program.index',compact('Program','IK'));
    }
    public function del(Request $x)
    {
        program::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $req = [
            "id"=> rand(1000,9999),
            "kode_ik" => $x->kode_ik,
            "kode_prog" => $x->kode_prog,
            "program" => $x->program,
        ];
        program::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(["SUKSES"]);
    }
}
