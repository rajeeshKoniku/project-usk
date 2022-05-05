<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'KK')
@section('content')
    <h3>Form Perjanjian Kinerja</h3>
    <div class="outer-wrapper">
        <div class="table-wrapper">
            <table id="kk">
                <button class="mb-2 new_row_btn bg-warning btn text-white" type="button">
                    <i class="bx bx-message-rounded-add"></i>
                </button>
                        	<!-- Button trigger modal -->
										<button class="ml-5 mb-2 btn btn-danger text-white" type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">
                                            <i class="bx bx-message-rounded-edit"></i>
                                        </button>
										<!-- Modal -->
										<div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="text-dark modal-title">Penandatanganan</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
                                                        <label for="">Tempat Penandatanganan</label>
                                                        <input class="form-control" type="text"/>
                                                        
                                                        <label for="">Tanggal Penandatanganan</label>
                                                        <input class="form-control" type="text"/>
                                                        <p class="pt-2">Pihak Pertama</p>
                                                        <label for="">Nama Pimpinan (Rektor)</label>
                                                        <input class="form-control" type="text"/>
                                                        
                                                        <label for="">Jabatan Pimpinan (Rektor)</label>
                                                        <input class="form-control" type="text"/>
                                                        
                                                        <label for="">NIP Pimpinan (Rektor)</label>
                                                        <input class="form-control" type="text"/>
                                                        
                                                        <p class="pt-2">Pihak Kedua</p>
                                                        <label for="">Nama Pimpinan (Unit Kerja)</label>
                                                        <input class="form-control" type="text"/>
                                                        
                                                        <label for="">Jabatan Pimpinan (Unit Kerja)</label>
                                                        <input class="form-control" type="text"/>
                                                        
                                                        <label for="">NIP Pimpinan (Unit Kerja)</label>
                                                        <input class="form-control" type="text"/>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary">Save changes</button>
													</div>
												</div>
											</div>
										</div>
                <thead>
                    <th>ID</th>
                    <th>Unit Kerja</th>
                    <th>Kode IK</th>
                    <th>PK Mentri</th>
                    <th>Satuan</th>
                    <th>TW 1</th>
                    <th>TW 2</th>
                    <th>TW 3</th>
                    <th>TW 4</th>
                    <th>Bobot</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($data as $dataKK)
                        <tr>
                            <td>{{ $dataKK->id }}</td>
                            <td></td>
                            <td>
                                {{ $dataKK->kode_ik }}
                            </td>
                            <td contenteditable="false" style="width: 100px">{{ $dataKK->pk_menteri }}</td>
                            <td style="width: 100pdataKK" contenteditable="true">{{ $dataKK->satuan }}</td>
                            <td contenteditable="true">{{ $dataKK->tw_1 }}</td>
                            <td contenteditable="true">{{ $dataKK->tw_2 }}</td>
                            <td contenteditable="true">{{ $dataKK->tw_3 }}</td>
                            <td contenteditable="true">{{ $dataKK->tw_4 }}</td>
                            <td contenteditable="false">{{ $dataKK->bobot }}</td>

                            <td>
                                <span class="del_btn"><i role="button"
                                        class="rounded bg-danger p-3 fa-solid fa-trash fa-sm"></i></span>
                                <span class="save_btn"><i role="button"
                                        class="rounded bg-info p-3 fa-solid fa-floppy-disk fa-sm"></i></span>
                                <span class="new_btn"><i role="button"
                                        class="rounded bg-success p-3 fa-solid fa-plus fa-sm"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="outer-wrapper" style="margin-top: 30px; float: right;">
        <div class="table-wrapper" style="overflow: hidden">
            <table id="nip_table" style="margin-right: 5px;">
                <tr>
                    <td colspan="2"></td>
                    <td>Tempat</td>
                    <td>Tanggal</td>
                </tr>
                <tr>
                    <td colspan="2">Jabatan Pimpinan Pihak 1</td>
                    <td colspan="2">Jabatan Pimpinan Pihak 2</td>
                </tr>
                <tr>
                    <td colspan="2">Nama</td>
                    <td colspan="2">Nama</td>
                </tr>
                <tr>
                    <td  colspan="2">NIP</td>
                    <td colspan="2">NIP</td>
                </tr>
                
            </table>
        </div>
    </div> --}}

    {{-- <div class="container">
        <h3>Form Perjanjian Kinerja</h3>
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Unit Kerja</th>
                                <th>Kode IK</th>
                                <th>PK Mentri</th>
                                <th>TW 1</th>
                                <th>TW 2</th>
                                <th>TW 3</th>
                                <th>TW 4</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($data as $x)
                        <tr>
                            <td >{{ $x->id }}</td>
                            <td ></td>
                            <td>
                               {{ $x->kode_ik}}
                            </td>
                            <td contenteditable="false">{{ $x->pk_menteri}}</td>
                            <td contenteditable="true">{{ $x->tw_1}}</td>
                            <td contenteditable="true">{{ $x->tw_2}}</td>
                            <td contenteditable="true">{{ $x->tw_3}}</td>
                            <td contenteditable="true">{{ $x->tw_4}}</td>
                            <td contenteditable="false">{{ $x->bobot}}</td>

                            <td>
                                <span class="del_btn"><i role="button" class="rounded bg-danger p-3 fa-solid fa-trash fa-sm"></i></span>
                                <span class="save_btn"><i role="button" class="rounded bg-info p-3 fa-solid fa-floppy-disk fa-sm"></i></span>
                                <span class="new_btn"><i role="button" class="rounded bg-success p-3 fa-solid fa-plus fa-sm"></i></span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts')
    @include('kk.script')
@endpush
