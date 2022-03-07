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
                "ajax": "{{ route('kk.fetch_data') }}",
                columns: [
                    {
                        data: "id",
                        name: "id"
                    },
                    {
                        data: "kode_ik",
                        name: "kode_ik",
                    },
                    {
                        data: "indikator_kinerja",
                        name: "indikator_kinerja",
                    },
                    {
                        data: "pk_menteri",
                        name: "pk_menteri"
                    },
                    {
                        data: "tw_1",
                        name: "tw_1"
                    },
                    {
                        data: "tw_2",
                        name: "tw_2"
                    },
                    {
                        data: "tw_3",
                        name: "tw_3"
                    },
                    {
                        data: "tw_4",
                        name: "tw_4"
                    },
                    {
                        data: "bobot",
                        name: "bobot"
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
                    url: "{{ route('kk.action') }}",
                    dataType: "json",
                    // eventType: 'dblclick', =====> pakai ini jika ingin doubleclick / tanpa edit button
                    // editButton: false,
                    columns: {
                        identifier: [0, 'id'],
                        editable: [
                            [3 ,'pk_menteri'],
                            [4 ,'tw_1'],
                            [5 ,'tw_2'],
                            [6 ,'tw_3'],
                            [7 ,'tw_4'],
                            [8 ,'bobot']
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
                let ik_id = $('#ik_id').val();
                let pk_menteri = $('#pk_menteri').val();
                let tw_1 = $('#tw_1').val();
                let tw_2 = $('#tw_2').val();
                let tw_3 = $('#tw_3').val();
                let tw_4 = $('#tw_4').val();
                let bobot = $('#bobot').val();

                $.ajax({
                    url: "{{ route('kk.store') }}",
                    type: 'POST',
                    data: {
                        ik_id,
                        pk_menteri,
                        tw_1,
                        tw_2,
                        tw_3,
                        tw_4,
                        bobot
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#kode_ik').val('')
                        $('#pk_menteri').val('')
                        $('#tw_1').val('')
                        $('#tw_2').val('')
                        $('#tw_3').val('')
                        $('#tw_4').val('')
                        $('#bobot').val('')

                        // setelah berhasil, reload tabelKk
                        $('#tabelKk').DataTable().ajax.reload();
                        $('#tambahModal').modal('hide');
                    }
                });
            })
        });
    </script>
