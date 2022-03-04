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
                    name: "id",
                    className: "hide_column"
                },{
                    data: "ss.Kode_SS",
                    name: "ss.Kode_SS"
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
                        [2, 'Kode_IK'],
                        [3, 'Indikator_Kinerja', 'textarea',
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
            let ss_id = $('#ss_id').val();

            $.ajax({
                url: "{{ route('iku.store') }}",
                type: 'POST',
                data: {
                    Kode_IK,
                    Indikator_Kinerja,
                    ss_id
                },
                success: function(data) {
                    // console.log(data);
                    $('#Kode_IK').val('');
                    $('#Indikator_Kinerja').val('');
                    $('#ss_id').val('');

                    // setelah berhasil, reload tabelIku
                    $('#tabelIku').DataTable().ajax.reload();
                    $('#tambahModal').modal('hide');
                }
            });
        })
    });
</script>
