        <script>
            $(document).ready(function($){
                //add
                $(document).on('click', ".new_btn",function(e){
                    let row = $(this).closest('tr').clone();
                    $.each(row.find('td'), function(i1, v1){
                        $(this).html('')
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
                   let Rip = setiapBaris[2]
                   let Keg = setiapBaris[3]
                   let KRO = setiapBaris[4]
                   let RO = setiapBaris[5]
                   let KP = setiapBaris[6]
                   let SK = setiapBaris[7]
                   let MAK = setiapBaris[8]

                      $.ajax({
                           type:'POST',
                           url:"{{ route('rincianprogram.add') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                             id:id,
                            Rip:Rip,
                            Keg:Keg,
                            KRO:KRO,
                            RO:RO,
                            KP:KP,
                            SK:SK,
                            MAK:MAK,
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
                               url:"{{ route('rincianprogram.del') }}",
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
