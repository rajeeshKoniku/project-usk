<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Home')
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
                    <h5 class="modal-title" id="tambahModalLabel">Tambah IKU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form --}}
                    <form>
                        <div class="mb-3 row">
                            <label for="Kode_IK" class="col-sm-2 col-form-label">Kode IK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext text-light px-2" name="Kode_IK" id="Kode_IK">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Indikator_Kinerja" class="col-sm-2 col-form-label">Indikator Kinerja</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control-plaintext text-light px-2" name="Indikator_Kinerja" id="Indikator_Kinerja"></textarea>
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
            $('#tabelIku').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": "{{ route('iku.fetch_data') }}",
                columns: [{
                        data: "id",
                        name: "id"
                    },
                    {
                        data: "Kode_IK",
                        name: "Kode_IK",
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
            $('#tabelIku').on('draw.dt', function() {
                $('#tabelIku').Tabledit({
                    url: "{{ route('iku.action') }}",
                    dataType: "json",
                    // eventType: 'dblclick', =====> pakai ini jika ingin doubleclick / tanpa edit button
                    // editButton: false,
                    columns: {
                        identifier: [0, 'id'],
                        editable: [
                            [1, 'Kode_IK'],
                            [2, 'Indikator_Kinerja','textarea', '{"rows": "5", "maxlength": "255", "wrap": "hard"}']
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
                        // jika aksi hapus maka hapus data dari baris dan reload tabelIku
                        if (data.action == 'delete') {
                            $('#' + data.id).remove()
                            // $('#tabelIku').DataTable().ajax.reload();
                            $('#tableIku').Datatable().reload(null, false);
                        }
                    },
                });
            });

            //////////////// tambah program ////////////////////////
            $('#save').click(function() {
                let Kode_IK = $('#Kode_IK').val();
                let Indikator_Kinerja = $('#Indikator_Kinerja').val();

                $.ajax({
                    url: "{{ route('iku.store') }}",
                    type: 'POST',
                    data: {
                        Kode_IK, Indikator_Kinerja,
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#Indikator_Kinerja').val('');

                        // setelah berhasil, reload tabelIku
                        $('#tabelIku').DataTable().ajax.reload();
                        $('#tambahModal').modal('hide');
                    }
                });
            })
        });
    </script>

@endsection
