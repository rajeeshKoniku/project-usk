<?php

namespace App\Http\Controllers;

use App\Models\Spesifikasi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SpesifikasiController extends Controller
{
     public function index()
    {
        return view('spesifikasi.index');
    }

    public function fetch_data()
    {
        return DataTables::of(Spesifikasi::all())->toJson();
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            // ambil data tanpa action
            $data = $request->except('action');

            // update atau delete program
            if ($request->action == 'edit') {
                Spesifikasi::where('id', $request->id)->update($data);
            }

            if ($request->action == 'delete') {
                Spesifikasi::where('id', $request->id)->delete();
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
            "akun" => $req->akun,
            "kebutuhan_kegiatan" => $req->kebutuhan_kegiatan,
            "jenis_kegiatan" => $req->jenis_kegiatan,
            "merk" => $req->merk,
            "type" => $req->type,
            "catalog" => $req->catalog,
            "kuantitas" => $req->kuantitas,
            "durasi" => $req->durasi,
            "kegiatan" => $req->kegiatan,
            "harga_Satuan" => $req->harga_Satuan
        ];

        Spesifikasi::create($data);
        return response()->json(['success'=> 'Berhasil menyimpan data']);
    }
}
