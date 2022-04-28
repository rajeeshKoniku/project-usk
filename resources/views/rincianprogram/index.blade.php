<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Rancangan Anggaran')
@section('content')

    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CODEBASE</th>
                                <th>Rip</th>
                                <th>Keg</th>
                                <th>KRO</th>
                                <th>RO</th>
                                <th>KP</th>
                                <th>SK</th>
                                <th>AK</th>
                                <th>MAK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($RincianProgram as $data)
                        <tr>
                            <td >{{ $data->id }}</td>
                            <td>{{ $data->codebase}}</td>
                            <td contenteditable="true">{{ $data->Rip}}</td>
                            <td contenteditable="true">{{ $data->Keg}}</td>
                            <td contenteditable="true">{{ $data->KRO}}</td>
                            <td contenteditable="true">{{ $data->RO}}</td>
                            <td contenteditable="true">{{ $data->KP}}</td>
                            <td contenteditable="true">{{ $data->SK}}</td>
                            <td contenteditable="true">{{ $data->AK}}</td>
                            <td contenteditable="true">{{ $data->MAK}}</td>
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
    </div>
@endsection

 @push('scripts')
    @include('rincianprogram.script')
@endpush
