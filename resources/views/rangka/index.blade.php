<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Rangka')
@section('content')
<h3>Form Rancangan Anggaran</h3>
<div class="outer-wrapper">
<div class="table-wrapper">
    <table>
        {{-- <thead>
                                <th rowspan="2">ID</th>
                                <th >Unit Kerja</th>
                                <th >Codebase</th>
                                <th>Rincian Program</th>
                                <th>Nama Kegiatan</th>
                                <th>Kebutuhan Kegiatan</th>
                                <th>Akun</th>
                                <th colspan="3">colom</th>
                                <th>BOPTN</th>
                                <th>Kerjasama</th>
                                <th>Hibah</th>
                                <th>Biaya Kegiatan</th>
            <th>Aksi</th>
        </thead> --}}
        <tr>
            <th rowspan="2">ID</th>
            <th rowspan="2">Unit Kerja</th>
            <th rowspan="2">Codebase</th>
            <th rowspan="2">Rincian Program</th>
            <th rowspan="2">Nama Kegiatan</th>
            <th rowspan="2">Kebutuhan Kegiatan</th>
            <th rowspan="2">Akun</th>
            <th rowspan="2">Jenis Belanja</th>
            <th colspan="5">Sumber Dana</th>
            <th rowspan="2">Biaya Kegiatan</th>
            <th rowspan="2">Aksi</th>
          </tr>
          <tr>
            <th>BOPTN</th>
            <th>PNBP Unit Kerja</th>
            <th>PNBP Institusi</th>
            <th>Kerjasama</th>
            <th>Hibah</th>
          </tr>
        <tbody>
            @foreach($rangka as $dataRangka)
                        <tr>
                            <td> {{ $dataRangka->id }} </td>
                            <td> </td>
                            <td> {{ $dataRangka->codebase }} </td>
                            <td id="rincian"> {{ $dataRangka->rincian_program }} </td>
                            <td> {{ $dataRangka->nama_kegiatan }} </td>
                            <td> {{ $dataRangka->kebutuhan_kegiatan }} </td>
                            <td >
                                <select style="width: 145px; font-size: 10px; font-weight: bold;" name="akun" id="akun" class="akun form-control">
                                    <option value="-">SILAHKAN PILIH</option>
                                </select>
                            </td>
                            <td contenteditable="true">{{ $dataRangka->jenis_belanja}}</td>
                            <td contenteditable="true">{{ $dataRangka->PNBP_unitkerja}}</td>
                            <td contenteditable="true">{{ $dataRangka->PNBP_institusi}}</td>
                            <td contenteditable="true">{{ $dataRangka->BOPTN}}</td>
                            <td contenteditable="true">{{ $dataRangka->kerjasama}}</td>
                            <td contenteditable="true">{{ $dataRangka->hibah}}</td>
                            <td contenteditable="true">{{ $dataRangka->biaya_kegiatan}}</td>
                                <td style="width:200px" style="display: inline-table; width: 110px; padding-bottom: 50px;">
                                    <span class="del_btn"><i role="button" class="rounded bg-danger p-3 fa-solid fa-trash fa-sm mr-2"></i></span>
                                    <span class="save_btn"><i role="button" class="rounded bg-info p-3 fa-solid fa-floppy-disk fa-sm"></i></span>
                                    </td>
                            </tr>
                            @endforeach
        </tbody>
    </table>
</div>
</div>
  {{--   <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="rangka" class="table table-striped table-bordered table-dark">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Unit Kerja</th>
                                <th>Codebase</th>
                                <th>Rincian Program</th>
                                <th>Nama Kegiatan</th>
                                <th>Kebutuhan Kegiatan</th>
                                <th>Akun</th>
                                <th>Jenis Belanja</th>
                                <th>PNBP Unit Kerja</th>
                                <th>PNBP Institusi</th>
                                <th>BOPTN</th>
                                <th>Kerjasama</th>
                                <th>Hibah</th>
                                <th>Biaya Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($rangka as $dataRangka)
                        <tr>
                            <td> {{ $dataRangka->id }} </td>
                            <td> </td>
                            <td> {{ $dataRangka->codebase }} </td>
                            <td id="rincian"> {{ $dataRangka->rincian_program }} </td>
                            <td> {{ $dataRangka->nama_kegiatan }} </td>
                            <td> {{ $dataRangka->kebutuhan_kegiatan }} </td>

                            
                            <td >
                                <select style="width: 145px; font-size: 10px; font-weight: bold;" name="akun" id="akun" class="akun form-control">
                                    <option value="-">SILAHKAN PILIH</option>
                                </select>
                            </td>
                            <td contenteditable="true">{{ $dataRangka->jenis_belanja}}</td>
                            <td contenteditable="true">{{ $dataRangka->PNBP_unitkerja}}</td>
                            <td contenteditable="true">{{ $dataRangka->PNBP_institusi}}</td>
                            <td contenteditable="true">{{ $dataRangka->BOPTN}}</td>
                            <td contenteditable="true">{{ $dataRangka->kerjasama}}</td>
                            <td contenteditable="true">{{ $dataRangka->hibah}}</td>
                            <td contenteditable="true">{{ $dataRangka->biaya_kegiatan}}</td>
                                <td style="display: inline-table; width: 110px; padding-bottom: 50px;">
                                    <span class="del_btn"><i role="button" class="rounded bg-danger p-3 fa-solid fa-trash fa-sm mr-2"></i></span>
                                    <span class="save_btn"><i role="button" class="rounded bg-info p-3 fa-solid fa-floppy-disk fa-sm"></i></span>
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
    @include('rangka.script')
@endpush
