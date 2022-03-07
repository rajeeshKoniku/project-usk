<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KegiatanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programData = Program::all();
        return view('kegiatan.index', compact('programData'));
    }

    public function fetch_data()
    {
        return DataTables::of(Kegiatan::with('program'))->toJson();
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            // ambil data tanpa action
            $data = $request->except('action');

            // update atau delete program
            if ($request->action == 'edit') {
                Kegiatan::where('id', $request->id)->update($data);
            }

            if ($request->action == 'delete') {
                Kegiatan::where('id', $request->id)->delete();
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
            "kode_keg" => $req->kode_keg,
            "uraian_kegiatan" => $req->uraian_kegiatan,
            "program_id" => $req->program_id,
        ];

        Kegiatan::create($data);
        return response()->json(['success'=> 'Berhasil menyimpan data']);
    }

}
