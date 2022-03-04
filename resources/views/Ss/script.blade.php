<script type="text/javascript">
    $(document).ready(function() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // fetch/ambil data datatable
        $('#tabelSs').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": "{{ route('ss.fetch_data') }}",
            columns: [{
                    data: "id",
                    name: "id",
                    className: "hide_column"
                },
                {
                    data: "Kode_SS",
                    name: "Kode_SS",
                },
                {
                    data: "Sasaran",
                    name: "Sasaran"
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
        $('#tabelSs').on('draw.dt', function() {
            $('#tabelSs').Tabledit({
                url: "{{ route('ss.action') }}",
                dataType: "json",
                // eventType: 'dblclick',
                // editButton: false,
                columns: {
                    identifier: [0, 'id'],
                    editable: [
                        [1, 'Kode_SS'],
                        [2, 'Sasaran', '{"rows": "5", "maxlength": "255", "wrap": "hard"}'],
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
                    // jika aksi hapus maka hapus data dari baris dan reload tabelSs
                    if (data.action == 'delete') {
                        $('#' + data.id).remove()
                        $('#tabelSs').DataTable().ajax.reload();
                    }
                },
            });
        });

        //////////////// tambah program ////////////////////////
        $('#form').submit(function(e) {
            e.preventDefault();

            let Kode_SS = $('#Kode_SS').val();
            let Sasaran = $('#Sasaran').val();

            $.ajax({
                url: "{{ route('ss.store') }}",
                type: 'POST',
                data: {
                    Kode_SS,
                    Sasaran
                },
                success: function(data) {
                    // console.log(data);
                    $('#Kode_SS').val('');
                    $('#Sasaran').val('');

                    // setelah berhasil, reload tabelSs
                    $('#tabelSs').DataTable().ajax.reload();
                    $('#tambahModal').modal('hide');
                }
            });

        })
    });
</script>
