function validate() {
        var pria = document.getElementById('cek_nik_pria');
        var ayah_pria = document.getElementById('cek_nik_ayah');
        var ibu_pria = document.getElementById('cek_nik_ibu');
        var istri_terdahulu = document.getElementById('cek_nik_istri_terdahulu');
        var wanita = document.getElementById('cek_nik_wanita');
        var ayah_wanita = document.getElementById('cek_nik_ayah_wanita');
        var ibu_wanita = document.getElementById('cek_nik_ibu_wanita');
        var suami_terdahulu = document.getElementById('cek_nik_suami_terdahulu');
        var wali_nikah = document.getElementById('cek_nik_wali_nikah');
        pria.value = pria.value.replace(/[^0-9]/, '');
        ayah_pria.value = ayah_pria.value.replace(/[^0-9]/, '');
        ayah_wanita.value = ayah_wanita.value.replace(/[^0-9]/, '');
        wanita.value = wanita.value.replace(/[^0-9]/, '');
        ayah_wanita.value = ayah_wanita.value.replace(/[^0-9]/, '');
        ibu_wanita.value = ibu_wanita.value.replace(/[^0-9]/, '');
        suami_terdahulu.value = suami_terdahulu.value.replace(/[^0-9]/, '');
        wali_nikah.value = wali_nikah.value.replace(/[^0-9]/, '');

        var rtpria = document.getElementById('rt_pria');
        var rwpria = document.getElementById('rw_pria');
        rtpria.value = rtpria.value.replace(/[^0-9]/, '');
        rwpria.value = rwpria.value.replace(/[^0-9]/, '');
        var rtayah = document.getElementById('rt_ayah');
        var rwayah = document.getElementById('rw_ayah');
        rtayah.value = rtayah.value.replace(/[^0-9]/, '');
        rwayah.value = rwayah.value.replace(/[^0-9]/, '');
        var rtibu_wanita = document.getElementById('rt_ibu_wanita');
        var rwibu_wanita = document.getElementById('rw_ibu_wanita');
        rtibu_wanita.value = rtibu_wanita.value.replace(/[^0-9]/, '');
        rwibu_wanita.value = rwibu_wanita.value.replace(/[^0-9]/, '');
        var rtistriterdahulu = document.getElementById('rt_istri_terdahulu');
        var rwistriterdahulu = document.getElementById('rw_istri_terdahulu');
        rtistriterdahulu.value = rtistriterdahulu.value.replace(/[^0-9]/, '');
        rwistriterdahulu.value = rwistriterdahulu.value.replace(/[^0-9]/, '');
        var rt_wanita = document.getElementById('rt_wanita');
        var rw_wanita = document.getElementById('rw_wanita');
        rt_wanita.value = rt_wanita.value.replace(/[^0-9]/, '');
        rw_wanita.value = rw_wanita.value.replace(/[^0-9]/, '');
        var rt_ayahwanita = document.getElementById('rt_ayah_wanita');
        var rw_ayahwanita = document.getElementById('rw_ayah_wanita');
        rt_ayahwanita.value = rt_ayahwanita.value.replace(/[^0-9]/, '');
        rw_ayahwanita.value = rw_ayahwanita.value.replace(/[^0-9]/, '');
        var rt_ibuwanita = document.getElementById('rt_ibu_wanita');
        var rw_ibuwanita = document.getElementById('rw_ibu_wanita');
        rt_ibuwanita.value = rt_ibuwanita.value.replace(/[^0-9]/, '');
        rw_ibuwanita.value = rw_ibuwanita.value.replace(/[^0-9]/, '');
        var rt_suamiterdahulu = document.getElementById('rt_suami_terdahulu');
        var rw_suamiterdahulu = document.getElementById('rw_suami_terdahulu');
        rt_suamiterdahulu.value = rt_suamiterdahulu.value.replace(/[^0-9]/, '');
        rw_suamiterdahulu.value = rw_suamiterdahulu.value.replace(/[^0-9]/, '');
        var rt_walinikah = document.getElementById('rt_wali_nikah');
        var rw_walinikah = document.getElementById('rw_wali_nikah');
        rt_walinikah.value = rt_walinikah.value.replace(/[^0-9]/, '');
        rw_walinikah.value = rw_walinikah.value.replace(/[^0-9]/, '');
      };

// function cari_pria(){
//             if ($('#cek_nik_pria').val().length != 16) {
//                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//             }
//             else{


//              // let timerInterval
//              let nik_ = $("#cek_nik_pria").val();
//                 Swal.fire({
//                         title: 'Mohon Tunggu Beberapa Saat',
//                         html: 'Proses Mencari Data Pada Dindukcapil',
//                         // timer: 2000,
//                         onBeforeOpen: () => {
//                             Swal.showLoading();
//                             // alert('aw')
//                             // //START AJAX 
//                             $.ajax({
//                                 type: "GET", // Method pengiriman data bisa dengan GET atau POST
//                                 url: baseURL, // Isi dengan url/path file php yang dituju
//                                 data: {"nik" : nik_}, // data yang akan dikirim ke file yang dituju
//                                 dataType: "json",
                                
//                                 success: function(response){ // Ketika proses pengiriman berhasil
                                
//                                     // alert(response.response.co);
//                                   if (response.respon_code == 1) {
//                                     // alert("asu");
//                                     let data  = response.content[0];
                                

//                                     $("#nama_pria").val(data.NAMA_LGKP);
//                                     $("#nama_pria").attr("readonly", true);
                                    
//                                     $("#tempat_lahir_pria").val(data.TMPT_LHR);
//                                     $("#tempat_lahir_pria").attr("readonly", true);

//                                     $(".tgl_kelahiran_pria").val(data.TGL_LHR);
//                                     $("#tgl_kelahiran3_pria").val(data.TGL_LHR);
//                                     $(".tgl_kelahiran_pria").attr("disabled", true);
//                                     $("#tgl_kelahiran3_pria").attr("disabled", false);
                            
//                                     $("#warga_negara_pria").val("WNI");
//                                     $("#warga_negara3_pria").val("WNI");
//                                     $("#warga_negara_pria").attr("disabled", true);
//                                     $("#warga_negara3_pria").attr("disabled", false);

//                                     $("#agama_pria").val(data.AGAMA);
//                                     $("#agama3_pria").val(data.AGAMA);
//                                     $("#agama_pria").attr("disabled", true);
//                                     $("#agama3_pria").attr("disabled", false);


//                                     $("#pekerjaan_pria").val(data.JENIS_PKRJN);
//                                     $("#pekerjaan_pria").attr("readonly", true);
                                    
//                                     $("#alamat_pria").val(data.ALAMAT);
//                                     $("#alamat_pria").attr("readonly", true);
//                                     $("#rt_pria").val(data.NO_RT);
//                                     $("#rt_pria").attr("readonly", true);
//                                     $("#rw_pria").val(data.NO_RW);
//                                     $("#rw_pria").attr("readonly", true);
                                    

//                                     $("select").trigger('change');
                                
                                    
                                    

//                                     Swal.close();
//                                     Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    
//                                   }else{
//                                     Swal.close();
//                                     Swal.fire("Oops", "Data Tidak Ditemukan", "error");
//                                     $('form').trigger("reset");
//                                     $('select').trigger('change');
//                                   }
//                                 },
//                                 error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
//                                   alert(thrownError); // Munculkan alert error
//                                 }
//                               });
//                             //  // END AJAX
//                         }
                        
//                     });
//               }
//           }

// function cari_ayah_pria(){
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
                        

//                             $("#nama_ayah").val(data.NAMA_LGKP);
//                             $("#nama_ayah").attr("readonly", true);
                            
//                             $("#tempat_lahir_ayah").val(data.TMPT_LHR);
//                             $("#tempat_lahir_ayah").attr("readonly", true);

//                             $(".tgl_kelahiran_ayah").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_ayah").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_ayah").attr("disabled", true);
//                             $("#tgl_kelahiran3_ayah").attr("disabled", false);
                    
//                             $("#warga_negara_ayah").val("WNI");
//                             $("#warga_negara3_ayah").val("WNI");
//                             $("#warga_negara_ayah").attr("disabled", true);
//                             $("#warga_negara3_ayah").attr("disabled", false);

//                             $("#agama_ayah").val(data.AGAMA);
//                             $("#agama3_ayah").val(data.AGAMA);
//                             $("#agama_ayah").attr("disabled", true);
//                             $("#agama3_ayah").attr("disabled", false);


//                             $("#pekerjaan_ayah").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_ayah").attr("readonly", true);
                            
//                             $("#alamat_ayah").val(data.ALAMAT);
//                             $("#alamat_ayah").attr("readonly", true);

//                             $("#rt_ayah").val(data.NO_RT);
//                             $("#rt_ayah").attr("readonly", true);
//                             $("#rw_ayah").val(data.NO_RW);
//                             $("#rw_ayah").attr("readonly", true);

//                             $("#bin_ayah").val(data.NAMA_LGKP_AYAH);
//                             $("#bin_ayah").attr("readonly", true);
                            

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

// function cari_ibu_pria(){
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
                        

//                             $("#nama_ibu").val(data.NAMA_LGKP);
//                             $("#nama_ibu").attr("readonly", true);
                            
//                             $("#tempat_lahir_ibu").val(data.TMPT_LHR);
//                             $("#tempat_lahir_ibu").attr("readonly", true);

//                             $(".tgl_kelahiran_ibu").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_ibu").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_ibu").attr("disabled", true);
//                             $("#tgl_kelahiran3_ibu").attr("disabled", false);
                    
//                             $("#warga_negara_ibu").val("WNI");
//                             $("#warga_negara3_ibu").val("WNI");
//                             $("#warga_negara_ibu").attr("disabled", true);
//                             $("#warga_negara3_ibu").attr("disabled", false);

//                             $("#agama_ibu").val(data.AGAMA);
//                             $("#agama3_ibu").val(data.AGAMA);
//                             $("#agama_ibu").attr("disabled", true);
//                             $("#agama3_ibu").attr("disabled", false);


//                             $("#pekerjaan_ibu").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_ibu").attr("readonly", true);
                            
//                             $("#alamat_ibu").val(data.ALAMAT);
//                             $("#alamat_ibu").attr("readonly", true);

//                             $("#rt_ibu_pria").val(data.NO_RT);
//                             $("#rt_ibu_pria").attr("readonly", true);
//                             $("#rw_ibu_pria").val(data.NO_RW);
//                             $("#rw_ibu_pria").attr("readonly", true);



//                             $("#bin_ibu").val(data.NAMA_LGKP_AYAH);
//                             $("#bin_ibu").attr("readonly", true);
                            

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
// }

// function cari_istri_terdahulu(){
//     if ($('#cek_nik_istri_terdahulu').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_istri_terdahulu").val();
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
                        

//                             $("#nama_istri_terdahulu").val(data.NAMA_LGKP);
//                             $("#nama_istri_terdahulu").attr("readonly", true);
                            
//                             $("#tempat_lahir_istri_terdahulu").val(data.TMPT_LHR);
//                             $("#tempat_lahir_istri_terdahulu").attr("readonly", true);

//                             $(".tgl_kelahiran_istri_terdahulu").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_istri_terdahulu").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_istri_terdahulu").attr("disabled", true);
//                             $("#tgl_kelahiran3_istri_terdahulu").attr("disabled", false);
                    
//                             $("#warga_negara_istri_terdahulu").val("WNI");
//                             $("#warga_negara3_istri_terdahulu").val("WNI");
//                             $("#warga_negara_istri_terdahulu").attr("disabled", true);
//                             $("#warga_negara3_istri_terdahulu").attr("disabled", false);

//                             $("#agama_istri_terdahulu").val(data.AGAMA);
//                             $("#agama3_istri_terdahulu").val(data.AGAMA);
//                             $("#agama_istri_terdahulu").attr("disabled", true);
//                             $("#agama3_istri_terdahulu").attr("disabled", false);


//                             $("#pekerjaan_istri_terdahulu").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_istri_terdahulu").attr("readonly", true);
                            
//                             $("#alamat_istri_terdahulu").val(data.ALAMAT);
//                             $("#alamat_istri_terdahulu").attr("readonly", true);

//                             $("#rt_istri_terdahulu").val(data.NO_RT);
//                             $("#rt_istri_terdahulu").attr("readonly", true);
//                             $("#rw_istri_terdahulu").val(data.NO_RW);
//                             $("#rw_istri_terdahulu").attr("readonly", true);

//                             $("#bin_istri_terdahulu").val(data.NAMA_LGKP_AYAH);
//                             $("#bin_istri_terdahulu").attr("readonly", true);
                            

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
// }

// function cari_wanita(){
//     if ($('#cek_nik_wanita').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_wanita").val();
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
                        

//                             $("#nama_wanita").val(data.NAMA_LGKP);
//                             $("#nama_wanita").attr("readonly", true);
                            
//                             $("#tempat_lahir_wanita").val(data.TMPT_LHR);
//                             $("#tempat_lahir_wanita").attr("readonly", true);

//                             $(".tgl_kelahiran_wanita").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_wanita").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_wanita").attr("disabled", true);
//                             $("#tgl_kelahiran3_wanita").attr("disabled", false);
                    
//                             $("#warga_negara_wanita").val("WNI");
//                             $("#warga_negara3_wanita").val("WNI");
//                             $("#warga_negara_wanita").attr("disabled", true);
//                             $("#warga_negara3_wanita").attr("disabled", false);

//                             $("#agama_wanita").val(data.AGAMA);
//                             $("#agama3_wanita").val(data.AGAMA);
//                             $("#agama_wanita").attr("disabled", true);
//                             $("#agama3_wanita").attr("disabled", false);


//                             $("#pekerjaan_wanita").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_wanita").attr("readonly", true);
                            
//                             $("#alamat_wanita").val(data.ALAMAT);
//                             $("#alamat_wanita").attr("readonly", true);

//                             $("#rt_wanita").val(data.NO_RT);
//                             $("#rt_wanita").attr("readonly", true);
//                             $("#rw_wanita").val(data.NO_RW);
//                             $("#rw_wanita").attr("readonly", true);

//                             $("#bin_wanita").val(data.NAMA_LGKP_AYAH);
//                             $("#bin_wanita").attr("readonly", true);
                            

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
// }

// function cari_ayah_wanita(){
//     if ($('#cek_nik_ayah_wanita').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_ayah_wanita").val();
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
                        

//                             $("#nama_ayah_wanita").val(data.NAMA_LGKP);
//                             $("#nama_ayah_wanita").attr("readonly", true);
                            
//                             $("#tempat_lahir_ayah_wanita").val(data.TMPT_LHR);
//                             $("#tempat_lahir_ayah_wanita").attr("readonly", true);

//                             $(".tgl_kelahiran_ayah_wanita").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_ayah_wanita").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_ayah_wanita").attr("disabled", true);
//                             $("#tgl_kelahiran3_ayah_wanita").attr("disabled", false);
                    
//                             $("#warga_negara_ayah_wanita").val("WNI");
//                             $("#warga_negara3_ayah_wanita").val("WNI");
//                             $("#warga_negara_ayah_wanita").attr("disabled", true);
//                             $("#warga_negara3_ayah_wanita").attr("disabled", false);

//                             $("#agama_ayah_wanita").val(data.AGAMA);
//                             $("#agama3_ayah_wanita").val(data.AGAMA);
//                             $("#agama_ayah_wanita").attr("disabled", true);
//                             $("#agama3_ayah_wanita").attr("disabled", false);


//                             $("#pekerjaan_ayah_wanita").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_ayah_wanita").attr("readonly", true);
                            
//                             $("#alamat_ayah_wanita").val(data.ALAMAT);
//                             $("#alamat_ayah_wanita").attr("readonly", true);
//                             $("#rt_ayah_wanita").val(data.NO_RT);
//                             $("#rt_ayah_wanita").attr("readonly", true);
//                             $("#rw_ayah_wanita").val(data.NO_RW);
//                             $("#rw_ayah_wanita").attr("readonly", true);

//                             $("#bin_ayah_wanita").val(data.NAMA_LGKP_AYAH);
//                             $("#bin_ayah_wanita").attr("readonly", true);
                            

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
// }

// function cari_ibu_wanita(){
//     if ($('#cek_nik_ibu_wanita').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_ibu_wanita").val();
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
                        

//                             $("#nama_ibu_wanita").val(data.NAMA_LGKP);
//                             $("#nama_ibu_wanita").attr("readonly", true);
                            
//                             $("#tempat_lahir_ibu_wanita").val(data.TMPT_LHR);
//                             $("#tempat_lahir_ibu_wanita").attr("readonly", true);

//                             $(".tgl_kelahiran_ibu_wanita").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_ibu_wanita").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_ibu_wanita").attr("disabled", true);
//                             $("#tgl_kelahiran3_ibu_wanita").attr("disabled", false);
                    
//                             $("#warga_negara_ibu_wanita").val("WNI");
//                             $("#warga_negara3_ibu_wanita").val("WNI");
//                             $("#warga_negara_ibu_wanita").attr("disabled", true);
//                             $("#warga_negara3_ibu_wanita").attr("disabled", false);

//                             $("#agama_ibu_wanita").val(data.AGAMA);
//                             $("#agama3_ibu_wanita").val(data.AGAMA);
//                             $("#agama_ibu_wanita").attr("disabled", true);
//                             $("#agama3_ibu_wanita").attr("disabled", false);


//                             $("#pekerjaan_ibu_wanita").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_ibu_wanita").attr("readonly", true);
                            
//                             $("#alamat_ibu_wanita").val(data.ALAMAT);
//                             $("#alamat_ibu_wanita").attr("readonly", true);

//                             $("#rt_ibu_wanita").val(data.NO_RT);
//                             $("#rt_ibu_wanita").attr("readonly", true);
//                             $("#rw_ibu_wanita").val(data.NO_RW);
//                             $("#rw_ibu_wanita").attr("readonly", true);

//                             $("#bin_ibu_wanita").val(data.NAMA_LGKP_AYAH);
//                             $("#bin_ibu_wanita").attr("readonly", true);
                            

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
// }

// function cari_suami_terdahulu(){
//     if ($('#cek_nik_suami_terdahulu').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_suami_terdahulu").val();
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
                        

//                             $("#nama_suami_terdahulu").val(data.NAMA_LGKP);
//                             $("#nama_suami_terdahulu").attr("readonly", true);
                            
//                             $("#tempat_lahir_suami_terdahulu").val(data.TMPT_LHR);
//                             $("#tempat_lahir_suami_terdahulu").attr("readonly", true);

//                             $(".tgl_kelahiran_suami_terdahulu").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_suami_terdahulu").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_suami_terdahulu").attr("disabled", true);
//                             $("#tgl_kelahiran3_suami_terdahulu").attr("disabled", false);
                    
//                             $("#warga_negara_suami_terdahulu").val("WNI");
//                             $("#warga_negara3_suami_terdahulu").val("WNI");
//                             $("#warga_negara_suami_terdahulu").attr("disabled", true);
//                             $("#warga_negara3_suami_terdahulu").attr("disabled", false);

//                             $("#agama_suami_terdahulu").val(data.AGAMA);
//                             $("#agama3_suami_terdahulu").val(data.AGAMA);
//                             $("#agama_suami_terdahulu").attr("disabled", true);
//                             $("#agama3_suami_terdahulu").attr("disabled", false);


//                             $("#pekerjaan_suami_terdahulu").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_suami_terdahulu").attr("readonly", true);
                            
//                             $("#alamat_suami_terdahulu").val(data.ALAMAT);
//                             $("#alamat_suami_terdahulu").attr("readonly", true);

//                             $("#rt_suami_terdahulu").val(data.NO_RT);
//                             $("#rt_suami_terdahulu").attr("readonly", true);
//                             $("#rw_suami_terdahulu").val(data.NO_RW);
//                             $("#rw_suami_terdahulu").attr("readonly", true);

//                             $("#bin_suami_terdahulu").val(data.NAMA_LGKP_AYAH);
//                             $("#bin_suami_terdahulu").attr("readonly", true);
                            

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
// }

// function cari_wali_nikah(){
//     if ($('#cek_nik_wali_nikah').val().length != 16) {
//        Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
//     }
//     else{
//      // let timerInterval
//      let nik_ = $("#cek_nik_wali_nikah").val();
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
                        

//                             $("#nama_wali_nikah").val(data.NAMA_LGKP);
//                             $("#nama_wali_nikah").attr("readonly", true);
                            
//                             $("#tempat_lahir_wali_nikah").val(data.TMPT_LHR);
//                             $("#tempat_lahir_wali_nikah").attr("readonly", true);

//                             $(".tgl_kelahiran_wali_nikah").val(data.TGL_LHR);
//                             $("#tgl_kelahiran3_wali_nikah").val(data.TGL_LHR);
//                             $(".tgl_kelahiran_wali_nikah").attr("disabled", true);
//                             $("#tgl_kelahiran3_wali_nikah").attr("disabled", false);
                    
//                             $("#warga_negara_wali_nikah").val("WNI");
//                             $("#warga_negara3_wali_nikah").val("WNI");
//                             $("#warga_negara_wali_nikah").attr("disabled", true);
//                             $("#warga_negara3_wali_nikah").attr("disabled", false);

//                             $("#agama_wali_nikah").val(data.AGAMA);
//                             $("#agama3_wali_nikah").val(data.AGAMA);
//                             $("#agama_wali_nikah").attr("disabled", true);
//                             $("#agama3_wali_nikah").attr("disabled", false);


//                             $("#pekerjaan_wali_nikah").val(data.JENIS_PKRJN);
//                             $("#pekerjaan_wali_nikah").attr("readonly", true);
                            
//                             $("#alamat_wali_nikah").val(data.ALAMAT);
//                             $("#alamat_wali_nikah").attr("readonly", true);

//                             $("#rt_wali_nikah").val(data.NO_RT);
//                             $("#rt_wali_nikah").attr("readonly", true);
//                             $("#rw_wali_nikah").val(data.NO_RW);
//                             $("#rw_wali_nikah").attr("readonly", true);

//                             $("#bin_wali_nikah").val(data.NAMA_LGKP_AYAH);
//                             $("#bin_wali_nikah").attr("readonly", true);
                            

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
// }