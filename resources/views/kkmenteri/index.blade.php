<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'KK Mentri')
@section('content')
<h3>Form KK Menteri</h3>
<div class="outer-wrapper">
    <div class="table-wrapper">
    <table>
        <thead>
            <th>ID</th>
            <th>Kode IK</th>
            <th>PK Mentri</th>
            <th>Bobot</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach($data as $x)
                        <tr>
                            <td >{{ $x->id }}</td>
                            <td style="width: 230px;">
                                <select name="kode_ik" type="text" id="kode_ik" class="d-inline form-control w-auto required">
                                @foreach($dataIK as $ora)
                                    @if($ora->kode_ik === $x->kode_ik)
                                        <option value="{{$ora->kode_ik}}" selected="true">{{$ora->kode_ik}}</option>
                                    @else
                                        <option value="{{$ora->kode_ik}}" >{{$ora->kode_ik}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td style="width: 230px;">
                            <td style="width: 230px;" contenteditable="true">{{ $x->pk_menteri}}</td>
                            <td style="width: 230px;" contenteditable="true">{{ $x->bobot}}</td>

                            <td style="width: 230px;">
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
                                <th>Kode IK</th>
                                <th>PK Mentri</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $x)
                        <tr>
                            <td >{{ $x->id }}</td>
                            <td>
                                <select name="kode_ik" type="text" id="kode_ik" class="d-inline form-control w-auto required">
                                @foreach($dataIK as $ora)
                                    @if($ora->kode_ik === $x->kode_ik)
                                        <option value="{{$ora->kode_ik}}" selected="true">{{$ora->kode_ik}}</option>
                                    @else
                                        <option value="{{$ora->kode_ik}}" >{{$ora->kode_ik}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td>
                            <td contenteditable="true">{{ $x->pk_menteri}}</td>
                            <td contenteditable="true">{{ $x->bobot}}</td>

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
    @include('kkmenteri.script')
@endpush
