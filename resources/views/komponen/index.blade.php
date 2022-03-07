<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Komponen ~')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabelIku" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kebutuhan Kegiatan</th>
                                <th>Rincian Kegiatan</th>
                                <th>Akun</th>
                                <th>Jenis Belanja</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('komponen.modalTambah')
@endsection

@push('scripts')
    @include('komponen.script')
@endpush
