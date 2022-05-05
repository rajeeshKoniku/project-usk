<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman RAB')
@section('content')
  <h3>Form Rincian Anggaran Biaya</h3>
   <div class="outer-wrapper">
    <div class="table-wrapper">
    <table>
        <thead>
            <th>ID</th>
            <th>Unit Kerja</th>
            <th>Rincian Program</th>
            <th>Nama Kegiatan</th>
            <th>Kebutuhan Kegiatan</th>
            <th colspan="2">Kuantitas</th>
            <th colspan="2">Durasi</th>
            <th colspan="2">Kegiatan</th>
            <th>Merk</th>
            <th>Type</th>
            <th>E-Catalog</th>
            <th>Proposal Project</th>
            <th>Rab Detail</th>
            <th>Perencanaan Gambar</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach($RAB as $dataRAB)
                    <tr>
                                    <td> {{ $dataRAB->id }}</td>
                                    <td> </td>
                                    <td > {{ $dataRAB->rincian_program }}</td>
                                    <td> {{ $dataRAB->nama_kegiatan }}</td>
                                    <td> {{ $dataRAB->kebutuhan_kegiatan }}</td>
                                    <td contenteditable="true"> {{ $dataRAB->kuantitas }}</td>
                                    <td contenteditable="true"> {{ $dataRAB->kuantitas_2}} </td>
                                    <td contenteditable="true"> {{ $dataRAB->durasi }}</td>
                                    <td contenteditable="true"> {{ $dataRAB->durasi_2}} </td>
                                    <td contenteditable="true"> {{ $dataRAB->kegiatan }}</td>
                                    <td contenteditable="true"> {{ $dataRAB->kegiatan_2}} </td>
                                    <td contenteditable="true"> {{ $dataRAB->merk }}</td>
                                    <td contenteditable="true"> {{ $dataRAB->type }}</td>

                                    <td>
                                       <form id="catalog" enctype="multipart/form-data">
                                          <input class="hidden" type="file" class="fu-catalog" name="fileCatalog" id="fileInputCatalog">
                                          <span class="btnCatalog badge pt-3"><a class="bg-dark py-2 px-2">Submit</a></span>
                                        </form>
                                     </td>

                                    <td>
                                       <form id="proposal_project" enctype="multipart/form-data">
                                          <input type="file" class="fu-proposal_project" name="fileProject" id="fileInputProject">
                                          <span class="btnProject badge pt-3"><a class="bg-dark py-2 px-2">Submit</a></span>
                                        </form>
                                     </td>

                                     <td>
                                       <form id="rab_detail" enctype="multipart/form-data">
                                          <input type="file" class="fu-rab_detail" name="fileRab" id="fileInputDetail">
                                          <span class="btnRab badge pt-3"><a class="bg-dark py-2 px-2">Submit</a></span>
                                        </form>
                                     </td>

                                     <td>
                                       <form id="perencanaan_gambar" enctype="multipart/form-data">
                                          <input type="file" class="fu-perencanaan_gambar" name="fileGambar" id="fileInputGambar">
                                          <span class="btnGambar badge pt-3"><a class="bg-dark py-2 px-2">Submit</a></span>
                                        </form>
                                     </td>
                                    <td contenteditable="true"> {{ $dataRAB->harga_satuan }}</td>
                                    <td>{{ 'Rp' . ' ' . $dataRAB->jumlah }}</td>

                                    <td>
                                         <span class="del_btn"><i role="button" class="rounded bg-danger py-3 px-2 fa-solid fa-trash fa-sm"></i></span>
                                        <span class="save_btn"><i role="button" class="rounded bg-info py-3 px-2 fa-solid fa-floppy-disk fa-sm"></i></span>
                                        <span class="new_btn"><i role="button" class="rounded bg-success py-3 px-2 fa-solid fa-plus fa-sm"></i></span>
                                </td>

                                </tr>
                                @endforeach
                                </tbody>
    </table>
</div>
</div>
{{--
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Unit Kerja</th>
                                        <th>Rincian Program</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Kebutuhan Kegiatan</th>
                                        <th colspan="2">Kuantitas</th>
                                        <th colspan="2">Durasi</th>
                                        <th colspan="2">Kegiatan</th>
                                        <th>Merk</th>
                                        <th>Type</th>
                                        <th>E-Catalog</th>
                                        <th>Proposal Project</th>
                                        <th>Rab Detail</th>
                                        <th>Perencanaan Gambar</th>
                                        <th>Harga Satuan</th>
                                        <th >Jumlah</th>
                                        <th >Aksi</th>
                                    </tr>
                                </thead>
                               <tbody>
                                @foreach($RAB as $dataRAB)
                                <tr>
                                    <td> {{ $dataRAB->id }}</td>
                                    <td> </td>
                                    <td> {{ $dataRAB->rincian_program }}</td>
                                    <td> {{ $dataRAB->nama_kegiatan }}</td>
                                    <td> {{ $dataRAB->kebutuhan_kegiatan }}</td>
                                    <td contenteditable="true"> {{ $dataRAB->kuantitas }}</td>
                                    <td contenteditable="true"> {{ $dataRAB->kuantitas_2}} </td>
                                    <td contenteditable="true"> {{ $dataRAB->durasi }}</td>
                                    <td contenteditable="true"> {{ $dataRAB->durasi_2}} </td>
                                    <td contenteditable="true"> {{ $dataRAB->kegiatan }}</td>
                                    <td contenteditable="true"> {{ $dataRAB->kegiatan_2}} </td>
                                    <td contenteditable="true"> {{ $dataRAB->merk }}</td>
                                    <td contenteditable="true"> {{ $dataRAB->type }}</td>

                                    <td>
                                       <form id="catalog" enctype="multipart/form-data">
                                          <input type="file" class="fu-catalog" name="fileCatalog" id="fileInputCatalog">
                                          <span class="btnCatalog badge pt-3"><a class="bg-dark py-2 px-2">Submit</a></span>
                                        </form>
                                     </td>

                                    <td>
                                       <form id="proposal_project" enctype="multipart/form-data">
                                          <input type="file" class="fu-proposal_project" name="fileProject" id="fileInputProject">
                                          <span class="btnProject badge pt-3"><a class="bg-dark py-2 px-2">Submit</a></span>
                                        </form>
                                     </td>

                                     <td>
                                       <form id="rab_detail" enctype="multipart/form-data">
                                          <input type="file" class="fu-rab_detail" name="fileRab" id="fileInputDetail">
                                          <span class="btnRab badge pt-3"><a class="bg-dark py-2 px-2">Submit</a></span>
                                        </form>
                                     </td>

                                     <td>
                                       <form id="perencanaan_gambar" enctype="multipart/form-data">
                                          <input type="file" class="fu-perencanaan_gambar" name="fileGambar" id="fileInputGambar">
                                          <span class="btnGambar badge pt-3"><a class="bg-dark py-2 px-2">Submit</a></span>
                                        </form>
                                     </td>
                                    <td contenteditable="true"> {{ $dataRAB->harga_satuan }}</td>
                                    <td>{{ 'Rp' . ' ' . $dataRAB->jumlah }}</td>

                                    <td>
                                         <span class="del_btn"><i role="button" class="rounded bg-danger py-3 px-2 fa-solid fa-trash fa-sm"></i></span>
                                        <span class="save_btn"><i role="button" class="rounded bg-info py-3 px-2 fa-solid fa-floppy-disk fa-sm"></i></span>
                                        <span class="new_btn"><i role="button" class="rounded bg-success py-3 px-2 fa-solid fa-plus fa-sm"></i></span> 
                              {{--       </td>

                                </tr>
                                @endforeach
                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
   --}}
@endsection
 @push('scripts')
    @include('rab.script')
@endpush
