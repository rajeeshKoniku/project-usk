<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman IK')
@section('content')

    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode IK</th>
                                <th>Indikator Kinerja</th>
                                <th>Kode SS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $x)
                        <tr>
                            <td >{{ $x->id }}</td>
                            <td contenteditable="true">{{ $x->kode_ik}}</td>
                            <td contenteditable="true">{{ $x->indikator_kinerja}}</td>
                            <td contenteditable="true">{{ $x->ss_id}}</td>

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
    @include('ik.modalTambah')
@endsection

 @push('scripts')
    @include('ik.script')
@endpush
