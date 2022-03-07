<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class KomponenController extends Controller
{
    public function index()
    {
        return view('komponen.index');
    }

    public function fetch_data()
    {
        $data = Komponen::all();
        return DataTables::of($data)->toJson();
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            // ambil data tanpa action
            $data = $request->except('action');

            // update atau delete program
            if ($request->action == 'edit') {
                Komponen::where('id', $request->id)->update($data);
            }

            if ($request->action == 'delete') {
                Komponen::where('id', $request->id)->delete();
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
            "kebutuhan_kegiatan" => $req->kebutuhan_kegiatan,
            "rincian_komponen" => $req->rincian_komponen,
            "akun" => $req->akun,
            "jenis_belanja" => $req->jenis_belanja,
        ];

        Komponen::create($data);
        return response()->json(['success' => 'Berhasil menyimpan data']);
    }  
}
