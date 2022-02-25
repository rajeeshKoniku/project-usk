@extends('layout.layout')
@section('judul', 'Halaman Home')
@section('konten')
         <table class="table table-responsive">
        <thead class="thead-dark">

                <tr>
                    <td>No</td>
                    <td>Sasaran</td>
                    <td>Kode_IK</td>
                    <td>Indikator_Kinerja</td>
                    <td>Satuan</td>
                    <td>Pk_Menteri</td>
                    <td>tw_1</td>
                    <td>tw_2</td>
                    <td>tw_3</td>
                    <td>tw_4</td>
                    <td>Bobot</td>
                </tr>
        </thead>
                <?php foreach ($data as $perkin) { ?>
                    <tr>
                        <td  contenteditable="true" id="id"><?php echo $perkin->id?></td>
                        <td  contenteditable="true" id="Sasaran"><?php echo $perkin->Sasaran; ?></td>
                        <td  contenteditable="true" id="Kode_IK"><?php echo $perkin->Kode_IK; ?></td>
                        <td  contenteditable="true" id="Indikator_Kinerja"><?php echo $perkin->Indikator_Kinerja; ?></td>
                        <td  contenteditable="true" id="Satuan"><?php echo $perkin->Satuan; ?></td>
                        <td  contenteditable="true" id="Pk_Menteri"><?php echo $perkin->Pk_Menteri; ?></td>
                        <td  contenteditable="true" id="tw_1"><?php echo $perkin->tw_1; ?></td>
                        <td  contenteditable="true" id="tw_2"><?php echo $perkin->tw_2; ?></td>
                        <td  contenteditable="true" id="tw_3"><?php echo $perkin->tw_3; ?></td>
                        <td  contenteditable="true" id="tw_4"><?php echo $perkin->tw_4; ?></td>
                        <td  contenteditable="true" id="Bobot"><?php echo $perkin->Bobot; ?></td>
                        <td>
                          {{--   <a href="" class="btn btn-primary text-white badge"
                            onclick="save()">Submit</a> --}}
                           <form>
                                @csrf()
                                <button id="ajaxSubmit" type='submit' class="btn btn-info badge">Submit</button>
                           </form>
                        </td>
                    </tr>
                <?php }?>
            </table>
            <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
            </script>
            <script type="text/javascript">
                 jQuery(document).ready(function(){
                    jQuery('#ajaxSubmit').click(function(e){
                       e.preventDefault();
                    $.ajaxSetup({
                          headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });
                          jQuery.ajax({
                              url: "{{ url('/perkin/tambah') }}",
                              method: 'post',
                              data: {
                                Sasaran : document.getElementById("Sasaran").innerText,
                                Kode_IK : document.getElementById("Kode_IK").innerText,
                                Indikator_Kinerja : document.getElementById("Indikator_Kinerja").innerText,
                                Satuan : document.getElementById("Satuan").innerText,
                                Pk_Menteri : document.getElementById("Pk_Menteri").innerText,
                                tw_1 : document.getElementById("tw_1").innerText,
                                tw_2 : document.getElementById("tw_2").innerText,
                                tw_3 : document.getElementById("tw_3").innerText,
                                tw_4 : document.getElementById("tw_4").innerText,
                                Bobot : document.getElementById("Bobot").innerText,
                              },
                              success: function(result){
                                 jQuery('.alert').show();
                                 jQuery('.alert').html(result.success);
                              }});
                           });

              });

            </script>
            <script type="text/javascript">

                function save(e){
                    }
            </script>
   
@endsection

