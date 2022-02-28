<?php

namespace App\Http\Controllers;

use App\Models\Kk;
use App\Models\Iku;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KkController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =Iku::all('Kode_IK', 'Indikator_Kinerja');
        return view('kk.index', compact('data'));
    }

    public function fetch_data()
    {
        $joinData = DB::select('
            SELECT tb_kk.id, tb_ik.Kode_IK, tb_ik.Indikator_Kinerja,
            tb_kk.Pk_Menteri, tb_kk.tw_1, tb_kk.tw_2,
            tb_kk.tw_3, tb_kk.tw_4, tb_kk.Bobot
            FROM tb_kk
            INNER JOIN tb_ik
            ON
            tb_ik.Kode_IK = tb_kk.Kode_IK;');

        return DataTables::of($joinData)->toJson();
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            // ambil data tanpa action
            $data = $request->except('action');

            // update atau delete program
            if ($request->action == 'edit') {
                Kk::where('id', $request->id)->update($data);
            }

            if ($request->action == 'delete') {
                Kk::where('id', $request->id)->delete();
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
            "Kode_IK" => $req->Kode_IK,
            "Pk_Menteri" => $req->Pk_Menteri,
            "tw_1" => $req->tw_1,
            "tw_2" => $req->tw_2,
            "tw_3" => $req->tw_3,
            "tw_4" => $req->tw_4,
            "Bobot" => $req->Bobot
        ];

        Kk::create($data);
        return response()->json(['success'=> 'Berhasil menyimpan data']);
    }

}
