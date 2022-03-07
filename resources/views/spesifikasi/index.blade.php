<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Spesifikasi ~')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabelIku" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Akun</th>
                                <th>Kebutuhan Kegiatan</th>
                                <th>Jenis Kegiatan</th>
                                <th>Merk</th>
                                <th>Type</th>
                                <th>Catalog</th>
                                <th>Kuantitas</th>
                                <th>Durasi</th>
                                <th>Kegiatan</th>
                                <th>harga_Satuan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('spesifikasi.modalTambah')
@endsection

@push('scripts')
    @include('spesifikasi.script')
@endpush
