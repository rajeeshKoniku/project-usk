<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("program.index");
    }

    public function fetch_data()
    {
        return DataTables::of(Program::all())->toJson();
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
            "Kd_Program" => $request->Kd_Program,
            "Program" => $request->Program,
        ];

        $program = Program::create($data);
        return response()->json($program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
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
