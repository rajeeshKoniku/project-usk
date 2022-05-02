<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Sasaran')
@section('content')
<h3>Form Sasaran</h3>
<div class="outer-wrapper">
    <div class="table-wrapper">
    <table>
        <thead>
        <th>ID</th>
        <th>Kode SS</th>
        <th>Sasaran</th>
        <th>Aksi</th>
        </thead>
        <tbody>
         @foreach($data as $x)
                        <tr>
                            <td  style="width: 120px;">{{ $x->id }}</td>
                            <td  style="width: 230px;" contenteditable="true">{{ $x->kode_ss}}</td>
                            <td  style="width: 420px;" contenteditable="true">{{ $x->sasaran}}</td>
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
{{--
    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode SS</th>
                                <th>Sasaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $x)
                        <tr>
                            <td >{{ $x->id }}</td>
                            <td contenteditable="true">{{ $x->kode_ss}}</td>
                            <td contenteditable="true">{{ $x->sasaran}}</td>
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
    @include('Ss.script')
@endpush
