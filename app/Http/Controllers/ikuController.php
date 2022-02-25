<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iku;

class ikuController extends Controller
{
    // //
    public function index(){
        $data = Iku::all();
        return view('iku/iku', compact('data'));
    }

     public function tambah(Request $req){
        $data = [
            "index_indikator" => $req->index_iku,
            "indikator_kinerja" => $req->indikator
        ];
        Iku::create($data);
        return redirect('/')->with('status', 'Data berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $id = $request->route('id');
        $data = Iku::find($id);
        return view('iku.edit',compact('id', 'data'));
    }

     public function update(Request $req)
    {
       $id = $req->route('id');
        Iku::where('id', $id)
            ->update([
                'index_indikator' => $req->index_iku,
                'indikator_kinerja' => $req->indikator
            ]);
        return redirect('/')->with('status', 'Data berhasil diubah');

    }
    //App\Model::destroy(1);
    public function delete(Request $req)
    {
        $id = $req->route('id');
        Iku::destroy($id);
        return redirect('/')->with('status', 'Data berhasil dihapus');


    }
}
