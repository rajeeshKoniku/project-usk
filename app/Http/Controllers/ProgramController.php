<?php

namespace App\Http\Controllers;

use App\Models\Ik;
use App\Models\program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class programController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ikData =Ik::all();
        return view('program.index', compact('ikData'));    }

    public function fetch_data()
    {
        return DataTables::of(Program::with('ik'))->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "kode_prog" => $request->kode_prog,
            "program" => $request->program,
            "ik_id" => $request->ik_id,
        ];

        $program = Program::create($data);
        return response()->json($program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\program  $program
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request)
    {
        if ($request->ajax()) {
            // ambil data tanpa action
            $data = $request->except('action');

            // update atau delete program
            if ($request->action == 'edit') {
                Program::where('id', $request->id)->update($data);
            }

            if ($request->action == 'delete') {
                Program::where('id', $request->id)->delete();
            }

            return response()->json($request);
        }
    }
}
