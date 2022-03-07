<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman KK')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabelKk" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode IK</th>
                                <th>Indikator Kinerja</th>
                                <th>pk_menteri</th>
                                <td>TW_1</td>
                                <td>TW_2</td>
                                <td>TW_3</td>
                                <td>TW_4</td>
                                <td>bobot</td>
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
                            <label for="kode_ik" class="col-sm-2 col-form-label">Kode IK</label>
                            <div class="col-sm-10">
                                <select class="form-control bg-dark" style="width: XXXpx;" name="ik_id" id="ik_id">
                                    <?php foreach ( $data as $x ) { ?>
                                        <option value="<?php echo $x->kode_ik; ?>"> <?php echo $x->kode_ik; ?> || <?php echo $x->indikator_kinerja; }?></option>
                                </select>
                                {{-- <input type="text" class="form-control text-light px-2" name="kode_ik" id="kode_ik"> --}}
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="pk_menteri" class="col-sm-2 col-form-label">Pk Menteri</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="pk_menteri" id="pk_menteri">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tw_1" class="col-sm-2 col-form-label">TW 1</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="tw_1" id="tw_1">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tw_2" class="col-sm-2 col-form-label">TW 2</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="tw_2" id="tw_2">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tw_3" class="col-sm-2 col-form-label">TW 3</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="tw_3" id="tw_3">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tw_4" class="col-sm-2 col-form-label">TW 4</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="tw_4" id="tw_4">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="bobot" class="col-sm-2 col-form-label"> bobot</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="bobot" id="bobot">
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
    @include('kk.script')
@endpush

