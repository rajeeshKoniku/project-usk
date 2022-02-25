<!-- Menghubungkan dengan view template master -->
@extends('layout.layout')
@section('judul', 'Halaman Home')
@section('konten')
    <div class="row">
        <div class="col-6">
                <div class="p-5">
                    <h3>Tambah IKU</h3>
                    <form action="iku/tambah" method="post">
                        @csrf()
                        <label for="index">Index Iku</label>
                        <input type="text" name="index_iku" class="form-control"><br>
                        <label for="index">Indikator</label>
                        <textarea name="indikator" rows="3" class="form-control"></textarea><br>
                        <button type="submit" class="btn btn-info w-100">Submit</button>
                    </form>
                </div>
        </div>

        <div class="col-6">

            <table class="table table-responsive">
                <tr>
                    <td>No</td>
                    <td>Index Iku</td>
                    <td>Indikator</td>
                </tr>
                <?php foreach ($data as $iku) { ?>
                    <tr>
                        <td><?php echo $iku->id?></td>
                        <td><?php echo $iku->index_indikator; ?></td>
                        <td><?php echo $iku->indikator_kinerja; ?></td>
                        <td>
                            <a href="iku/edit/{{$iku->id}}" class="btn btn-primary text-white badge">Edit</a>
                           <form action="iku/delete/{{$iku->id}}" method="post">
                                @csrf()
                                <button type='submit' class="btn btn-info badge">Hapus</button>
                           </form>
                        </td>
                    </tr>
                <?php }?>
            </table>
        </div>
    </div>
@endsection
