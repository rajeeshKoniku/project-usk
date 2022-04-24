<?php

namespace App\Http\Controllers;

use App\Models\Rpk;
use App\Models\Rab;
use App\Models\Kk;
use App\Models\RincianProgram;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RpkController extends Controller
{  
    public function index()
    {
        $RPK = Rpk::get();
        $RINCIANPROGRAM = RincianProgram::get()->all('MAK');
        $KK = Kk::whereNotNull(['tw_1','tw_2','tw_3','tw_4',])->get()->all('kode_ik');
        return view('rpk.index',compact('RPK', 'KK','RINCIANPROGRAM'));
    }
    public function get(Request $x)
    {
        $iku = substr($x->kode_ik,0,8);
        $dataProg = DB::select( DB::raw("SELECT kode_prog from tb_prog where kode_prog LIKE '%$iku%'"));
        $dataIku = DB::select( DB::raw("SELECT indikator_kinerja FROM tb_ik WHERE kode_ik = '$x->kode_ik'"));
        return array($dataProg, $dataIku);
    }
    public function getSingleProg(Request $x)
    {
        $dataProg = DB::select( DB::raw("SELECT program FROM tb_prog WHERE kode_prog = '$x->kode_prog'"));
        return $dataProg;
    }
    public function del(Request $x)
    {
        Rpk::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $req = [
            "kode_ik" => $x->kode_ik,
            "kode_program" => $x->kode_program,
            "rincian_program" => $x->rincian_program,
            "nama_kegiatan" => $x->nama_kegiatan,
            "Proposal_Project" => $x->proposal_project,
            "Kebutuhan_Kegiatan" => $x->kebutuhan_kegiatan,
            "Rencana_Jadwal_Pelaksanaan" => $x->Rencana_Jadwal_Pelaksanaan,
            "tahun" => $x->tahun,
        ];
        Rab::create([
            "rincian_program" => $x->rincian_program,
            "nama_kegiatan" => $x->nama_kegiatan,
            "kebutuhan_kegiatan" => $x->kebutuhan_kegiatan,
        ]);
        Rpk::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(["OK", $req]);
    }
    public function insertImg(Request $x)
    {
         if(!empty($_FILES['file'])){
            $upload = 'err';
            $targetDir = "uploads/";
            $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif');

            $fileName = basename($_FILES['file']['name']);
            $targetFilePath = $targetDir.$fileName;

            //memeriksa apakah tipe file valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // upload file ke server
                if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
                    $upload = 'ok';
                }
            }
        }

            return response()->json(['ok']);
    }
}
