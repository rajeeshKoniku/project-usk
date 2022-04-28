<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman KK')
@section('content')

    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Program</th>
                                <th>TOR/KAK/Proposal Project</th>
                                <th>Rincian Program</th>
                                <th>Nama Kegiatan</th>
                                <th>Kebutuhan Kegiatan</th>
                                <th>Akun</th>
                                <th>Jenis Belanja</th>
                                <th>Kuantitas</th>
                                <th>Merk</th>
                                <th>Type</th>
                                <th>e-Catalog</th>
                                <th>Proposal Project/KAK</th>
                                <th>RAB Detail</th>
                                <th>Perencanaan Gambar</th>
                                <th>Harga Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.verifikasi').change(function() {
            let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
            let id = setiapBaris[0]
            let verifikasi = $(this).closest('tr').find('select.verifikasi').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('verification.perkin_update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    verifikasi: verifikasi
                },
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        title: 'DATA SUKSES TERSIMPAN',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    })
                }
            });
        });
    </script>
@endpush
