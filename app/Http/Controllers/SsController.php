<?php

namespace App\Http\Controllers;

use App\Models\Ss;
use App\Models\Iku;
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
        return view('Ss.index');
    }

    public function fetch_data()
    {
        $data = Ss::all();
        return DataTables::of($data)->toJson();
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            // ambil data tanpa action
            $data = $request->except('action');

            // update atau delete program
            if ($request->action == 'edit') {
                Ss::where('id', $request->id)->update($data);
            }

            if ($request->action == 'delete') {
                Ss::where('id', $request->id)->delete();
            }

            return response()->json($request);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = [
            "Kode_SS" => $req->Kode_SS,
            "Sasaran" => $req->Sasaran,
            "Kode_IK" => $req->Kode_IK
        ];

        Ss::create($data);
        return response()->json(['success' => 'Berhasil menyimpan data']);
    }
}
