<html>
    <head>
        <title>Inline</title>
        

        </head>
    <body>
        <div class="m-5">

        <table class="p-10 table-bordered table">
            <tr>
                <td>Kode IK</td>
                <td>Indikator Kinerja</td>
                <td>Kode SS</td>
                <td>Action</td>
            </tr>
                @foreach($data as $x)
            <tr>
                <td style="display: none">{{ $loop->iteration }}</td>
                <td contenteditable="true">{{ $x->kode_ik}}</td>
                <td contenteditable="true">{{ $x->indikator_kinerja}}</td>
                <td contenteditable="true">{{ $x->ss_id}}</td>

                <td>
                    <span class="badge btn btn-danger del_btn"><i class="fa-solid fa-trash pr-1"></i>Delete</span>
                    <span class="badge btn btn-success save_btn"><i class="fa-solid fa-floppy-disk pr-1"></i>Save</span>
                    <span class="badge btn btn-info new_btn"><i class="fa-solid fa-plus pr-1"></i>Add row</span>
                </td>
            </tr>
                @endforeach
        </table>

        </div>
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
                   let kode_ik = setiapBaris[0]
                   let ik = setiapBaris[1]
                   let ss_id = setiapBaris[2]

                      $.ajax({
                           type:'POST',
                           url:"{{ route('ik.add') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                            kode_ik:kode_ik,
                            indikator_kinerja:ik,
                            ss_id:ss_id
                            },
                           success:function(data){
                             console.log(data)
                           }
                        });
                })

                //del
                $(document).on('click', ".del_btn",function(e){
                    let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
                    $.ajax({
                           type:'POST',
                           url:"{{ route('ik.del') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                            id:setiapBaris[0],

                            },
                           success:function(data){
                              alert(data.success);
                            location.reload()
                           }
                        });
                })
            })
        </script>
    </body>
</html>

