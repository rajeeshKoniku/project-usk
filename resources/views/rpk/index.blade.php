<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman RPK')
@section('content')

    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                 <th>Kode IK</th>,
                                 <th>Indikator Kinerja</th>,
                                <th>Kode Program</th>,
                                <th>Program</th>,
                                <th>Rincian Program</th>,
                                <th>Nama Kegiatan</th>,
                                <th>TOR/KAK/ProposalProject</th>,
                                <th>Kebutuhan Kegiatan</th>,
                                <th>Rencana Jadwal Pelaksanaan</th>,
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $x)
                        <tr>
                            <td >{{ $x->id }}</td>
                            <td>
                                <a class="d-inline pr-2">{{ $x->kode_ik }} </a>
                                <select name="kode_ik" type="text" id="kode_ik" class="kode_ik d-inline form-control w-auto required">
                                <?php foreach($dataLooping as $ora): ?>
                                  <option
                                  value="<?php echo $ora->kode_ik?>"><?php echo $ora->kode_ik; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </td>
                            <td></td>
                            <td>
                                <select name="kode_ik" class="kode_prog form-control d-inline w-auto required" id=""></select>
                            </td>
                            <td></td>
                            <td contenteditable="true">{{ $x->rincian_program}}</td>
                            <td contenteditable="true">{{ $x->nama_kegiatan}}</td>
                            <td contenteditable="true">{{ $x->Proposal_Project}}</td>
                            <td contenteditable="true">{{ $x->Kebutuhan_Kegiatan}}</td>
                            <td contenteditable="true">{{ $x->Rencana_Jadwal_Pelaksanaa}}</td>

                            <td>
                                <span class="del_btn"><i role="button" class="rounded bg-danger p-3 fa-solid fa-trash fa-sm"></i></span>
                                <span class="save_btn"><i role="button" class="rounded bg-info p-3 fa-solid fa-floppy-disk fa-sm"></i></span>
                                </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

 @push('scripts')
    @include('rpk.script')
@endpush
