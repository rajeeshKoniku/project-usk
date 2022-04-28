<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman KK')
@section('content')

    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Unit Kerja</th>
                                <th>Kode IK</th>
                                <th>PK Mentri</th>
                                <th>TW 1</th>
                                <th>TW 2</th>
                                <th>TW 3</th>
                                <th>TW 4</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $x)
                        <tr>
                            <td >{{ $x->id }}</td>
                            <td ></td>
                            <td>
                               {{ $x->kode_ik}}
                            </td>
                            <td contenteditable="false">{{ $x->pk_menteri}}</td>
                            <td contenteditable="true">{{ $x->tw_1}}</td>
                            <td contenteditable="true">{{ $x->tw_2}}</td>
                            <td contenteditable="true">{{ $x->tw_3}}</td>
                            <td contenteditable="true">{{ $x->tw_4}}</td>
                            <td contenteditable="false">{{ $x->bobot}}</td>

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
    </div>
@endsection

 @push('scripts')
    @include('kk.script')
@endpush
