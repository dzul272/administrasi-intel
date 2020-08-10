$(document).ready(function(){
    $(document).on('click','.download_file',function(e){
        // $('.myModal').modal('hide');
        Swal.close();
        Swal.fire("Oops", "Data File Lampiran Tidak Ditemukan", "error");
    });



});