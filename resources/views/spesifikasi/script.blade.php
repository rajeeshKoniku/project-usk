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
            "ajax": "{{ route('spesifikasi.fetch_data') }}",
            columns: [{
                    data: "id",
                    name: "id",
                    className: "hide_column"
                },
                {
                    data: "akun",
                    name: "akun"
                },
                {
                    data: "kebutuhan_kegiatan",
                    name: "kebutuhan_kegiatan"
                },
                {
                    data: "jenis_kegiatan",
                    name: "jenis_kegiatan",
                },
                {
                    data: "merk",
                    name: "merk"
                },
                {
                    data: "type",
                    name: "type"
                },
                {
                    data: "catalog",
                    name: "catalog"
                },
                {
                    data: "kuantitas",
                    name: "kuantitas"
                },
                {
                    data: "durasi",
                    name: "durasi"
                },
                {
                    data: "kegiatan",
                    name: "kegiatan"
                },
                {
                    data: "harga_Satuan",
                    name: "harga_Satuan"
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
                url: "{{ route('spesifikasi.action') }}",
                dataType: "json",
                // eventType: 'dblclick', =====> pakai ini jika ingin doubleclick / tanpa edit button
                // editButton: false,
                columns: {
                    identifier: [0, 'id'],
                    editable: [
                        [1, 'akun'],
                        [2, 'kebutuhan_kegiatan', 'textarea',
                            '{"rows": "5", "maxlength": "255", "wrap": "hard"}'
                        ],
                        [3, 'jenis_kegiatan', 'textarea',
                            '{"rows": "5", "maxlength": "255", "wrap": "hard"}'
                        ],
                        [4, 'merk'],
                        [5, 'type'],
                        [6, 'catalog'],
                        [7, 'kuantitas'],
                        [8, 'durasi'],
                        [9, 'kegiatan'],
                        [10, 'harga_Satuan'],

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
            let akun = $('#akun').val();
            let kebutuhan_kegiatan = $('#kebutuhan_kegiatan').val();
            let jenis_kegiatan = $('#jenis_kegiatan').val();
            let merk = $('#merk').val();
            let type = $('#type').val();
            let catalog = $('#catalog').val();
            let kuantitas = $('#kuantitas').val();
            let durasi = $('#durasi').val();
            let kegiatan = $('#kegiatan').val();
            let harga_Satuan = $('#harga_Satuan').val();

            $.ajax({
                url: "{{ route('spesifikasi.store') }}",
                type: 'POST',
                data: {
                   akun,
                   kebutuhan_kegiatan,
                   jenis_kegiatan,
                   merk,
                   type,
                   catalog,
                   kuantitas,
                   durasi,
                   kegiatan,
                   harga_Satuan

                },
                success: function(data) {
                    // console.log(data);
                    $('#akun').val('');
                    $('#kebutuhan_kegiatan').val('');
                    $('#jenis_kegiatan').val('');
                    $('#merk').val('');
                    $('#type').val('');
                    $('#catalog').val('');
                    $('#kuantitas').val('');
                    $('#durasi').val('');
                    $('#kegiatan').val('');
                    $('#harga_Satuan').val('');

                    // setelah berhasil, reload tabelIku
                    $('#tabelIku').DataTable().ajax.reload();
                    $('#tambahModal').modal('hide');
                }
            });
        })
    });
</script>
