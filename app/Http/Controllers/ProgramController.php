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
        $data = program::get();
        return view('Program.index',compact('data'));
    }
    public function del(Request $x)
    {
        program::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $lastData = program::latest()->first();
        $req = [
            "id"=> rand(1000,9999),
            "kode_prog" => $x->kode_prog,
            "program" => $x->program,
        ];
        program::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(["SUKSES"]);
    }
}
