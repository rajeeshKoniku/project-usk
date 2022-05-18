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
                                <th>Verifikasi SPI</th>
                                <th>Verifikasi Sarpras</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataRPK as $rpk)
                                <tr>
                                    <td>{{$rpk->id}}</td>
                                    <td>{{$rpk->kode_program}}</td>
                                    <td>{{$rpk->Proposal_Project}}</td>
                                    <td>{{$rpk->rincian_program}}</td>
                                    <td>{{$rpk->nama_kegiatan}}</td>
                                    <td>{{$rpk->Kebutuhan_Kegiatan}}</td>
                                    <td>{{$rpk->akun}}</td>
                                    <td>{{$rpk->jenis_belanja}}</td>
                                    <td>{{$rpk->kuantitas}}</td>
                                    <td>{{$rpk->merk}}</td>
                                    <td>{{$rpk->type}}</td>
                                    <td>{{$rpk->catalog}}</td>
                                    <td>{{$rpk->proposal_project}}</td>
                                    <td>{{$rpk->rab_detail}}</td>
                                    <td>{{$rpk->perencanaan_gambar}}</td>
                                    <td>{{$rpk->harga_satuan}}</td>
                                    <td>
                                        <select name="verifikasi_spi"
                                            class="verifikasi_spi d-inline form-control w-auto required verifikasi">
                                            <option value="" disabled selected>--Setuju/Tolak--</option>
                                            @foreach ($options as $key => $value)
                                            <option value="{{ $key }}"
                                            @if ($key == $rpk->verifikasi_spi))
                                                selected="selected"
                                            @endif
                                            >{{ $value }}</option>
                                        @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="verifikasi_sarpras"
                                            class="verifikasi_sarpras d-inline form-control w-auto required verifikasi">
                                            <option value="" disabled selected>--Setuju/Tolak--</option>
                                            @foreach ($options as $key => $value)
                                            <option value="{{ $key }}"
                                            @if ($key == $rpk->verifikasi_sarpras))
                                                selected="selected"
                                            @endif
                                            >{{ $value }}</option>
                                        @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
         $('.verifikasi_spi').change(function() {
            let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
            let id = setiapBaris[0]
            let verifikasi_spi = $(this).closest('tr').find('select.verifikasi_spi').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('verification.rekat_update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    verifikasi_spi: verifikasi_spi
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

        $('.verifikasi_sarpras').change(function() {
            let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
            let id = setiapBaris[0]
            let verifikasi_sarpras = $(this).closest('tr').find('select.verifikasi_sarpras').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('verification.rekat_update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    verifikasi_sarpras: verifikasi_sarpras
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
