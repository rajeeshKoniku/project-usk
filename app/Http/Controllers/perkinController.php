<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perkin;
use App\Models\Iku;

class perkinController extends Controller
{
    //
    public function index(){
        $data = Perkin::all();
        return view('perkin/perkin', compact('data'));
    }
    public function formTambah(){
        $iku = Iku::all();
        return view('perkin/tambahPerkin', compact('iku'));
    }

     public function tambah(Request $req){
        $data = [
           "Sasaran" => $req->Sasaran,
           "Kode_IK" => $req->Kode_IK,
           "Indikator_Kinerja"  => $req->Indikator_Kinerja,
           "Satuan" => $req->Satuan,
           "Pk_Menteri" => $req->Pk_Menteri,
           "tw_1" => $req->tw_1,
           "tw_2" => $req->tw_2,
           "tw_3" => $req->tw_3,
           "tw_4" => $req->tw_4,
           "Bobot" => $req->Bobot,
        ];
        Perkin::create($data);
        return redirect('/perkin')->with('status', 'Data berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $id = $request->route('id');
        $data = Perkin::find($id);
        return view('perkin.edit',compact('id', 'data'));
    }

     public function update(Request $req)
    {
       $id = $req->route('id');
        Perkin::where('id', $id)
            ->update([
                   "Sasaran" => $req->Sasaran,
                   "Kode_IK" => $req->Kode_IK,
                   "Indikator_Kinerja"  => $req->Indikator_Kinerja,
                   "Satuan" => $req->Satuan,
                   "Pk_Menteri" => $req->Pk_Menteri,
                   "tw_1" => $req->tw_1,
                   "tw_2" => $req->tw_2,
                   "tw_3" => $req->tw_3,
                   "tw_4" => $req->tw_4,
                   "Bobot" => $req->Bobot
            ]);
        return redirect('/perkin')->with('status', 'Data berhasil diubah');

    }
    //App\Model::destroy(1);
    public function delete(Request $req)
    {
        $id = $req->route('id');
        Perkin::destroy($id);
        return redirect('/perkin')->with('status', 'Data berhasil dihapus');


    }
}
