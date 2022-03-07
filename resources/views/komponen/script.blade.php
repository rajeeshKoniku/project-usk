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
            "ajax": "{{ route('komponen.fetch_data') }}",
            columns: [{
                    data: "id",
                    name: "id",
                    className: "hide_column"
                },{
                    data: "kebutuhan_kegiatan",
                    name: "kebutuhan_kegiatan"
                },
                {
                    data: "rincian_komponen",
                    name: "rincian_komponen",
                },
                {
                    data: "akun",
                    name: "akun"
                },{
                    data: "jenis_belanja",
                    name: "jenis_belanja"
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
                url: "{{ route('komponen.action') }}",
                dataType: "json",
                // eventType: 'dblclick', =====> pakai ini jika ingin doubleclick / tanpa edit button
                // editButton: false,
                columns: {
                    identifier: [0, 'id'],
                    editable: [
                        [1, 'kebutuhan_kegiatan', 'textarea',
                            '{"rows": "5", "maxlength": "255", "wrap": "hard"}'
                        ],
                        [2, 'rincian_komponen', 'textarea',
                            '{"rows": "5", "maxlength": "255", "wrap": "hard"}'
                        ],
                        [3, 'akun'],
                        [4, 'jenis_belanja'],

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
            let kebutuhan_kegiatan = $('#kebutuhan_kegiatan').val();
            let rincian_komponen = $('#rincian_komponen').val();
            let akun = $('#akun').val();
            let jenis_belanja = $('#jenis_belanja').val();

            $.ajax({
                url: "{{ route('komponen.store') }}",
                type: 'POST',
                data: {
                   kebutuhan_kegiatan,
                   rincian_komponen,
                   akun,
                   jenis_belanja
                },
                success: function(data) {
                    // console.log(data);
                    $('#kebutuhan_kegiatan').val('');
                    $('#rincian_komponen').val('');
                    $('#akun').val('');
                    $('#jenis_belanja').val('');

                    // setelah berhasil, reload tabelIku
                    $('#tabelIku').DataTable().ajax.reload();
                    $('#tambahModal').modal('hide');
                }
            });
        })
    });
</script>
