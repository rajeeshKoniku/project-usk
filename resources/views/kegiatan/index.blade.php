<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Home')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabelKegiatan" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Kegiatan</th>
                                <th>Uraian Kegiatan</th>
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
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form --}}
                    <form>
                        <div class="mb-3 row">
                            <label for="Kd_Kegiatan" class="col-sm-2 col-form-label">Kode Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext text-light px-2" name="Kd_Kegiatan" id="Kd_Kegiatan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Uraian_Kegiatan" class="col-sm-2 col-form-label">Uraian Kegiatan</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control-plaintext text-light px-2" name="Uraian_Kegiatan" id="Uraian_Kegiatan"></textarea>
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
            $('#tabelKegiatan').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": "{{ route('kegiatan.fetch_data') }}",
                columns: [{
                        data: "id",
                        name: "id"
                    },
                    {
                        data: "Kd_Kegiatan",
                        name: "Kd_Kegiatan",
                    },
                    {
                        data: "Uraian_Kegiatan",
                        name: "Uraian_Kegiatan"
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
            $('#tabelKegiatan').on('draw.dt', function() {
                $('#tabelKegiatan').Tabledit({
                    url: "{{ route('kegiatan.action') }}",
                    dataType: "json",
                    // eventType: 'dblclick', =====> pakai ini jika ingin doubleclick / tanpa edit button
                    // editButton: false,
                    columns: {
                        identifier: [0, 'id'],
                        editable: [
                            [1, 'Kd_Kegiatan'],
                            [2, 'Uraian_Kegiatan']
                        ]
                    },
                    restoreButton: false,
                    buttons: {
                        delete: {
                            class: 'btn btn-sm btn-danger m-1',
                            html: '<span class="lni lni-trash"></span>',
                            action: 'delete'
                        },
                        edit: {
                            class: 'btn btn-sm btn-success m-1',
                            html: '<span class="lni lni-pencil"></span>',
                            action: 'edit'
                        },
                        confirm: {
                            class: 'btn btn-sm btn-light',
                            html: 'Yakin?'
                        }
                    },
                    onSuccess: function(data, textStatus, jqXHR) {
                        // console.log(data, textStatus, jqXHR);
                        // jika aksi hapus maka hapus data dari baris dan reload tabelKegiatan
                        if (data.action == 'delete') {
                            $('#' + data.id).remove()
                            // $('#tabelKegiatan').DataTable().ajax.reload();
                            $('#tabelKegiatan').Datatable().reload(null, false);
                        }
                    },
                });
            });

            //////////////// tambah program ////////////////////////
            $('#save').click(function() {
                let Kd_Kegiatan = $('#Kd_Kegiatan').val();
                let Uraian_Kegiatan = $('#Uraian_Kegiatan').val();

                $.ajax({
                    url: "{{ route('kegiatan.store') }}",
                    type: 'POST',
                    data: {
                        Kd_Kegiatan, Uraian_Kegiatan,
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#Kd_Kegiatan').val('');
                        $('#Uraian_Kegiatan').val('');

                        // setelah berhasil, reload tabelKegiatan
                        $('#tabelKegiatan').DataTable().ajax.reload();
                        $('#tambahModal').modal('hide');
                    }
                });
            })
        });
    </script>

@endsection
