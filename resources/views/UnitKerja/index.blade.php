<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Unit Kerja')
@section('content')
<h3>Form Unit Kerja</h3>
<div class="outer-wrapper">
<div class="table-wrapper">
    <table>
        <thead>
            <th>ID</th>
            <th>Unit Kerja</th>
            <th>Nama Pengguna</th>
            <th>Level Pengguna</th>
            <th>Aksi</th>
        </thead>
        <tbody>
        @foreach($UNITKERJA as $dataUnitKerja)
                        <tr>
                            <td>{{ $dataUnitKerja->id }}</td>
                            <td style="width: 200px;" contenteditable="true">{{ $dataUnitKerja->unit_kerja}}</td>
                            <td style="width: 200px;" contenteditable="true">{{ $dataUnitKerja->nama_pengguna}}</td>
                            <td style="width: 200px;" contenteditable="true">{{ $dataUnitKerja->level_pengguna}}</td>

                            <td style="width: 200px;">
                                <span class="del_btn"><i role="button" class="rounded bg-danger p-3 fa-solid fa-trash fa-sm"></i></span>
                                <span class="save_btn"><i role="button" class="rounded bg-info p-3 fa-solid fa-floppy-disk fa-sm"></i></span>
                                <span class="new_btn"><i role="button" class="rounded bg-success p-3 fa-solid fa-plus fa-sm"></i></span>
                            </td>
                        </tr>
                        @endforeach
        </tbody>
    </table>
</div>
</div>
 {{--    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Unit Kerja</th>
                                <th>Nama Pengguna</th>
                                <th>Level Pengguna</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($UNITKERJA as $dataUnitKerja)
                        <tr>
                            <td>{{ $dataUnitKerja->id }}</td>
                            <td contenteditable="true">{{ $dataUnitKerja->unit_kerja}}</td>
                            <td contenteditable="true">{{ $dataUnitKerja->nama_pengguna}}</td>
                            <td contenteditable="true">{{ $dataUnitKerja->level_pengguna}}</td>

                            <td>
                                <span class="del_btn"><i role="button" class="rounded bg-danger p-3 fa-solid fa-trash fa-sm"></i></span>
                                <span class="save_btn"><i role="button" class="rounded bg-info p-3 fa-solid fa-floppy-disk fa-sm"></i></span>
                                <span class="new_btn"><i role="button" class="rounded bg-success p-3 fa-solid fa-plus fa-sm"></i></span>
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
    @include('UnitKerja.script')
@endpush
