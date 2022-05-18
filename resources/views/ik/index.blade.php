<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'IK')
@section('content')
<div class="outer-wrapper">
    <div class="table-wrapper">
    <table>
        <thead>
        <th>ID</th>
                                <th>Kode SS</th>
                                <th>Kode IK</th>
                                <th>Indikator Kinerja</th>
                                <th>Aksi</th>
        </thead>
        <tbody>
          @foreach($IK as $dataIK)
                        <tr>
                            <td >{{ $dataIK->id }}</td>
                            <td style="width: 230px;">
                                <select name="kode_ss" type="text" id="kode_ss" class="d-inline form-control w-auto required">
                                @foreach($SS as $dataSS)
                                    @if($dataSS->kode_ss === $dataIK->ss_id)
                                        <option value="{{$dataSS->kode_ss}}" selected="true">{{$dataSS->kode_ss}}</option>
                                    @else
                                        <option value="{{$dataSS->kode_ss}}" >{{$dataSS->kode_ss}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td>
                            <td style="width: 230px;" contenteditable="true">{{ $dataIK->kode_ik}}</td>
                            <td style="width: 500px;" contenteditable="true">{{ $dataIK->indikator_kinerja}}</td>

                            <td style="width: 200px;">
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
{{--     <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode SS</th>
                                <th>Kode IK</th>
                                <th>Indikator Kinerja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($IK as $dataIK)
                        <tr>
                            <td >{{ $dataIK->id }}</td>
                            <td>
                                <select name="kode_ss" type="text" id="kode_ss" class="d-inline form-control w-auto required">
                                @foreach($SS as $dataSS)
                                    @if($dataSS->kode_ss === $dataIK->ss_id)
                                        <option value="{{$dataSS->kode_ss}}" selected="true">{{$dataSS->kode_ss}}</option>
                                    @else
                                        <option value="{{$dataSS->kode_ss}}" >{{$dataSS->kode_ss}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td>
                            <td contenteditable="true">{{ $dataIK->kode_ik}}</td>
                            <td contenteditable="true">{{ $dataIK->indikator_kinerja}}</td>

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
        </div>
    </div> --}}
@endsection

 @push('scripts')
    @include('ik.script')
@endpush
