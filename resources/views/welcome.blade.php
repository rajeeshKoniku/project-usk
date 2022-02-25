<!-- Menghubungkan dengan view template master -->
@extends('layout.layout')
@section('title', 'Halaman Home')
@section('konten')

    <div class="container">

        <!--MDB Tables-->
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
                                <th>Kode Program</th>
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
                                    <button class="btn btn-danger badge">Submit</button>
                                </td>
                            </tr>

                            <tr>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                            </tr>
                        </tbody>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>
            </div>


        </div>
        <!--MDB Tables-->

    </main>

</body>
    </div>

@endsection
