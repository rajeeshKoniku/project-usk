<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Data Kegiatan')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabelKk" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Kegiatan</th>
                                <th>Uraian Kegiatan</th>
                                <th>Rencana Jadwal Pelaksanaan</th>
                                <th>Kebutuhan Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah KK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form --}}
                    <form>
                      
                        <div class="mb-3 row">
                            <label for="kode_keg" class="col-sm-2 col-form-label">Kode Kegiatan</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="kode_keg" id="kode_keg">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Uraian_Kegiatan" class="col-sm-2 col-form-label">Uraian Kegiatan</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="Uraian_Kegiatan" id="Uraian_Kegiatan">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Rencana_Jadwal_Pelaksanaan" class="col-sm-2 col-form-label">Rencana Jadwal Pelaksanaan</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="Rencana_Jadwal_Pelaksanaan" id="Rencana_Jadwal_Pelaksanaan">
                            </div>
                        </div>

                         <div class="mb-3 row">
                            <label for="Kebutuhan_Kegiatan" class="col-sm-2 col-form-label">Kebutuhan Kegiatan</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="Kebutuhan_Kegiatan" id="Kebutuhan_Kegiatan">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save">Save</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    @include('kegiatan-rinci.script')
@endpush

