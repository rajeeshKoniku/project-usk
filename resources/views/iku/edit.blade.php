<!-- Menghubungkan dengan view template master -->
@extends('layout.layout')
@section('judul', 'Halaman Home')
@section('konten')
    <div class="row">
                <div class="p-5">
                    <h3>Edit IKU <?php echo $id; ?></h3>

                    <form action="/iku/update/{{$id}}" method="post">
                        @csrf()
                        <label for="index">Index Iku</label>
                        <input type="text" name="index_iku" class="form-control" value="<?php echo $data->index_indikator; ?>"><br>
                        <label for="index">Indikator</label>
                        <textarea name="indikator" rows="3" class="form-control"><?php echo $data->indikator_kinerja; ?></textarea><br>
                        <button type="submit" class="btn btn-info w-100">Submit</button>
                    </form>
                </div>
        </div>

@endsection
