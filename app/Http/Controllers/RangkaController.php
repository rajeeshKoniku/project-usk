<?php

namespace App\Http\Controllers;

use App\Models\Rangka;
use App\Models\Rab;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RangkaController extends Controller
{
   
    public function index()
    {
        $rangka = Rangka::get();
        $RAB = Rab::select('id','rincian_program','nama_kegiatan','kebutuhan_kegiatan')->get();
        return view('rangka.index',compact('rangka', 'RAB'));
    }
    public function ambilAkun(Request $x)
    {
        // $rincian = DB::SELECT(DB::raw("
        //     SELECT tb_rab.rincian_program, tb_rab.nama_kegiatan, tb_rab.kebutuhan_kegiatan, tb_rancangan_anggaran.AK
        //     from tb_rab
        //     INNER JOIN tb_rancangan_anggaran
        //     ON tb_rab.rincian_program = tb_rancangan_anggaran.Rip;
        // "));
        $rincian = DB::SELECT(DB::raw("SELECT AK FROM tb_rancangan_anggaran WHERE Rip = '$x->rincian' "));
        return $rincian;


    }
    public function del(Request $x)
    {
        Rangka::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $req = [
            'codebase' => $x->codebase,
            'rincian_program' => $x->rincian_program,
            'nama_kegiatan' => $x->nama_kegiatan,
            'kebutuhan_kegiatan' => $x->kebutuhan_kegiatan,
            'akun' => $x->akun,
            'jenis_belanja' => $x->jenis_belanja,
            'PNBP_unitkerja' => $x->PNBP_unitkerja,
            'PNBP_institusi' => $x->PNBP_institusi,
            'BOPTN' => $x->BOPTN,
            'kerjasama' => $x->kerjasama,
            'hibah' => $x->hibah,
            'biaya_kegiatan' => $x->biaya_kegiatan
        ];
        Rangka::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(['SUKSES MENYIMPAN DATA']);
    }
}
