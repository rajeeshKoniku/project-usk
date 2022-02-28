<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Home')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabelProgram" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>KD Program</th>
                                <th>Program</th>
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
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form --}}
                    <form>
                        <div class="mb-3 row">
                            <label for="Kd_Program" class="col-sm-2 col-form-label">KD Program</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="Kd_Program" id="Kd_Program">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Program" class="col-sm-2 col-form-label">Program</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="Program" id="Program">
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




@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // fetch/ambil data datatable
            $('#tabelProgram').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": "{{ route('program.fetch_data') }}",
                columns: [{
                        data: "id",
                        name: "id"
                    },
                    {
                        data: "Kd_Program",
                        name: "Kd_Program",
                    },
                    {
                        data: "Program",
                        name: "Program"
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
            $('#tabelProgram').on('draw.dt', function() {
                $('#tabelProgram').Tabledit({
                    url: "{{ route('program.action') }}",
                    dataType: "json",
                    // eventType: 'dblclick', =====> pakai ini jika ingin doubleclick / tanpa edit button
                    // editButton: false,
                    columns: {
                        identifier: [0, 'id'],
                        editable: [
                            [1, 'Kd_Program'],
                            [2, 'Program', 'textarea', '{"rows": "5", "maxlength": "255", "wrap": "hard"}']
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
                        // jika aksi hapus maka hapus data dari baris dan reload tabelProgram
                        if (data.action == 'delete') {
                            $('#' + data.id).remove()
                            $('#tabelProgram').DataTable().ajax.reload();
                        }
                    },
                });
            });

            //////////////// tambah program ////////////////////////
            $('#save').click(function() {
                let Kd_Program = $('#Kd_Program').val();
                let Program = $('#Program').val();

                $.ajax({
                    url: "{{ route('program.store') }}",
                    type: 'POST',
                    data: {
                        Kd_Program,
                        Program,
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#Program').val('');
                        $('#Kd_Program').val('');

                        // setelah berhasil, reload tabelProgram
                        $('#tabelProgram').DataTable().ajax.reload();
                        $('#tambahModal').modal('hide');
                    }
                });
            })
        });
    </script>
@endpush
