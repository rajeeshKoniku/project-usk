<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman RPK')
@section('content')
<div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                            <tr>
                                <th>ID</th>
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
                                <th width="60%">Aksi</th>
                            </tr>
                        </thead>
                               <tbody>
                         @foreach($RPK as $dataRPK)
                        <tr>
                            <td >{{ $dataRPK->id }}</td>
                            <td>
                                <select name="kode_ik" type="text" id="kode_ik" class="kode_ik d-inline form-control w-auto required">
                                <option value="SILAHKAN PILIH" >SILAHKAN PILIH</option>
                                @foreach($KK as $dataKK)
                                    @if($dataKK->kode_ik === $dataRPK->kode_ik)
                                        <option value="{{$dataKK->kode_ik}}" selected="true">{{$dataKK->kode_ik}}</option>
                                    @else
                                        <option value="{{$dataKK->kode_ik}}" >{{$dataKK->kode_ik}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td>
                            <td class="indikator_kinerja"></td>
                            <td>
                                <select name="kode_prog" class="kode_prog form-control d-inline w-auto required" id=""></select>
                            </td>
                            <td class="program"></td>
                            <td>
                                <select name="MAK" type="text" id="MAK" class="MAK d-inline form-control w-auto required">
                                <option value="SILAHKAN PILIH" >SILAHKAN PILIH</option>
                                @foreach($RINCIANPROGRAM as $dataMAK)
                                    @if($dataMAK->MAK === $dataRPK->rincian_program)
                                        <option value="{{$dataMAK->MAK}}" selected="true">{{$dataMAK->MAK}}</option>
                                    @else
                                        <option value="{{$dataMAK->MAK}}" >{{$dataMAK->MAK}}</option>
                                    @endif
                                @endforeach
                            </td>
                            <td contenteditable="true">{{ $dataRPK->nama_kegiatan}}</td>
                            <td>

                                <div id="uploadStatus"></div>
                               <form id="uploadForm" enctype="multipart/form-data">
                                  <input type="file" id="attachment" name="file" id="fileInput">
                                  <input type="submit">submit</input>
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
                </div>
{{--
    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
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
                                <th width="60%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($RPK as $dataRPK)
                        <tr>
                            <td >{{ $dataRPK->id }}</td>
                            <td>
                                <select name="kode_ik" type="text" id="kode_ik" class="kode_ik d-inline form-control w-auto required">
                                <option value="SILAHKAN PILIH" >SILAHKAN PILIH</option>
                                @foreach($KK as $dataKK)
                                    @if($dataKK->kode_ik === $dataRPK->kode_ik)
                                        <option value="{{$dataKK->kode_ik}}" selected="true">{{$dataKK->kode_ik}}</option>
                                    @else
                                        <option value="{{$dataKK->kode_ik}}" >{{$dataKK->kode_ik}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td>
                            <td class="indikator_kinerja"></td>
                            <td>
                                <select name="kode_prog" class="kode_prog form-control d-inline w-auto required" id=""></select>
                            </td>
                            <td class="program"></td>
                            <td>
                                <select name="MAK" type="text" id="MAK" class="MAK d-inline form-control w-auto required">
                                <option value="SILAHKAN PILIH" >SILAHKAN PILIH</option>
                                @foreach($RINCIANPROGRAM as $dataMAK)
                                    @if($dataMAK->MAK === $dataRPK->rincian_program)
                                        <option value="{{$dataMAK->MAK}}" selected="true">{{$dataMAK->MAK}}</option>
                                    @else
                                        <option value="{{$dataMAK->MAK}}" >{{$dataMAK->MAK}}</option>
                                    @endif
                                @endforeach
                            </td>
                            <td contenteditable="true">{{ $dataRPK->nama_kegiatan}}</td>
                            <td>

                                <div id="uploadStatus"></div>
                               <form id="uploadForm" enctype="multipart/form-data">
                                  <input type="file" name="file" id="fileInput">
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
                                <select name="Rencana_Jadwal_Pelaksanaan" class="Rencana_Jadwal_Pelaksanaan d-inline form-control w-auto required">
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
        </div>
    </div> --}}
@endsection

 @push('scripts')
    @include('rpk.script')
@endpush
