<?php

namespace App\Http\Controllers;

use App\Models\Ikk;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class IkkController extends Controller
{   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataIk = DB::select('SELECT id,kode_ik from tb_ik');
        $dataProg = DB::select('SELECT id,kode_prog from tb_prog');
        return view('ikk.index', compact('dataIk','dataProg'));
    }

    public function fetch_data()
    {
         $joinData = DB::select('
            SELECT tb_ikk.id, tb_ik.kode_ik, tb_ik.indikator_kinerja, tb_prog.kode_prog, tb_prog.program
            FROM `tb_ikk`
            INNER JOIN tb_ik ON tb_ikk.kode_ik COLLATE utf8mb4_unicode_ci = tb_ik.kode_ik
            INNER JOIN tb_prog ON tb_ikk.kode_prog COLLATE utf8mb4_unicode_ci = tb_prog.kode_prog;
            ');
        return DataTables::of($joinData)->toJson();
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            // ambil data tanpa action
            $data = $request->except('action');

            // update atau delete program
            if ($request->action == 'edit') {
                Ikk::where('id', $request->id)->update($data);
            }

            if ($request->action == 'delete') {
                Ikk::where('id', $request->id)->delete();
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
            "kode_prog" => $req->kode_prog,
        ];

        Ikk::create($data);
        return response()->json(['success'=> 'Berhasil menyimpan data']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikk  $ikk
     * @return \Illuminate\Http\Response
     */
    public function show(Ikk $ikk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikk  $ikk
     * @return \Illuminate\Http\Response
     */
    public function edit(Ikk $ikk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikk  $ikk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ikk $ikk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikk  $ikk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ikk $ikk)
    {
        //
    }
}
