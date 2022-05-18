<?php

namespace App\Http\Controllers;

use App\Models\Ss;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $data = Ss::get();
        return view('Ss.index',compact('data'));
    }
    public function del(Request $x)
    {
        Ss::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $lastData = Ss::latest()->first();
        $req = [
            "id"=> rand(1000,9999),
            "kode_ss" => $x->kode_ss,
            "sasaran" => $x->sasaran,
        ];
        Ss::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(["SUKSES"]);
    }
}
