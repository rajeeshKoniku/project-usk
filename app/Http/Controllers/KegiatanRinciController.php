<?php

namespace App\Http\Controllers;

use App\Models\KegiatanRinci;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class KegiatanRinciController extends Controller
{
    
    public function index()
    {
        return view('kegiatan-rinci.index');
    }

    public function fetch_data()
    {
        return DataTables::of(KegiatanRinci::all())->toJson();
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            // ambil data tanpa action
            $data = $request->except('action');

            // update atau delete program
            if ($request->action == 'edit') {
                KegiatanRinci::where('id', $request->id)->update($data);
            }

            if ($request->action == 'delete') {
                KegiatanRinci::where('id', $request->id)->delete();
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
            "Uraian_Kegiatan" => $req->Uraian_Kegiatan,
            "Rencana_Jadwal_Pelaksanaan" => $req->Rencana_Jadwal_Pelaksanaan,
            "Kebutuhan_Kegiatan" => $req->Kebutuhan_Kegiatan,
        ];

        KegiatanRinci::create($data);
        return response()->json(['success'=> 'Berhasil menyimpan data']);
    }
}
