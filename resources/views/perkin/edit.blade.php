<!-- Menghubungkan dengan view template master -->
@extends('layout.layout')
@section('judul', 'Halaman Home')
@section('konten')
         <div class="p-5">
                    <h3>Edit Perkin</h3>
                    <form action="/perkin/update/{{$id}}" method="post" >
                        @csrf()
                        <label for="Sasaran">Sasaran</label>
                        <input type="text" name="Sasaran" class="form-control" value="<?php echo $data['Sasaran']?>"><br>
                        <label for="Kode_IK">Kode_IK</label>
                        <input type="text" name="Kode_IK" class="form-control" value="<?php echo $data['Kode_IK']?>">
                        <br>
                        <label for="Indikator_Kinerja">Indikator Kinerja</label>
                        <input type="text" name="Indikator_Kinerja" class="form-control" value="<?php echo $data['Indikator_Kinerja']?>">
                        <br>
                        <label for="Satuan">Satuan</label>
                        <input type="text" name="Satuan" class="form-control" value="<?php echo $data['Satuan']?>"><br>

                        <label for="Pk_Menteri">Pk Menteri</label>
                        <input type="text" name="Pk_Menteri" class="form-control" value="<?php echo $data['Pk_Menteri']?>"><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="tw_1">TW 1</label>
                                <input type="text" name="tw_1" class="form-control" value="<?php echo $data['tw_1']?>"><br>
                            </div>
                            <div class="col-md-3">
                                <label for="tw_2">TW 2</label>
                                <input type="text" name="tw_2" class="form-control" value="<?php echo $data['tw_2']?>">
                            </div>
                            <div class="col-md-3">
                                <label for="tw_3">TW 3</label>
                                <input type="text" name="tw_3" class="form-control" value="<?php echo $data['tw_3']?>">
                            </div>
                            <div class="col-md-3">
                                <label for="tw_4">TW 4</label>
                                <input type="text" name="tw_4" class="form-control" value="<?php echo $data['tw_4']?>">
                            </div>
                        </div>
                        <label for="Bobot">Bobot</label>
                        <input type="text" name="Bobot" class="form-control" value="<?php echo $data['Bobot']?>"><br>

                        <button type="submit" class="btn btn-info w-100">Submit</button>
                    </form>
                </div>
@endsection

