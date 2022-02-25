<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman Home')
@section('content')

    <div class="container">

        <div class="container mt-4">

            <div class="card mb-4">
                <div class="card-body">
                    <!--Table-->
                    <table class="table table-hover">
                        <!--Table head-->
                        <h4 class="text-light text-center">Data Iku</h4>
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th>Nomor</th>
                                <th>Kode IK</th>
                                <th>Indikator Kinerja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>

                            <tr>
                                <th contenteditable="false" scope="row">5</th>
                                <td contenteditable="true">Mary</td>
                                <td contenteditable="true">Mary</td>

                                <td>
                                    <button class="btn btn-danger badge">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td contenteditable="false">No</td>
                                <td contenteditable="true" id="Kode_IK"></td>
                                <td contenteditable="true" id="Indikator_Kinerja"></td>
                                  <td>
                                    <button
                                    id="btn-submit"
                                    class="btn btn-danger badge">Tambah Data</button>
                                </td>
                            </tr>
                        </tbody>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>
            </div>
        </div>
    </div>
    {{--/table--}}
    {{--/ajax post request--}}
{{--     <script src="{!! asset('assets/')!!}/js/jquery.min.js"></script> --}}
           <script type="text/javascript">
                $(document).ready(function() {
                    $("#btn-submit").click(function(e){
                        e.preventDefault();

                        let Kode_IK = document.getElementById("Kode_IK").innerText
                        let Indikator_Kinerja = document.getElementById("Indikator_Kinerja").innerText
                        console.log($('meta[name="csrf-token"]').attr('content'));

                        console.log(Kode_IK,Indikator_Kinerja)
                        $.ajaxSetup(
                            {
                                headers:{
                                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                                }
                        });
                        $.ajax({
                            url: "/iku/tambah",
                            type:'POST',
                            data: {
                                Kode_IK:Kode_IK,
                                Indikator_Kinerja:Indikator_Kinerja
                            },
                            success: function(data) {
                                console.log(data)
                            }
                        });
                    });


                });
            </script>
    {{--/ajax post request--}}
@endsection
