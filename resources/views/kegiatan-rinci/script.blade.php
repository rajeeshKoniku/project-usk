   <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // fetch/ambil data datatable
            $('#tabelKk').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": "{{ route('kegiatanRinci.fetch_data') }}",
                columns: [
                    {
                        data: "id",
                        name: "id"
                    },
                    {
                        data: "kode_keg",
                        name: "kode_keg",
                    },
                    {
                        data: "Uraian_Kegiatan",
                        name: "Uraian_Kegiatan",
                    },
                    {
                        data: "Rencana_Jadwal_Pelaksanaan",
                        name: "Rencana_Jadwal_Pelaksanaan"
                    },
                    {
                        data: "Kebutuhan_Kegiatan",
                        name: "Kebutuhan_Kegiatan"
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
            $('#tabelKk').on('draw.dt', function() {
                $('#tabelKk').Tabledit({
                    url: "{{ route('kegiatanRinci.action') }}",
                    dataType: "json",
                    // eventType: 'dblclick', =====> pakai ini jika ingin doubleclick / tanpa edit button
                    // editButton: false,
                    columns: {
                        identifier: [0, 'id'],
                        editable: [
                            [1 ,'kode_keg'],
                            [2 ,'Uraian_Kegiatan'],
                            [3 ,'Rencana_Jadwal_Pelaksanaan'],
                            [4 ,'Kebutuhan_Kegiatan'],
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
                        // jika aksi hapus maka hapus data dari baris dan reload tabelKk
                        if (data.action == 'delete') {
                            $('#' + data.id).remove()
                            // $('#tabelKk').DataTable().ajax.reload();
                            $('#tabelKk').Datatable().reload(null, false);
                        }
                    },
                });
            });

            //////////////// tambah program ////////////////////////
            $('#save').click(function() {
                let kode_keg = $('#kode_keg').val();
                let Uraian_Kegiatan = $('#Uraian_Kegiatan').val();
                let Rencana_Jadwal_Pelaksanaan = $('#Rencana_Jadwal_Pelaksanaan').val();
                let Kebutuhan_Kegiatan = $('#Kebutuhan_Kegiatan').val();

                $.ajax({
                    url: "{{ route('kegiatanRinci.store') }}",
                    type: 'POST',
                    data: {
                        kode_keg,
                        Uraian_Kegiatan,
                        Rencana_Jadwal_Pelaksanaan,
                        Kebutuhan_Kegiatan
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#kode_keg').val('')
                        $('#Uraian_Kegiatan').val('')
                        $('#Rencana_Jadwal_Pelaksanaan').val('')
                        $('#Kebutuhan_Kegiatan').val('')

                        // setelah berhasil, reload tabelKk
                        $('#tabelKk').DataTable().ajax.reload();
                        $('#tambahModal').modal('hide');
                    }
                });
            })
        });
    </script>
