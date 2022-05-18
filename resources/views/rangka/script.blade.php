        <script>
            $(document).ready(function($){
                $('#rangka').dataTable( {
                         scrollY: 300,
                        scrollX: true,
                    scroller: true
                });

                 $('table > tbody  > tr').each(function(index, tr) {
                            let self = $(this);
                            let rincian = self.find("#rincian").text();
                            let akun = $(this).closest('tr').find('select.akun')
                            console.log(akun);
                            $.ajax({
                                type:'GET',
                                url:"{{ route('rangka.ambilAkun') }}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    rincian
                                },
                                success:function(data){
                                    if(data.length === 0){
                                        $('.akun').empty()
                                    }else{
                                    // let option = new Option("SILAHKAN PILIH", "-"); $('.akun').append($(option));
                                    for(let i = 0;i< data.length;i++){
                                        console.log(data[i].AK);
                                        let option = new Option(data[i].AK, data[i].AK); akun.append($(option));
                                    }}
                                }
                            })
                    });

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
                    let codebase = setiapBaris[1]
                    let rincian_program = setiapBaris[2]
                    let nama_kegiatan = setiapBaris[3]
                    let kebutuhan_kegiatan = setiapBaris[4]
                    let akun = $(this).closest('tr').find('select.akun').val()
                    let jenis_belanja = setiapBaris[6]
                    let PNBP_unitkerja = setiapBaris[7]
                    let PNBP_institusi = setiapBaris[8]
                    let BOPTN = setiapBaris[9]
                    let kerjasama = setiapBaris[10]
                    let hibah = setiapBaris[11]
                    let biaya_kegiatan = setiapBaris[12]

                      $.ajax({
                           type:'POST',
                           url:"{{ route('rangka.add') }}",
                           data:{
                            "_token": "{{ csrf_token() }}",
                            id,
                            codebase,
                            rincian_program,
                            nama_kegiatan,
                            kebutuhan_kegiatan,
                            akun,
                            jenis_belanja,
                            PNBP_unitkerja,
                            PNBP_institusi,
                            BOPTN,
                            kerjasama,
                            hibah,
                            biaya_kegiatan,
                            },
                           success:function(data){
                             console.log(data)
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
                                   url:"{{ route('rangka.del') }}",
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
