$(document).ready(function(){

  $("#form-aplikasi").on('submit',(function(e) {
    e.preventDefault();
    // toastr.info('Harap tunggu hingga proses pengiriman selesai', 'Tunggu');
    // $("#loading_kirim").empty();
    // $('#loading_kirim').html('<button type="submit" class="btn btn-round btn-info waves-effect waves-classic">Mengirim ...</button>');
    $.ajax({
      url: base_url,
      type: "POST",
      data:  new FormData(this),
      dataType:"JSON",
      success: function(data)
        {

          if(data.code == '200'){
            toastr.clear();
            toastr.error(data.msg, 'Gagal');
            $('#loading_kirim').html('<button type="submit" class="btn btn-round btn-info waves-effect waves-classic">Kirim Profil</button>');
          } else {
            toastr.clear();
            $('#loading_kirim').html('<button type="submit" class="btn btn-round btn-info waves-effect waves-classic">Kirim Profil</button>');
            toastr.success('Data Berhasil Dikirim', 'Sukses');
          }

        },
      error: function(){}
    });
  }));



});

