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
                    name: "id",
                    className: "hide_column"

                }, {
                    data: "ik_id",
                    name: "ik_id"
                },
                {
                    data: "kode_prog",
                    name: "kode_prog",
                },
                {
                    data: "program",
                    name: "program"
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
                        [2, 'kode_prog'],
                        [3, 'program', 'textarea',
                            '{"rows": "5", "maxlength": "255", "wrap": "hard"}'
                        ]
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
            let kode_prog = $('#kode_prog').val();
            let program = $('#program').val();
            let ik_id = $('#ik_id').val()

            $.ajax({
                url: "{{ route('program.store') }}",
                type: 'POST',
                data: {
                    kode_prog,
                    program,
                    ik_id
                },
                success: function(data) {
                    // console.log(data);
                    $('#program').val('');
                    $('#kode_prog').val('');
                    $('#ik_id').val('');

                    // setelah berhasil, reload tabelProgram
                    $('#tabelProgram').DataTable().ajax.reload();
                    $('#tambahModal').modal('hide');
                }
            });
        })
    });
</script>
