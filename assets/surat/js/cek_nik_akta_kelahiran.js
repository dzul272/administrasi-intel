function validate() {
        var pemohon = document.getElementById('cek_nik_pemohon');
        var kepala_keluarga = document.getElementById('cek_nik_kepala_keluarga');
        var ayah = document.getElementById('cek_nik_ayah');
        var ibu = document.getElementById('cek_nik_ibu');
       
        pemohon.value = pemohon.value.replace(/[^0-9]/, '');
        kepala_keluarga.value = kepala_keluarga.value.replace(/[^0-9]/, '');
        ayah.value = ayah.value.replace(/[^0-9]/, '');
        ibu.value = ibu.value.replace(/[^0-9]/, '');
        

        var rtpemohon = document.getElementById('rt_pemohon');
        var rwpemohon = document.getElementById('rw_pemohon');
        rtpemohon.value = rtpemohon.value.replace(/[^0-9]/, '');
        rwpemohon.value = rwpemohon.value.replace(/[^0-9]/, '');
        var rtayah = document.getElementById('rt_ayah');
        var rwayah = document.getElementById('rw_ayah');
        rtayah.value = rtayah.value.replace(/[^0-9]/, '');
        rwayah.value = rwayah.value.replace(/[^0-9]/, '');
        var rtibu = document.getElementById('rt_ibu');
        var rwibu = document.getElementById('rw_ibu');
        rtibu.value = rtibu.value.replace(/[^0-9]/, '');
        rwibu.value = rwibu.value.replace(/[^0-9]/, '');
       
      };

// function cari_pemohon(){
//     if ($('#cek_nik_pemohon').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{


//      // let timerInterval
//      let nik_ = $("#cek_nik_pemohon").val();
//         Swal.fire({
//                 title: 'Mohon Tunggu Beberapa Saat',
//                 html: 'Proses Mencari Data Pada Dindukcapil',
//                 // timer: 2000,
//                 onBeforeOpen: () => {
//                     Swal.showLoading();
//                     // alert('aw')
//                     // //START AJAX 
//                     $.ajax({
//                         type: "GET", // Method pengiriman data bisa dengan GET atau POST
//                         url: baseURL, // Isi dengan url/path file php yang dituju
//                         data: {"nik" : nik_}, // data yang akan dikirim ke file yang dituju
//                         dataType: "json",
                        
//                         success: function(response){ // Ketika proses pengiriman berhasil
                        
//                             // alert(response.response.co);
//                           if (response.respon_code == 1) {
//                             // alert("asu");
//                             let data  = response.content[0];
                        

//                             $("#nama_pemohon").val(data.NAMA_LGKP);
//                             $("#nama_pemohon").attr("readonly", true);
                            
//                             $("#tempat_lahir_pemohon").val(data.TMPT_LHR);
//                             $("#tempat_lahir_pemohon").attr("readonly", true);

//                             $(".tgl_kelahiran_pemohon").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_pemohon").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_pemohon").attr("disabled", true);
//                             $("#tgl_kelahiran3_pemohon").attr("disabled", false);
                    
//                             $("#warga_negara_pemohon").val("WNI");
//                             $("#warga_negara3_pemohon").val("WNI");
//                             $("#warga_negara_pemohon").attr("disabled", true);
//                             $("#warga_negara3_pemohon").attr("disabled", false);

//                             $("#agama_pemohon").val(data.AGAMA);
//                             $("#agama3_pemohon").val(data.AGAMA);
//                             $("#agama_pemohon").attr("disabled", true);
//                             $("#agama3_pemohon").attr("disabled", false);


//                             $("#pekerjaan_pemohon").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_pemohon").attr("readonly", true);
                            
//                             $("#alamat_pemohon").val(data.ALAMAT);
//                             $("#alamat_pemohon").attr("readonly", true);
//                             $("#rt_pemohon").val(data.NO_RT);
//                             $("#rt_pemohon").attr("readonly", true);
//                             $("#rw_pemohon").val(data.NO_RW);
//                             $("#rw_pemohon").attr("readonly", true);
                            

//                             $("select").trigger('change');
//                             // $("select").select2({disabled:readonly});

                        
                            
                            

//                             Swal.close();
//                             Swal.fire("Berhasil", "Data Ditemukan", "success");
                            
//                           }else{
//                             Swal.close();
//                             Swal.fire("Oops", "Data Tidak Ditemukan", "error");
//                             $('form').trigger("reset");
//                             $('select').trigger('change');
//                           }
//                         },
//                         error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
//                           alert(thrownError); // Munculkan alert error
//                         }
//                       });
//                     //  // END AJAX
//                 }
                
//             });
//       }
//   }

// function cari_anak(){
//     if ($('#cek_nik_anak').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_anak").val();
//         Swal.fire({
//                 title: 'Mohon Tunggu Beberapa Saat',
//                 html: 'Proses Mencari Data Pada Dindukcapil',
//                 // timer: 2000,
//                 onBeforeOpen: () => {
//                     Swal.showLoading();
//                     // alert('aw')
//                     // //START AJAX 
//                     $.ajax({
//                         type: "GET", // Method pengiriman data bisa dengan GET atau POST
//                         url: baseURL, // Isi dengan url/path file php yang dituju
//                         data: {"nik" : nik_}, // data yang akan dikirim ke file yang dituju
//                         dataType: "json",
                        
//                         success: function(response){ // Ketika proses pengiriman berhasil
                        
//                             // alert(response.response.co);
//                           if (response.respon_code == 1) {
//                             // alert("asu");
//                             let data  = response.content[0];
                        

//                             $("#nama_anak").val(data.NAMA_LGKP);
//                             $("#nama_anak").attr("readonly", true);
                            
//                             $("#tempat_lahir_anak").val(data.TMPT_LHR);
//                             $("#tempat_lahir_anak").attr("readonly", true);

//                             $(".tgl_kelahiran_anak").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_anak").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_anak").attr("disabled", true);
//                             $("#tgl_kelahiran3_anak").attr("disabled", false);

//                             let tanggal_lama = data.TGL_LHR;
//                             let date1 = tanggal_lama.split("-");
//                             let newdate = date1[1] + '/' +date1[2] +'/' +date1[0];
//                             let local = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu' ];

//                             let today = new Date(newdate);
//                             let dd = today.getDay();

//                             //alert(local[today.getDay()]);
//                             // $('#hari').val(local[today.getDay()]);
//                             $('#hari').val(local[dd]);

//                             $("#agama_anak").val(data.AGAMA);
//                             $("#agama3_anak").val(data.AGAMA);
//                             $("#agama_anak").attr("disabled", true);
//                             $("#agama3_anak").attr("disabled", false);

//                             $("#jk_anak").val(data.JENIS_KLMIN);
//                             $("#jk3_anak").val(data.JENIS_KLMIN);
//                             $("#jk3_anak").attr("disabled", false);
//                             $("#jk_anak").attr("disabled", true);
//                             $("select").trigger('change');

//                             Swal.close();
//                             Swal.fire("Berhasil", "Data Ditemukan", "success");
                            
//                           }else{
//                             Swal.close();
//                             Swal.fire("Oops", "Data Tidak Ditemukan", "error");
//                             $('form').trigger("reset");
//                             $('select').trigger('change');
//                           }
//                         },
//                         error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
//                           alert(thrownError); // Munculkan alert error
//                         }
//                       });
//                     //  // END AJAX
//                 }
                
//             });
//       }
// }

// function cari_ayah(){
//     if ($('#cek_nik_ayah').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_ayah").val();
//         Swal.fire({
//                 title: 'Mohon Tunggu Beberapa Saat',
//                 html: 'Proses Mencari Data Pada Dindukcapil',
//                 // timer: 2000,
//                 onBeforeOpen: () => {
//                     Swal.showLoading();
//                     // //START AJAX 
//                     $.ajax({
//                         type: "GET", // Method pengiriman data bisa dengan GET atau POST
//                         url: baseURL, // Isi dengan url/path file php yang dituju
//                         data: {"nik" : nik_}, // data yang akan dikirim ke file yang dituju
//                         dataType: "json",
                        
//                         success: function(response){ // Ketika proses pengiriman berhasil
                        
//                             // alert(response.response.co);
//                           if (response.respon_code == 1) {
//                             // alert("asu");
//                             let data  = response.content[0];
                        
//                             $("#nama_ayah").val(data.NAMA_LGKP);
//                             $("#nama_ayah").attr("readonly", true);
                            
//                             $("#tempat_lahir_ayah").val(data.TMPT_LHR);
//                             $("#tempat_lahir_ayah").attr("readonly", true);

//                             $(".tgl_kelahiran_ayah").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_ayah").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_ayah").attr("disabled", true);
//                             $("#tgl_kelahiran3_ayah").attr("disabled", false);

//                             let dob = new Date(data.TGL_LHR);
//                             let today = new Date();
//                             let age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
//                             $('#umur_ayah').val(age);
//                             $('#umur_ayah').attr("readonly", true);
//                             $("#pekerjaan_ayah").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_ayah").attr("readonly", true);
                            
//                             $("#alamat_ayah").val(data.ALAMAT);
//                             $("#alamat_ayah").attr("readonly", true);

//                             $("#rt_ayah").val(data.NO_RT);
//                             $("#rt_ayah").attr("readonly", true);
//                             $("#rw_ayah").val(data.NO_RW);
//                             $("#rw_ayah").attr("readonly", true);

                            
//                             $("select").trigger('change');

//                             Swal.close();
//                             Swal.fire("Berhasil", "Data Ditemukan", "success");
                            
//                           }else{
//                             Swal.close();
//                             Swal.fire("Oops", "Data Tidak Ditemukan", "error");
//                             $('form').trigger("reset");
//                             $('select').trigger('change');
//                           }
//                         },
//                         error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
//                           alert(thrownError); // Munculkan alert error
//                         }
//                       });
//                     //  // END AJAX
//                 }
                
//             });
//       }
// }

// function cari_ibu(){
//     if ($('#cek_nik_ibu').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_ibu").val();
//         Swal.fire({
//                 title: 'Mohon Tunggu Beberapa Saat',
//                 html: 'Proses Mencari Data Pada Dindukcapil',
//                 // timer: 2000,
//                 onBeforeOpen: () => {
//                     Swal.showLoading();
//                     // //START AJAX 
//                     $.ajax({
//                         type: "GET", // Method pengiriman data bisa dengan GET atau POST
//                         url: baseURL, // Isi dengan url/path file php yang dituju
//                         data: {"nik" : nik_}, // data yang akan dikirim ke file yang dituju
//                         dataType: "json",
                        
//                         success: function(response){ // Ketika proses pengiriman berhasil
                        
//                             // alert(response.response.co);
//                           if (response.respon_code == 1) {
//                             // alert("asu");
//                             let data  = response.content[0];
                        
//                             $("#nama_ibu").val(data.NAMA_LGKP);
//                             $("#nama_ibu").attr("readonly", true);
                            
//                             $("#tempat_lahir_ibu").val(data.TMPT_LHR);
//                             $("#tempat_lahir_ibu").attr("readonly", true);

//                             $(".tgl_kelahiran_ibu").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_ibu").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_ibu").attr("disabled", true);
//                             $("#tgl_kelahiran3_ibu").attr("disabled", false);

//                             let dob = new Date(data.TGL_LHR);
//                             let today = new Date();
//                             let age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
//                             $('#umur_ibu').val(age);
//                             $('#umur_ibu').attr("readonly", true);
//                             $("#pekerjaan_ibu").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_ibu").attr("readonly", true);
                            
//                             $("#alamat_ibu").val(data.ALAMAT);
//                             $("#alamat_ibu").attr("readonly", true);

//                             $("#rt_ibu").val(data.NO_RT);
//                             $("#rt_ibu").attr("readonly", true);
//                             $("#rw_ibu").val(data.NO_RW);
//                             $("#rw_ibu").attr("readonly", true);

                            
//                             $("select").trigger('change');

//                             Swal.close();
//                             Swal.fire("Berhasil", "Data Ditemukan", "success");
                            
//                           }else{
//                             Swal.close();
//                             Swal.fire("Oops", "Data Tidak Ditemukan", "error");
//                             $('form').trigger("reset");
//                             $('select').trigger('change');
//                           }
//                         },
//                         error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
//                           alert(thrownError); // Munculkan alert error
//                         }
//                       });
//                     //  // END AJAX
//                 }
                
//             });
//       }
// }

// function cari_saksi_satu(){
//     if ($('#cek_nik_saksi_satu').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_saksi_satu").val();
//         Swal.fire({
//                 title: 'Mohon Tunggu Beberapa Saat',
//                 html: 'Proses Mencari Data Pada Dindukcapil',
//                 // timer: 2000,
//                 onBeforeOpen: () => {
//                     Swal.showLoading();
//                     // //START AJAX 
//                     $.ajax({
//                         type: "GET", // Method pengiriman data bisa dengan GET atau POST
//                         url: baseURL, // Isi dengan url/path file php yang dituju
//                         data: {"nik" : nik_}, // data yang akan dikirim ke file yang dituju
//                         dataType: "json",
                        
//                         success: function(response){ // Ketika proses pengiriman berhasil
                        
//                             // alert(response.response.co);
//                           if (response.respon_code == 1) {
//                             // alert("asu");
//                             let data  = response.content[0];
                        
//                             $("#nama_saksi_satu").val(data.NAMA_LGKP);
//                             $("#nama_saksi_satu").attr("readonly", true);
                            
//                             $("#tempat_lahir_saksi_satu").val(data.TMPT_LHR);
//                             $("#tempat_lahir_saksi_satu").attr("readonly", true);

//                             $(".tgl_kelahiran_saksi_satu").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_saksi_satu").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_saksi_satu").attr("disabled", true);
//                             $("#tgl_kelahiran3_saksi_satu").attr("disabled", false);

//                             let dob = new Date(data.TGL_LHR);
//                             let today = new Date();
//                             let age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
//                             $('#umur_saksi_satu').val(age);
//                             $('#umur_saksi_satu').attr("readonly", true);
//                             $("#pekerjaan_saksi_satu").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_saksi_satu").attr("readonly", true);
                            
//                             $("#alamat_saksi_satu").val(data.ALAMAT);
//                             $("#alamat_saksi_satu").attr("readonly", true);

//                             $("#rt_saksi_satu").val(data.NO_RT);
//                             $("#rt_saksi_satu").attr("readonly", true);
//                             $("#rw_saksi_satu").val(data.NO_RW);
//                             $("#rw_saksi_satu").attr("readonly", true);

                            
//                             $("select").trigger('change');

//                             Swal.close();
//                             Swal.fire("Berhasil", "Data Ditemukan", "success");
                            
//                           }else{
//                             Swal.close();
//                             Swal.fire("Oops", "Data Tidak Ditemukan", "error");
//                             $('form').trigger("reset");
//                             $('select').trigger('change');
//                           }
//                         },
//                         error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
//                           alert(thrownError); // Munculkan alert error
//                         }
//                       });
//                     //  // END AJAX
//                 }
                
//             });
//       }
// }

// function cari_saksi_dua(){
//     if ($('#cek_nik_saksi_dua').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_saksi_dua").val();
//         Swal.fire({
//                 title: 'Mohon Tunggu Beberapa Saat',
//                 html: 'Proses Mencari Data Pada Dindukcapil',
//                 // timer: 2000,
//                 onBeforeOpen: () => {
//                     Swal.showLoading();
//                     // //START AJAX 
//                     $.ajax({
//                         type: "GET", // Method pengiriman data bisa dengan GET atau POST
//                         url: baseURL, // Isi dengan url/path file php yang dituju
//                         data: {"nik" : nik_}, // data yang akan dikirim ke file yang dituju
//                         dataType: "json",
                        
//                         success: function(response){ // Ketika proses pengiriman berhasil
                        
//                             // alert(response.response.co);
//                           if (response.respon_code == 1) {
//                             // alert("asu");
//                             let data  = response.content[0];
                        
//                             $("#nama_saksi_dua").val(data.NAMA_LGKP);
//                             $("#nama_saksi_dua").attr("readonly", true);
                            
//                             $("#tempat_lahir_saksi_dua").val(data.TMPT_LHR);
//                             $("#tempat_lahir_saksi_dua").attr("readonly", true);

//                             $(".tgl_kelahiran_saksi_dua").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_saksi_dua").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_saksi_dua").attr("disabled", true);
//                             $("#tgl_kelahiran3_saksi_dua").attr("disabled", false);

//                             let dob = new Date(data.TGL_LHR);
//                             let today = new Date();
//                             let age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
//                             $('#umur_saksi_dua').val(age);
//                             $('#umur_saksi_dua').attr("readonly", true);
//                             $("#pekerjaan_saksi_dua").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_saksi_dua").attr("readonly", true);
                            
//                             $("#alamat_saksi_dua").val(data.ALAMAT);
//                             $("#alamat_saksi_dua").attr("readonly", true);

//                             $("#rt_saksi_dua").val(data.NO_RT);
//                             $("#rt_saksi_dua").attr("readonly", true);
//                             $("#rw_saksi_dua").val(data.NO_RW);
//                             $("#rw_saksi_dua").attr("readonly", true);

                            
//                             $("select").trigger('change');

//                             Swal.close();
//                             Swal.fire("Berhasil", "Data Ditemukan", "success");
                            
//                           }else{
//                             Swal.close();
//                             Swal.fire("Oops", "Data Tidak Ditemukan", "error");
//                             $('form').trigger("reset");
//                             $('select').trigger('change');
//                           }
//                         },
//                         error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
//                           alert(thrownError); // Munculkan alert error
//                         }
//                       });
//                     //  // END AJAX
//                 }
                
//             });
//       }
// }




