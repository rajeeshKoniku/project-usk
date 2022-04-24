<script type="text/javascript">

        $(document).ready(function() {


              $('#example').DataTable({
                 "initComplete": function (settings, json) {
                    $("#example").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                  },
                } )
              //ambil setiap nilai td
             // $('table > tbody  > tr').each(function(index, tr) {
             //         if (tr === "SILAHKAN PILIH") { // or whatever
             //            return false;
             //        }
             //        let self = $(this);
             //        let kode_ik = self.find("select.kode_ik").val();
             //        let ik = self.find("td.indikator_kinerja");

             //            $.ajax({
             //               type:'GET',
             //               url:"{{ route('rpk.get') }}",
             //               data:{
             //                 "_token": "{{ csrf_token() }}",
             //                   kode_ik
             //                },
             //                 success:function(data)
             //                 {
             //                    console.log(kode_ik, data[0][0])
             //                    let ikoo = self.find("select.kode_ik").closest('select').find(':selected').val();

             //                    if(data[0].length !== 0){
             //                        for(let i = 0;i< data[0].length;i++){
             //                            let prog = data[0][i].kode_prog.substr(0,8)
             //                            if(typeof(ikoo) == typeof(prog)){
             //                                let option = new Option(data[0][i].kode_prog, data[0][i].kode_prog); $('.kode_prog').append($(option));
             //                                $("select.kode_prog option").each(function() {
             //                                  $(this).siblings('[value="'+ this.value +'"]').remove();
             //                                });
             //                            }
             //                        //     // let option = new Option(data[0][i].kode_prog, data[0][i].kode_prog); $('.kode_prog').append($(option));
             //                        //     // $("select.kode_prog option").each(function() {
             //                        //     //       $(this).siblings('[value="'+ this.value +'"]').remove();
             //                        //     //     });
             //                            }
             //                    }
             //                    for(let i = 0;i< data.length;i++){
             //                       ik.text(data[1][i].indikator_kinerja)
             //                    }
             //                 }
             //            })
             //        return true
             //    });



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

                //add row
                $(document).on('click', ".new_btn",function(e){

                    let row = $(this).closest('tr').clone();
                    $.each(row.find('td'), function(i1, v1){
                        $(this).html('')
                       if($(this).is(':nth-child(2)')){
                              $(this).html('<select name="kode_ik" type="text" id="kode_ik" class="kode_ik d-inline form-control w-auto required"> <option value="SILAHKAN PILIH"  selected="true">SILAHKAN PILIH</option> @foreach($KK as $dataKK) <option value="{{$dataKK->kode_ik}}">{{$dataKK->kode_ik}}</option>  @endforeach </select>')
                        }
                        if($(this).is(':nth-child(4)')){
                            $(this).html('<select name="kode_prog" class="kode_prog form-control d-inline w-auto required" id="">  <option value="SILAHKAN PILIH" >SILAHKAN PILIH</option></select>')
                        }
                         if($(this).is(':nth-child(6)')){
                            $(this).html('<select name="rincian_program" class="rincian_program form-control d-inline w-auto required" id="">  <option value="SILAHKAN PILIH" >SILAHKAN PILIH</option>  @foreach($RINCIANPROGRAM as $dataMAK) <option value="{{$dataMAK->MAK}}" >{{$dataMAK->MAK}}</option> @endforeach</select>')
                        }
                        if($(this).is(':nth-child(8)')){
                            $(this).html('<div id="uploadStatus"></div> <form id="uploadForm" enctype="multipart/form-data"> <input type="file" id="attachment" name="file" id="fileInput"> <input type="submit" class="submit" value="Submit" /></form>')
                        }
                        if($(this).is(':nth-child(10)')){
                            $(this).html(' <select name="Rencana_Jadwal_Pelaksanaan" class="Rencana_Jadwal_Pelaksanaan d-inline form-control w-auto required"><option value="TRIWULAN 1">TRIWULAN 1</option><option value="TRIWULAN 2">TRIWULAN 2</option><option value="TRIWULAN 3">TRIWULAN 3</option><option value="TRIWULAN 4">TRIWULAN 4</option> </select>')
                        }
                        if($(this).is(':nth-child(11)')){
                            $(this).html('<select name="tahun" class="tahun d-inline form-control w-auto required"><option value="PILIH TAHUN">PILIH TAHUN</option><option value="2022">2022</option><option value="2023">2023</option><option value="2025">2024</option><option value="2025">2025</option><option value="2026">2026</option></select>')
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
                   var file = $(this).closest('tr').find('#uploadForm')
                   let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
                   let prevId = $(this).closest('tr').prev()[0].innerText.split("\t").slice(0, -1)[0]
                   let id = setiapBaris[0]
                   let kode_ik = $(this).closest('tr').find('select.kode_ik').val()
                   let kode_program = $(this).closest('tr').find('select.kode_prog').val()
                   let rincian_program = $(this).closest('tr').find('select.rincian_program').val()
                   let nama_kegiatan = setiapBaris[6]
                   let proposal_project = file[0][0].value.replace("C:\\fakepath\\","");
                   let kebutuhan_kegiatan = setiapBaris[8]
                   let Rencana_Jadwal_Pelaksanaan = $(this).closest('tr').find('select.Rencana_Jadwal_Pelaksanaan').val()
                   let tahun = $(this).closest('tr').find('select.tahun').val()

                    $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                        });
                      $.ajax({
                            type: 'POST',
                            url: "{{ route('rpk.insertImg')}}",
                            data: new FormData(file[0]),
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

                      $.ajax({
                           type:'POST',
                           url:"{{ route('rpk.add') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                               id,
                               prevId,
                               kode_ik,
                               kode_program,
                               rincian_program,
                               nama_kegiatan,
                               proposal_project,
                               kebutuhan_kegiatan,
                               Rencana_Jadwal_Pelaksanaan,
                               tahun,
                            },
                           success:function(data){
                           console.log(data)
                            Swal.fire({
                                  title: data,
                                  confirmButtonText: 'OK',
                                }).then((result) => {
                                  if (result.isConfirmed) {
                                    location.reload()
                                  }
                                })
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

