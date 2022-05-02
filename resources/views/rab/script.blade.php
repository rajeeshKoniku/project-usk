        <script>
            $(document).ready(function(){
              $('#dtHorizontalVerticalExample').DataTable({
                "scrollX": true,
                "scrollY": 200,
              });
              $('.dataTables_length').addClass('bs-select');
                //add row
                $(document).on('click', ".new_btn",function(e){
                    let row = $(this).closest('tr').clone();
                    $.each(row.find('td'), function(i1, v1){
                        $(this).html('')
                        if ($(this).is(':last-child')) {
                            $(this).html("<span class='del_btn'><i role='button' class=' rounded bg-danger py-3 px-2 fa-solid fa-trash fa-sm'></i></span>  <span class=' bg-info save_btn'><i role='button' class='rounded bg-info py-3 px-2 fa-solid fa-floppy-disk fa-sm'></i></span> <span class=' bg-success new_btn'><i role='button' class='rounded bg-success py-3 px-2 fa-solid fa-plus fa-sm'></i</span")
                        }
                    })
                    $(this).closest('tr').after(row);
                })

                //SAVE CATALOG FILE
                $(document).on('click', '.btnCatalog', function(e){
                    let catalogFile = $(this).closest('tr').find('#catalog')
                     $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('rab.addCatalog')}}",
                        contentType: false,
                        cache: false,
                        processData:false,
                        data: new FormData(catalogFile[0]),
                            beforeSend: function(){
                                console.log("Loading")
                            },
                            success:function(data){
                                console.log(data)
                           }
                        });
                })

                //SAVE PROJECT FILE
                $(document).on('click', '.btnProject', function(e){
                    let projectFile = $(this).closest('tr').find('#proposal_project')
                     $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('rab.addProject')}}",
                        contentType: false,
                        cache: false,
                        processData:false,
                        data: new FormData(projectFile[0]),
                            beforeSend: function(){
                                console.log("Loading")
                            },
                            success:function(data){
                                console.log(data)
                           }
                        });
                })

                //SAVE RAB FILE
                $(document).on('click', '.btnRab', function(e){
                    let rabFile = $(this).closest('tr').find('#rab_detail')
                     $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('rab.addRab')}}",
                        contentType: false,
                        cache: false,
                        processData:false,
                        data: new FormData(rabFile[0]),
                            beforeSend: function(){
                                console.log("Loading")
                            },
                            success:function(data){
                                console.log(data)
                           }
                        });
                })
                //SAVE GAMBAR FILE
                $(document).on('click', '.btnGambar', function(e){
                    let gambarFile = $(this).closest('tr').find('#perencanaan_gambar')
                     $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('rab.addGambar')}}",
                        contentType: false,
                        cache: false,
                        processData:false,
                        data: new FormData(gambarFile[0]),
                            beforeSend: function(){
                                console.log("Loading")
                            },
                            success:function(data){
                                console.log(data)
                           }
                        });
                })

                //save
                 $(document).on('click', ".save_btn",function(e){
                    let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
                    let id = setiapBaris[0]
                    let kuantitas = setiapBaris[5]
                    let kuantitas_2 = setiapBaris[6]
                    let durasi = setiapBaris[7]
                    let durasi_2 = setiapBaris[8]
                    let kegiatan = setiapBaris[9]
                    let kegiatan_2 = setiapBaris[10]
                    let merk = setiapBaris[11]
                    let type = setiapBaris[12]
                    let harga_satuan = setiapBaris[17]
                    let catalogFile = $(this).closest('tr').find('#catalog')
                    let projectFile = $(this).closest('tr').find('#proposal_project')
                    let rabdetailFile = $(this).closest('tr').find('#rab_detail')
                    let perencanaangambarFile = $(this).closest('tr').find('#perencanaan_gambar')

                    //untuk insert ke database
                    let newCatalogFile = catalogFile[0][0].value.replace("C:\\fakepath\\","")
                    let newProjectFile = projectFile[0][0].value.replace("C:\\fakepath\\","")
                    let newRabdetailFile = rabdetailFile[0][0].value.replace("C:\\fakepath\\","")
                    let newPerencanaangambarFile = perencanaangambarFile[0][0].value.replace("C:\\fakepath\\","")

                    $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('rab.add')}}",
                        data:{
                            id,
                            kuantitas,
                            kuantitas_2,
                            durasi,
                            durasi_2,
                            kegiatan,
                            kegiatan_2,
                            merk,
                            type,
                            harga_satuan,
                            newCatalogFile,
                            newProjectFile,
                            newRabdetailFile,
                            newPerencanaangambarFile,

                            },
                            beforeSend: function(){
                                console.log("Loading")
                            },
                            success:function(data){
                            console.log(data);
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
                               url:"{{ route('rab.del') }}",
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
