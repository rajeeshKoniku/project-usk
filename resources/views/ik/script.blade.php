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
            "ajax": "{{ route('ik.fetch_data') }}",
            columns: [{
                    data: "id",
                    name: "id",
                    className: "hide_column"
                },{
                    data: "ss.kode_ss",
                    name: "ss.kode_ss"
                },
                {
                    data: "kode_ik",
                    name: "kode_ik",
                },
                {
                    data: "indikator_kinerja",
                    name: "indikator_kinerja"
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
                url: "{{ route('ik.action') }}",
                dataType: "json",
                // eventType: 'dblclick', =====> pakai ini jika ingin doubleclick / tanpa edit button
                // editButton: false,
                columns: {
                    identifier: [0, 'id'],
                    editable: [
                        [2, 'kode_ik'],
                        [3, 'indikator_kinerja', 'textarea',
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
            let kode_ik = $('#kode_ik').val();
            let indikator_kinerja = $('#indikator_kinerja').val();
            let ss_id = $('#ss_id').val();

            $.ajax({
                url: "{{ route('ik.store') }}",
                type: 'POST',
                data: {
                    kode_ik,
                    indikator_kinerja,
                    ss_id
                },
                success: function(data) {
                    // console.log(data);
                    $('#kode_ik').val('');
                    $('#indikator_kinerja').val('');
                    $('#ss_id').val('');

                    // setelah berhasil, reload tabelIku
                    $('#tabelIku').DataTable().ajax.reload();
                    $('#tambahModal').modal('hide');
                }
            });
        })
    });
</script>
