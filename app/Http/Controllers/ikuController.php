<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iku;
use App\Models\Ss;
use Yajra\DataTables\Facades\DataTables;

class IkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ssData = Ss::all();
        return view('iku.index', compact('ssData'));
    }

    public function fetch_data()
    {
        return DataTables::of(Iku::with('ss'))->toJson();
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            // ambil data tanpa action
            $data = $request->except('action');

            // update atau delete program
            if ($request->action == 'edit') {
                Iku::where('id', $request->id)->update($data);
            }

            if ($request->action == 'delete') {
                Iku::where('id', $request->id)->delete();
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
            "Indikator_Kinerja" => $req->Indikator_Kinerja,
            "ss_id" => $req->ss_id
        ];

        Iku::create($data);
        return response()->json(['success'=> 'Berhasil menyimpan data']);
    }

}
