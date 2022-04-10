<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Program')
@section('content')

    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Program</th>
                                <th>Program</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $x)
                        <tr>
                            <td >{{ $x->id }}</td>
                            <td contenteditable="true">{{ $x->kode_prog}}</td>
                            <td contenteditable="true">{{ $x->program}}</td>
                            <td style="column-width: 200px;">
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
    @include('program.script')
@endpush
