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
                    name: "id",
                    className: "hide_column"
                },
                {
                    data: "program.Kd_Program",
                    name: "program.Kd_Program",
                },
                {
                    data: "Kd_Kegiatan",
                    name: "Kd_Kegiatan"
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
                // eventType: 'dblclick',
                // editButton: false,
                columns: {
                    identifier: [0, 'id'],
                    editable: [
                        [2, 'Kd_Kegiatan'],
                        [3, 'Uraian_Kegiatan', '{"rows": "5", "maxlength": "255", "wrap": "hard"}'],
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
                    // jika aksi hapus maka hapus data dari baris dan reload tabelKegiatan
                    if (data.action == 'delete') {
                        $('#' + data.id).remove()
                        $('#tabelKegiatan').DataTable().ajax.reload();
                    }
                },
            });
        });

        //////////////// tambah program ////////////////////////
        $('#form').submit(function(e) {
            e.preventDefault();

            let Kd_Kegiatan = $('#Kd_Kegiatan').val();
            let Uraian_Kegiatan = $('#Uraian_Kegiatan').val();
            let program_id = $('#program_id').val();

            $.ajax({
                url: "{{ route('kegiatan.store') }}",
                type: 'POST',
                data: {
                    Kd_Kegiatan,
                    Uraian_Kegiatan,
                    program_id
                },
                success: function(data) {
                    // console.log(data);
                    $('#Kd_Kegiatan').val('');
                    $('#Uraian_Kegiatan').val('');
                    $('#program_id').val('');

                    // setelah berhasil, reload tabelKegiatan
                    $('#tabelKegiatan').DataTable().ajax.reload();
                    $('#tambahModal').modal('hide');
                }
            });

        })
    });
</script>
