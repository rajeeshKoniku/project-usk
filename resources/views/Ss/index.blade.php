<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Home')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabelSs" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode SS</th>
                                <th>Sasaran</th>
                                <th>Kode IK</th>
                                <th>Indikator Kinerja</th>
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
                    <h5 class="modal-title" id="tambahModalLabel">Tambah SS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form --}}
                    <form>
                        <div class="mb-3 row">
                            <label for="Kode_SS" class="col-sm-2 col-form-label">Kode SS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext text-light px-2" name="Kode_SS" id="Kode_SS">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Sasaran" class="col-sm-2 col-form-label">Sasaran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext text-light px-2" name="Sasaran" id="Sasaran">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Kode_IK" class="col-sm-2 col-form-label">Kode_IK</label>
                            <div class="col-sm-10">
                                <select class="form-control bg-dark" name="Kode_IK" id="Kode_IK">
                                    <?php foreach ( $data as $x ) { ?>
                                        <option value="<?php echo $x->Kode_IK; ?>"><?php echo $x->Kode_IK ?></option>
                                    <?php }?>

                                </select>
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
            $('#tabelSs').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": "{{ route('ss.fetch_data') }}",
                columns: [
                    {
                        data: "id",
                        name: "id"
                    },
                    {
                        data: "Kode_SS",
                        name: "Kode_SS",
                    },
                    {
                        data: "Sasaran",
                        name: "Sasaran"
                    },
                    {
                        data: "Kode_IK",
                        name: "Kode_IK"
                    },
                    {
                        data: "Indikator_Kinerja",
                        name: "Indikator_Kinerja"
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
            $('#tabelSs').on('draw.dt', function() {
                $('#tabelSs').Tabledit({
                    url: "{{ route('ss.action') }}",
                    dataType: "json",
                    // eventType: 'dblclick', 
                    // editButton: false,
                    columns: {
                        identifier: [0, 'id'],
                        editable: [
                            [1, 'Kode_SS'],
                            [2, 'Sasaran', 'textarea', '{"rows": "5", "maxlength": "255", "wrap": "hard"}'],
                            [3, 'Kode_IK']
                        ]
                    },
                    restoreButton: false,
                    bu edit: {
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
                        // jika aksi hapus maka hapus data dari baris dan reload tabelSs
                        if (data.action == 'delete') {
                            $('#' + data.id).remove()
                            // $('#tabelSs').DataTable().ajax.reload();
                            $('#tabelSs').Datatable().reload(null, false);
                        }
                    },
                });
            });

            //////////////// tambah program ////////////////////////
            $('#save').click(function() {
                let Kode_SS = $('#Kode_SS').val();
                let Sasaran = $('#Sasaran').val();
                let Kode_IK = $('#Kode_IK').val();

                $.ajax({
                    url: "{{ route('ss.store') }}",
                    type: 'POST',
                    data: {
                        Kode_SS, Sasaran, Kode_IK,
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#Kode_SS').val('');
                        $('#Sasaran').val('');
                        $('#Kode_IK').val('');

                        // setelah berhasil, reload tabelSs
                        $('#tabelSs').DataTable().ajax.reload();
                        $('#tambahModal').modal('hide');
                    }
                });
            })
        });
    </script>

@endsection
