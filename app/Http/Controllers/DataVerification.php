<?php

namespace App\Http\Controllers;

use App\Models\KK;
use App\Models\Rpk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataVerification extends Controller
{

    public function verificationPerkin()
    {
        $data = KK::whereNotNull(['tw_1', 'tw_2', 'tw_3', 'tw_4'])->get();
        $options = [KK::DISETUJUI => 'Disetujui', KK::DITOLAK => 'Ditolak'];
        return view('dataverification.verificationPerkin', compact('data', 'options'));
    }

    public function updateVerificationPerkin(Request $req)
    {
        $data = KK::where('id', $req->id)->update($req->except(['_token']));
        return $data;
    }

    public function verificationRekat()
    {
        $dataRPK = DB::select(DB::raw("SELECT rpk.id,
        rpk.rincian_program,
        rpk.kode_program,
        rpk.Proposal_Project,
        rpk.rincian_program,
        rpk.nama_kegiatan,
        rpk.Kebutuhan_Kegiatan,
        rpk.verifikasi_spi,
        rpk.verifikasi_sarpras,
        rangka.akun,
        rangka.jenis_belanja,
        rab.kuantitas,
        rab.merk,
        rab.type,
        rab.catalog,
        rab.proposal_project,
        rab.rab_detail,
        rab.perencanaan_gambar,
        rab.harga_satuan
        FROM tb_rpk rpk INNER JOIN tb_rab rab
        ON rpk.rincian_program COLLATE utf8mb4_unicode_ci = rab.rincian_program INNER JOIN tb_rangka rangka ON rab.rincian_program = rangka.rincian_program"));

        $options = [KK::DISETUJUI => 'Disetujui', KK::DITOLAK => 'Ditolak'];
        return view('dataverification.verificationRekat', compact('dataRPK', 'options'));
    }

    public function updateVerificationRekat(Request $req)
    {
        $data = Rpk::where('id', $req->id)->update($req->except(['_token']));
        return $data;
    }
}
