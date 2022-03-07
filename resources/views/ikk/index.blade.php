<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Ikk')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabelIku" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode IK</th>
                                <th>Indikator Kinerja</th>
                                <th>Kode Program</th>
                                <th>Program</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('ikk.modalTambah')
@endsection

@push('scripts')
    @include('ikk.script')
@endpush
