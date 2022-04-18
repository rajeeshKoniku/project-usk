<script>

            $(document).ready(function($){

                // upload file via AJAX
                    $("#uploadForm").on('change', function(e){
                        e.preventDefault();
                        $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                        });
                        $.ajax({

                            type: 'POST',
                            url: "{{ route('rpk.insertImg')}}",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            beforeSend: function(){
                                console.log("Loading")
                            },
                            success: function(resp){
                                console.log(resp)
                                // if(resp == 'ok'){
                                //     $('#uploadForm')[0].reset();
                                //     $('#uploadStatus').html('<p style="color:#28A74B;">File berhasil diupload!</p>');
                                // }else if(resp == 'err'){
                                //     $('#uploadStatus').html('<p style="color:#EA4335;">Silakan pilih file yang valid untuk diupload.</p>');
                                // }
                            }
                        });
                    });

                // memvalidasi file
                $("#fileInput").change(function(){
                    var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                    var file = this.files[0];
                    var fileType = file.type;
                    if(!allowedTypes.includes(fileType)){
                        alert('Silakan pilih file yang valid (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
                        $("#fileInput").val('');
                        return false;
                    }
                });

                //ONCHANGE SELECT IK
                let option = new Option("SILAHKAN PILIH", "-"); $('.kode_prog').append($(option));
                 $(document).on('change', ".kode_ik",function(e){
                    let kode_ik = $(this).closest('tr').find('select').val()
                    let indikator = $(this).closest('tr').find('td.indikator_kinerja')

                     $.ajax({
                           type:'GET',
                           url:"{{ route('rpk.get') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                            kode_ik:kode_ik,
                            },
                           success:function(data){
                            console.log(data)
                            if(data.length === 0){
                                $('.kode_prog').empty()
                            }else{
                                indikator.text(data[1][0].indikator_kinerja)
                                if(data[0].length === 0){
                                    let option = new Option("NULL", "Data tidak ada"); $('.kode_prog').append($(option));
                                }
                                 $('.kode_prog').empty();
                                 let option = new Option("SILAHKAN PILIH", "-"); $('.kode_prog').append($(option));
                                 for(let i = 0;i< data.length;i++){
                                        let option = new Option(data[0][i].kode_prog, data[0][i].kode_prog); $('.kode_prog').append($(option));
                                    }

                            }

                           }
                        });
                 })

                //ONCHANGE SELECT PROGRAM
                $(document).on('change', ".kode_prog",function(e){
                    let kode_prog = $(this).closest('tr').find('select.kode_prog').val()
                    let prog = $(this).closest('tr').find('td.program')

                    $.ajax({
                           type:'GET',
                           url:"{{ route('rpk.getSingleProg') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                            kode_prog,
                            },
                             success:function(data)
                             {
                                prog.empty()
                                prog.text(data[0].program)
                             }
                        })
                })

                //add
                $(document).on('click', ".new_btn",function(e){

                    let row = $(this).closest('tr').clone();
                    $.each(row.find('td'), function(i1, v1){
                        $(this).html('')
                       if($(this).is(':nth-child(2)')){
                              $(this).html('<select name="kode_ik" type="text" id="kode_ik" class="kode_ik d-inline form-control w-auto required"> <option value="SILAHKAN PILIH" >SILAHKAN PILIH</option> @foreach($KK as $dataKK) @if($dataKK->kode_ik === $dataRPK->kode_ik) <option value="{{$dataKK->kode_ik}}" selected="true">{{$dataKK->kode_ik}}</option> @else <option value="{{$dataKK->kode_ik}}" >{{$dataKK->kode_ik}} </option> @endif @endforeach </select>')
                        }
                        if($(this).is(':nth-child(4)')){
                            $(this).html('<select name="kode_prog" class="kode_prog form-control d-inline w-auto required" id="">  <option value="SILAHKAN PILIH" >SILAHKAN PILIH</option></select>')
                        }
                        if ($(this).is(':last-child')) {
                            $(this).html("<span class='del_btn'><i role='button' class=' rounded bg-danger py-3 px-2 fa-solid fa-trash fa-sm'></i></span>  <span class=' bg-info save_btn'><i role='button' class='rounded bg-info py-3 px-2 fa-solid fa-floppy-disk fa-sm'></i></span> <span class=' bg-success new_btn'><i role='button' class='rounded bg-success py-3 px-2 fa-solid fa-plus fa-sm'></i</span")
                        }
                    })

                    $(this).closest('tr').after(row);
                    // console.log(row[0].innerText);
                    // console.log($(this).closest('tr').after(row)[0].innerText.split("\t").slice(0, -1));
                    // console.log(row);
                })

                //save
                 $(document).on('click', ".save_btn",function(e){
                   let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
                   let id = setiapBaris[0]
                   let kode_ik = $(this).closest('tr').find('select.kode_ik').val()
                   let kode_program = $(this).closest('tr').find('select.kode_prog').val()
                   let rincian_program = $(this).closest('tr').find('select.MAK').val()
                   let nama_kegiatan = setiapBaris[6]
                   // let proposal_project = $('#attachment').val()
                   let kebutuhan_kegiatan = setiapBaris[8]
                   let Rencana_Jadwal_Pelaksanaan = $(this).closest('tr').find('select.Rencana_Jadwal_Pelaksanaan').val()

                      $.ajax({
                           type:'POST',
                           url:"{{ route('rpk.add') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                               id,
                               kode_ik,
                               kode_program,
                               rincian_program,
                               nama_kegiatan,
                               // proposal_project,
                               kebutuhan_kegiatan,
                               Rencana_Jadwal_Pelaksanaan,
                            },
                           success:function(data){
                            console.log(data)
                            // Swal.fire({
                            //       title: 'DATA SUKSES TERSIMPAN',
                            //       confirmButtonText: 'OK',
                            //     }).then((result) => {
                            //       if (result.isConfirmed) {
                            //         location.reload()
                            //       }
                            //     })
                           }
                        });
                })

                //del
                $(document).on('click', ".del_btn",function(e){
                    let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
                       Swal.fire({
                              title: 'Data ini akan dihapus, apa anda yakin ?',
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Ya, Hapus data ini!'
                            }).then((result) => {
                              if (result.isConfirmed) {
                                 $.ajax({
                           type:'POST',
                           url:"{{ route('rpk.del') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                            id:setiapBaris[0],
                            },
                           success:function(data){
                                Swal.fire(
                                  'Terhapus!',
                                  'Data sudah terhapus.',
                                  'success'
                                )
                                location.reload()
                              }
                            })
                           }
                        });


                })
            })
        </script>

