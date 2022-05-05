<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman RPK')
@section('content')
  <h3>Form Rencana Program Kegiatan</h3>
<div class="outer-wrapper">
<div class="table-wrapper">
    <table>
        <thead>
            <th>ID</th>
            <th>Unit Kerja</th>
            <th>Kode IK</th>
            <th style="position: relative;">Indikator Kinerja</th>
            <th>Kode Program</th>
            <th>Program</th>
            <th>Rincian Program</th>
            <th>Nama Kegiatan</th>
            <th>TOR/KAK/ProposalProject</th>
            <th>Kebutuhan Kegiatan</th>
            <th>Rencana Jadwal Pelaksanaan</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </thead>
        <tbody>
             @foreach($RPK as $dataRPK)
                        <tr id="attachment" class="item">
                            <td >{{ $dataRPK->id }}</td>
                            <td></td>
                            <td>
                                <select name="kode_ik" type="text" id="kode_ik" class="kode_ik d-inline form-control w-auto required">
                                <option value="SILAHKAN PILIH" selected="true">SILAHKAN PILIH</option>
                                @foreach($KK as $dataKK)
                                    <option  value="{{$dataKK->kode_ik}}" >{{$dataKK->kode_ik}}</option>
                                @endforeach
                                </select>
                            </td>
                            <td class="indikator_kinerja" style="width: 300px;"></td>
                            <td>
                                <select name="kode_prog" class="kode_prog form-control d-inline w-auto required" id=""></select>
                            </td>
                            <td class="program" style="width: 300px;"></td>
                            <td>
                                <select style="font-size: 10px; font-weight: bold;" name="rincian_program" type="text" id="rincian_program" class="rincian_program d-inline form-control w-auto required">
                                <option value="SILAHKAN PILIH" >SILAHKAN PILIH</option>
                                @foreach($RINCIANPROGRAM as $dataMAK)
                                    @if($dataMAK->Rip === $dataRPK->rincian_program)
                                        <option value="{{$dataMAK->Rip}}" selected="true">{{$dataMAK->Rip}}</option>
                                    @else
                                        <option value="{{$dataMAK->Rip}}" >{{$dataMAK->Rip}}</option>
                                    @endif
                                @endforeach
                            </td>
                            <td contenteditable="true">{{ $dataRPK->nama_kegiatan}}</td>
                            <td>
                                <div id="uploadStatus"></div>
                               <form id="uploadForm" enctype="multipart/form-data">
                                  <input type="file" class="fu" name="file" id="fileInput">
                                </form>
                            </td>
                            <td contenteditable="true">{{ $dataRPK->Kebutuhan_Kegiatan}}</td>
                            <td>
                                <select style="font-size: 10px; font-weight: bold;"  name="Rencana_Jadwal_Pelaksanaan" class="Rencana_Jadwal_Pelaksanaan d-inline form-control w-auto required">
                                    <option value="TRIWULAN 1">TRIWULAN 1</option>
                                    <option value="TRIWULAN 2">TRIWULAN 2</option>
                                    <option value="TRIWULAN 3">TRIWULAN 3</option>
                                    <option value="TRIWULAN 4">TRIWULAN 4</option>
                                </select>
                            </td>
                            <td>
                                <select style="font-size: 10px; font-weight: bold;"  name="tahun" class="tahun d-inline form-control w-auto required">
                                    <option value="PILIH TAHUN">PILIH TAHUN</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2025">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                            </td>
                            <td>
                                 <span class="del_btn"><i role="button" class="rounded bg-danger py-3 px-2 fa-solid fa-trash fa-sm"></i></span>
                                <span class="save_btn"><i role="button" class="rounded bg-info py-3 px-2 fa-solid fa-floppy-disk fa-sm"></i></span>
                                <span class="new_btn"><i role="button" class="rounded bg-success py-3 px-2 fa-solid fa-plus fa-sm"></i></span>
                            </td>
                        </tr>
                        @endforeach
        </tbody>
    </table>
</div>
</div>
{{-- <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabel" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                            <tr>
                                <th>ID</th>
                                <th>Unit Kerja</th>
                                 <th>Kode IK</th>
                                 <th>Indikator Kinerja</th>
                                <th>Kode Program</th>
                                <th>Program</th>
                                <th>Rincian Program</th>
                                <th>Nama Kegiatan</th>
                                <th>TOR/KAK/ProposalProject</th>
                                <th>Kebutuhan Kegiatan</th>
                                <th>Rencana Jadwal Pelaksanaan</th>
                                <th>Tahun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                               <tbody>

                         @foreach($RPK as $dataRPK)
                        <tr id="attachment" class="item">
                            <td >{{ $dataRPK->id }}</td>
                            <td></td>
                            <td>
                                <select name="kode_ik" type="text" id="kode_ik" class="kode_ik d-inline form-control w-auto required">
                                <option value="SILAHKAN PILIH" selected="true">SILAHKAN PILIH</option>
                                @foreach($KK as $dataKK)
                                    <option  value="{{$dataKK->kode_ik}}" >{{$dataKK->kode_ik}}</option>
                                @endforeach
                                </select>
                            </td>
                            <td class="indikator_kinerja"></td>
                            <td>
                                <select name="kode_prog" class="kode_prog form-control d-inline w-auto required" id=""></select>
                            </td>
                            <td class="program"></td>
                            <td>
                                <select name="rincian_program" type="text" id="rincian_program" class="rincian_program d-inline form-control w-auto required">
                                <option value="SILAHKAN PILIH" >SILAHKAN PILIH</option>
                                @foreach($RINCIANPROGRAM as $dataMAK)
                                    @if($dataMAK->Rip === $dataRPK->rincian_program)
                                        <option value="{{$dataMAK->Rip}}" selected="true">{{$dataMAK->Rip}}</option>
                                    @else
                                        <option value="{{$dataMAK->Rip}}" >{{$dataMAK->Rip}}</option>
                                    @endif
                                @endforeach
                            </td>
                            <td contenteditable="true">{{ $dataRPK->nama_kegiatan}}</td>
                            <td>
                                <div id="uploadStatus"></div>
                               <form id="uploadForm" enctype="multipart/form-data">
                                  <input type="file" class="fu" name="file" id="fileInput">
                                </form>
                            </td>
                            <td contenteditable="true">{{ $dataRPK->Kebutuhan_Kegiatan}}</td>
                            <td>
                                <select name="Rencana_Jadwal_Pelaksanaan" class="Rencana_Jadwal_Pelaksanaan d-inline form-control w-auto required">
                                    <option value="TRIWULAN 1">TRIWULAN 1</option>
                                    <option value="TRIWULAN 2">TRIWULAN 2</option>
                                    <option value="TRIWULAN 3">TRIWULAN 3</option>
                                    <option value="TRIWULAN 4">TRIWULAN 4</option>
                                </select>
                            </td>
                            <td>
                                <select name="tahun" class="tahun d-inline form-control w-auto required">
                                    <option value="PILIH TAHUN">PILIH TAHUN</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2025">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                            </td>
                            <td>
                                 <span class="del_btn"><i role="button" class="rounded bg-danger py-3 px-2 fa-solid fa-trash fa-sm"></i></span>
                                <span class="save_btn"><i role="button" class="rounded bg-info py-3 px-2 fa-solid fa-floppy-disk fa-sm"></i></span>
                                <span class="new_btn"><i role="button" class="rounded bg-success py-3 px-2 fa-solid fa-plus fa-sm"></i></span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                            </table>
                        </div>
                    </div>
</div> --}}

@endsection

 @push('scripts')
    @include('rpk.script')
@endpush
