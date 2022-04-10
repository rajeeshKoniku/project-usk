        <script>
            $(document).ready(function($){
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
                   let kode_ik = setiapBaris[1]
                   let ik = setiapBaris[2]
                   let ss_id = setiapBaris[3]

                      $.ajax({
                           type:'POST',
                           url:"{{ route('ik.add') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                             id:id,
                            kode_ik:kode_ik,
                            indikator_kinerja:ik,
                            ss_id:ss_id
                            },
                           success:function(data){
                             Swal.fire(
                                  'Tambah Data Sukses!'
                                )
                             location.reload()
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
                           url:"{{ route('ik.del') }}",
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
