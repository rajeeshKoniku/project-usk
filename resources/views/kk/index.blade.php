<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Home')
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
                                <th>Pk_Menteri</th>
                                <td>TW_1</td>
                                <td>TW_2</td>
                                <td>TW_3</td>
                                <td>TW_4</td>
                                <td>Bobot</td>
                                <td>Aksi</td>
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
                            <label for="Kode_IK" class="col-sm-2 col-form-label">Kode IK</label>
                            <div class="col-sm-10">
                                <select class="form-control bg-dark" style="width: XXXpx;" name="Kode_IK" id="Kode_IK">
                                    <?php foreach ( $data as $x ) { ?>
                                        <option value="<?php echo $x->Kode_IK; ?>"> <?php echo $x->Kode_IK; ?> || <?php echo $x->Indikator_Kinerja; }?></option>
                                </select>
                                {{-- <input type="text" class="form-control text-light px-2" name="Kode_IK" id="Kode_IK"> --}}
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Pk_Menteri" class="col-sm-2 col-form-label">Pk Menteri</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="Pk_Menteri" id="Pk_Menteri">
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
                            <label for="Bobot" class="col-sm-2 col-form-label"> Bobot</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control text-light px-2" name="Bobot" id="Bobot">
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


    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // fetch/ambil data datatable
            $('#tabelKk').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": "{{ route('kk.fetch_data') }}",
                columns: [
                    {
                        data: "id",
                        name: "id"
                    },
                    {
                        data: "Kode_IK",
                        name: "Kode_IK",
                    },
                    {
                        data: "Indikator_Kinerja",
                        name: "Indikator_Kinerja",
                    },
                    {
                        data: "Pk_Menteri",
                        name: "Pk_Menteri"
                    },
                    {
                        data: "tw_1",
                        name: "tw_1"
                    },
                    {
                        data: "tw_2",
                        name: "tw_2"
                    },
                    {
                        data: "tw_3",
                        name: "tw_3"
                    },
                    {
                        data: "tw_4",
                        name: "tw_4"
                    },
                    {
                        data: "Bobot",
                        name: "Bobot"
                    },
                ],
                dom: 'Bflrtip',
                buttons: [{
                    text: 'Tambah',
                    action: function(e, dt, node, config) {
                        $('#tambahModal').modal('show')
                    }
                }, 'copy', 'excel', 'pdf']
            });

            // saat draw tabel, jalankan tabledit
            $('#tabelKk').on('draw.dt', function() {
                $('#tabelKk').Tabledit({
                    url: "{{ route('kk.action') }}",
                    dataType: "json",
                    // eventType: 'dblclick', =====> pakai ini jika ingin doubleclick / tanpa edit button
                    // editButton: false,
                    columns: {
                        identifier: [0, 'id'],
                        editable: [
                            [3 ,'Pk_Menteri'],
                            [4 ,'tw_1'],
                            [5 ,'tw_2'],
                            [6 ,'tw_3'],
                            [7 ,'tw_4'],
                            [8 ,'Bobot']
                        ]
                    },
                    restoreButton: false,
                    buttons: {
                          edit: {
                            class: 'btn btn-sm btn-success m-1',
                            html: '<span class="lni lni-pencil"></span>',
                            action: 'edit'
                        },
                        delete: {
                            class: 'btn btn-sm btn-danger m-1',
                            html: '<span class="lni lni-trash"></span>',
                            action: 'delete'
                        },
                        save: {
                            class: 'btn btn-sm btn-success',
                            html: 'Save'
                        },
                        restore: {
                            class: 'btn btn-sm btn-warning',
                            html: 'Restore',
                            action: 'restore'
                        },
                        confirm: {
                            class: 'btn btn-sm btn-danger',
                            html: 'Confirm'
                        }
                    },
                    onSuccess: function(data, textStatus, jqXHR) {
                        // console.log(data, textStatus, jqXHR);
                        // jika aksi hapus maka hapus data dari baris dan reload tabelKk
                        if (data.action == 'delete') {
                            $('#' + data.id).remove()
                            // $('#tabelKk').DataTable().ajax.reload();
                            $('#tabelKk').Datatable().reload(null, false);
                        }
                    },
                });
            });

            //////////////// tambah program ////////////////////////
            $('#save').click(function() {
                let Kode_IK = $('#Kode_IK').val();
                let Pk_Menteri = $('#Pk_Menteri').val();
                let tw_1 = $('#tw_1').val();
                let tw_2 = $('#tw_2').val();
                let tw_3 = $('#tw_3').val();
                let tw_4 = $('#tw_4').val();
                let Bobot = $('#Bobot').val();
                
                $.ajax({
                    url: "{{ route('kk.store') }}",
                    type: 'POST',
                    data: {
                        Kode_IK,
                        Pk_Menteri,
                        tw_1,
                        tw_2,
                        tw_3,
                        tw_4,
                        Bobot
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#Kode_IK').val('')
                        $('#Pk_Menteri').val('')
                        $('#tw_1').val('')
                        $('#tw_2').val('')
                        $('#tw_3').val('')
                        $('#tw_4').val('')
                        $('#Bobot').val('')

                        // setelah berhasil, reload tabelKk
                        $('#tabelKk').DataTable().ajax.reload();
                        $('#tambahModal').modal('hide');
                    }
                });
            })
        });
    </script>

@endsection
