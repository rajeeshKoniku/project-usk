        <script>
            $(document).ready(function($){
                $('.new_row_btn').click(function() {
                  $("#kk").append('<tr><td></td><td></td><td></td> <td contenteditable="false" style="width: 100px:"></td><td style="width: 100pdataKK" contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td> <td contenteditable="false"></td><td><span class="del_btn"><i role="button" class="rounded bg-danger text-white mr-1 p-3 fa-solid fa-trash fa-sm"></i></span><span class="save_btn"><i role="button" class="text-white mr-1 rounded bg-info p-3 fa-solid fa-floppy-disk fa-sm"></i></span><span class="new_btn"><i role="button" class="text-white mr-1 rounded bg-success p-3 fa-solid fa-plus fa-sm"></i></span></td></tr>');
               });
                $(document).on('click', '.save_nip_btn', function(e){
                    let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
                    let kode_ik = setiapBaris[0]
                    let nip = setiapBaris[1]
                    let nama_pimpinan = setiapBaris[2]

                     $.ajax({
                           type:'POST',
                           url:"{{ route('kk.add_nip') }}",
                           data:{
                            "_token": "{{ csrf_token() }}",
                            kode_ik,
                            nip,
                            nama_pimpinan
                            },
                           success:function(data){
                             console.log(data);
                             // Swal.fire({
                             //      title: 'DATA SUKSES TERSIMPAN',
                             //      confirmButtonText: 'OK',
                             //    }).then((result) => {
                             //      if (result.isConfirmed) {
                             //        location.reload()
                             //      }
                             //    })
                           }
                        });
                })

                //add
                $(document).on('click', ".new_btn",function(e){

                    let row = $(this).closest('tr').clone();
                    $.each(row.find('td'), function(i1, v1){
                        $(this).html('')
                        if ($(this).is(':last-child')) {
                            $(this).html("<span class='badge btn btn-danger del_btn'>Delete</span>  <span class='badge btn btn-success save_btn'>Save</span> <span class='badge btn btn-info new_btn'>Add row</span")
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
                   let kode_ik = $(this).closest('tr').find('select').val()
                   let satuan = setiapBaris[5]
                   let tw_1 = setiapBaris[6]
                   let tw_2 = setiapBaris[7]
                   let tw_3 = setiapBaris[8]
                   let tw_4 = setiapBaris[9]

                      $.ajax({
                           type:'POST',
                           url:"{{ route('kk.add') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                             id:id,
                            kode_ik:kode_ik,
                            satuan:satuan,
                            tw_1:tw_1,
                            tw_2:tw_2,
                            tw_3:tw_3,
                            tw_4:tw_4,
                            },
                           success:function(data){
                             Swal.fire({
                                  title: 'DATA SUKSES TERSIMPAN',
                                  confirmButtonText: 'OK',
                                }).then((result) => {
                                  /* Read more about isConfirmed, isDenied below */
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
                                   url:"{{ route('kk.del') }}",
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
