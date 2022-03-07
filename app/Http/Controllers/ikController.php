<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ik;
use App\Models\Ss;
use Yajra\DataTables\Facades\DataTables;

class IkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ssData = Ss::all();
        return view('ik.index', compact('ssData'));
    }

    public function fetch_data()
    {
        return DataTables::of(Ik::with('ss'))->toJson();
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            // ambil data tanpa action
            $data = $request->except('action');

            // update atau delete program
            if ($request->action == 'edit') {
                Ik::where('id', $request->id)->update($data);
            }

            if ($request->action == 'delete') {
                Ik::where('id', $request->id)->delete();
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
            "kode_ik" => $req->kode_ik,
            "indikator_kinerja" => $req->indikator_kinerja,
            "ss_id" => $req->ss_id
        ];

        Ik::create($data);
        return response()->json(['success'=> 'Berhasil menyimpan data']);
    }

}
