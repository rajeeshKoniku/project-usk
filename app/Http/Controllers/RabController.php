<?php

namespace App\Http\Controllers;

use App\Models\Rab;
use App\Models\Rpk;
use App\Models\Rangka;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RabController extends Controller
{
   public function index()
    {
        $RAB = Rab::get();
        return view('rab.index',compact('RAB'));
    }
    public function del(Request $x)
    {
        Rab::where('id', $x->id)->delete();
        return response()->json(["SUKSES HAPUS"]);
    }
    public function add(Request $x)
    {
          $req = [
            "kuantitas" => $x->kuantitas,
            "kuantitas_2" => $x->kuantitas_2,
            "durasi" => $x->durasi,
            "durasi_2" => $x->durasi_2,
            "kegiatan" => $x->kegiatan,
            "kegiatan_2" => $x->kegiatan_2,
            "merk" => $x->merk,
            "type" => $x->type,
            "harga_satuan" => $x->harga_satuan,
            "catalog" => $x->newCatalogFile,
            "proposal_project" => $x->newProjectFile,
            "rab_detail" => $x->newRabdetailFile,
            "perencanaan_gambar" => $x->newPerencanaangambarFile,
            "harga_satuan" => $x->harga_satuan,
            "jumlah" =>  (int)$x->kuantitas * (int)$x->durasi * (int)$x->kegiatan * (int)$x->harga_satuan,
        ];
        Rab::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(["SUKSES"]);
    }
    public function addCatalog(Request $req){
          if(!empty($_FILES['fileCatalog'])){
            $upload = 'error';
            $targetDir = "uploads/rab/catalog/";
            $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif');
            $fileName = basename($_FILES['fileCatalog']['name']);
            $targetFilePath = $targetDir.$fileName;

            //memeriksa apakah tipe file valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // upload file ke server
                if(move_uploaded_file($_FILES['fileCatalog']['tmp_name'], $targetFilePath)){
                    $upload = 'ok';
                }else{
                    $upload = 'err';
                }
            }
            return $upload;
        }
    }

    public function addProject(Request $req){
          if(!empty($_FILES['fileProject'])){
            $upload = 'error';
            $targetDir = "uploads/rab/project/";
            $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif', 'xlxs','xls');
            $fileName = basename($_FILES['fileProject']['name']);
            $targetFilePath = $targetDir.$fileName;

            //memeriksa apakah tipe file valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // upload file ke server
                if(move_uploaded_file($_FILES['fileProject']['tmp_name'], $targetFilePath)){
                    $upload = 'ok';
                }else{
                    $upload = 'err';
                }
            }
            return $upload;
        }
    }
    public function addRab(Request $req){
          if(!empty($_FILES['fileRab'])){
            $upload = 'error';
            $targetDir = "uploads/rab/rab_detail/";
            $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif', 'xlxs','xls');
            $fileName = basename($_FILES['fileRab']['name']);
            $targetFilePath = $targetDir.$fileName;

            //memeriksa apakah tipe file valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // upload file ke server
                if(move_uploaded_file($_FILES['fileRab']['tmp_name'], $targetFilePath)){
                    $upload = 'ok';
                }else{
                    $upload = 'err';
                }
            }
            return $upload;
        }
    }
    public function addGambar(Request $req){
          if(!empty($_FILES['fileGambar'])){
            $upload = 'error';
            $targetDir = "uploads/rab/gambar/";
            $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif', 'xlxs','xls');
            $fileName = basename($_FILES['fileGambar']['name']);
            $targetFilePath = $targetDir.$fileName;

            //memeriksa apakah tipe file valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // upload file ke server
                if(move_uploaded_file($_FILES['fileGambar']['tmp_name'], $targetFilePath)){
                    $upload = 'ok';
                }else{
                    $upload = 'err';
                }
            }
            return $upload;
        }
    }
}
