<!-- Menghubungkan dengan view template master -->
@extends('layout.layout')
@section('judul', 'Halaman Home')
@section('konten')
         <div class="p-5">
                    <h3>Tambah Perkin</h3>
                    <form action="/perkin/tambah" method="post">
                        @csrf()
                        <label for="Sasaran">Sasaran</label>
                        <input type="text" name="Sasaran" class="form-control"><br>
                        <label for="Kode_IK">Kode_IK</label>
                        <select class="form-control" name="Kode_IK">
                            <?php foreach($iku as $key){ ?>
                                <option value="<?php echo $key->index_indikator ?>"><?php echo $key->index_indikator . $key->indikator_kinerja?></option>
                            <?php }?>
                        </select>
                        <br>
                        <label for="Indikator_Kinerja">Indikator Kinerja</label>
                        <select class="form-control" name="Indikator_Kinerja">
                            <?php foreach($iku as $key){ ?>
                                <option value="<?php echo $key->indikator_kinerja ?>"><?php echo $key->indikator_kinerja?></option>
                            <?php }?>
                        </select>
                        <br>
                        <label for="Satuan">Satuan</label>
                        <input type="text" name="Satuan" class="form-control"><br>
                        <label for="Pk_Menteri">Pk Menteri</label>
                        <input type="text" name="Pk_Menteri" class="form-control"><br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="tw_1">TW 1</label>
                                <input type="text" name="tw_1" class="form-control"><br>
                            </div>
                            <div class="col-md-3">
                                <label for="tw_2">TW 2</label>
                                <input type="text" name="tw_2" class="form-control"><br>
                            </div>
                            <div class="col-md-3">
                                <label for="tw_3">TW 3</label>
                                <input type="text" name="tw_3" class="form-control"><br>
                            </div>
                            <div class="col-md-3">
                                <label for="tw_4">TW 4</label>
                                <input type="text" name="tw_4" class="form-control"><br>
                            </div>
                        </div>
                        <label for="Bobot">Bobot</label>
                        <input type="text" name="Bobot" class="form-control"><br>
                        <button type="submit" class="btn btn-info w-100">Submit</button>
                    </form>
                </div>
@endsection

