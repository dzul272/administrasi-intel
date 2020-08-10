<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pamong_model", "pamong");
        $this->load->model("PengaturanDesa_model", "desa");
        $this->load->model("Jabatan_model", "jabatan");
    }

    public function index()
    {
        redirect(base_url($this->router->fetch_class() . '/perangkat-desa'));
    }

    public function jabatan()
    {
        $jabatan = $this->jabatan->getJabatan();

        $data["jabatan"] = $jabatan;
        $this->loadViewAdmin($this->router->fetch_class() . '/jabatan',$data);
    }

    public function tambah_jabatan()
    {
        $dataInput  = (object) $this->input->post();
        $dataInput->id_desa = $this->userData->id_desa;
        $dataInput->nama_jabatan = ce($dataInput->nama_jabatan);
        $insert = $this->jabatan->insert_jabatan($dataInput);

        $jabatan = $this->jabatan->getJabatan();
        $output = '';
        $no = 1;
        foreach ($jabatan as $data) {
            $output .= '
            <tr>
                <td style="padding: 5px;" class="align-middle text-center">'. $no++ .'</td>
                <td style="padding: 5px;" class="align-middle">'. ce($data->nama_jabatan) .'</td>
                <td style="padding: 5px;" class="align-middle text-center">
                    <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="'. $data->id_jabatan .'">Ubah</button>
                    <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="'. $data->id_jabatan .'">Hapus</button>
                </td>
            </tr>
            ';
            
        }

        if ($insert) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Berhasil Ditambahkan',
                'output'            => $output
            ]);

            // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
            // redirect(base_url("pengaturan/jabatan"));
        }else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Ditambahkan',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
            // redirect(base_url("pengaturan/jabatan"));
        }

           
    }

    public function ubah_jabatan()
    {
        $dataInput  = (object) $this->input->post();
        $dataInput->nama_jabatan = $dataInput->nama_jabatan;
        $update = $this->jabatan->update_jabatan($dataInput, ["id_jabatan" => $dataInput->id_jabatan]);

        $jabatan = $this->jabatan->getJabatan();
        $output = '';
        $no = 1;
        foreach ($jabatan as $data) {
            $output .= '
            <tr>
                <td style="padding: 5px;" class="align-middle text-center">'. $no++ .'</td>
                <td style="padding: 5px;" class="align-middle">'. ce($data->nama_jabatan) .'</td>
                <td style="padding: 5px;" class="align-middle text-center">
                    <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="'. $data->id_jabatan .'">Ubah</button>
                    <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="'. $data->id_jabatan .'">Hapus</button>
                </td>
            </tr>
            ';
            
        }

        if ($update > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Berhasil Diubah',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
            // redirect(base_url("pengaturan/jabatan"));
        }else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Diubah',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
            // redirect(base_url("pengaturan/jabatan"));
        }
    }

    public function getdata_jabatan()
    {
        $dataInput  = (object) $this->input->post();
        $id = $dataInput->id_jabatan;
        $jabatan = $this->jabatan->getJabatan($id);

        $output = '';
        $no = 1;
        
            $output .= '
            <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Jabatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_jabatan" value="'. ce($jabatan->nama_jabatan) .'" id="namajabatan" required>
                    </div>
                    <input type="hidden" class="form-control" name="id_jabatan" value="'. $jabatan->id_jabatan .'" id="id_jabatan">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success" id="edit-btn">Simpan</button>
            </div>
            ';
            
        

        echo $output;

    }

    public function hapus_jabatan()
    {
        $dataInput  = (object) $this->input->post();
        $delete = $this->jabatan->delete_jabatan(["id_jabatan" => $dataInput->id_jabatan]);

        $jabatan = $this->jabatan->getJabatan();
        $output = '';
        $no = 1;
        foreach ($jabatan as $data) {
            $output .= '
            <tr>
                <td style="padding: 5px;" class="align-middle text-center">'. $no++ .'</td>
                <td style="padding: 5px;" class="align-middle">'. ce($data->nama_jabatan) .'</td>
                <td style="padding: 5px;" class="align-middle text-center">
                    <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="'. $data->id_jabatan .'">Ubah</button>
                    <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="'. $data->id_jabatan .'">Hapus</button>
                </td>
            </tr>
            ';
            
        }
        if ($delete > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Berhasil Dihapus',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Dihapus");
            // redirect(base_url("pengaturan/jabatan"));
        }else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
            // redirect(base_url("pengaturan/jabatan"));
        }
    }

    public function perangkat_desa()
    {
        $pamong = $this->pamong->getDataPamong();
        $jabatan = $this->jabatan->getJabatan();

        $data["pamong"] = $pamong;
        $data["jabatan"] = $jabatan;
        $this->loadViewAdmin($this->router->fetch_class() . '/perangkat_desa', $data);
    }

    public function getdata_pamong()
    {
        $dataInput  = (object) $this->input->post();
        $id = $dataInput->id_pamong;
        $data = $this->pamong->getDataPamong($id);

        $image = isset($data->foto_pamong) ?  asset("website/desa/" . $data->foto_pamong) :  asset('website/img/default-user-300x300.png');
        $nip = $data->nip_pamong;
        $nama = $data->nama_pamong;
        $jabatan = $data->nama_jabatan;
        $tgl_lahir = $data->tanggallahir_pamong;
        $tgl_pelantikan = $data->tanggalpelantikan_pamong;
        $pendidikan = $data->pendidikan_pamong;
        $akhir_jabatan = $data->akhirjabatan_pamong;
        $no_sk = $data->nosk_pamong == NULL ? "Tidak Ada Nomor SK" : $data->nosk_pamong;

        echo json_encode([
                'image'                 => $image,
                'nip'                   => $nip,
                'nama'                  => $nama,
                'jabatan'               => $jabatan,
                'tgl_lahir'             => $tgl_lahir,
                'no_sk'                 => $no_sk,
                'tgl_pelantikan'        => $tgl_pelantikan,
                'pendidikan'            => $pendidikan,
                'akhir_jabatan'         => $akhir_jabatan
            ]);

    }

    public function getdata_pamong_edit()
    {
        $jabatan = $this->jabatan->getJabatan();
        $dataInput  = (object) $this->input->post();
        $id = $dataInput->id_pamong;
        $data = $this->pamong->getDataPamong($id);

        $output_jabatan = '';
        foreach ($jabatan as $key){
            $output_jabatan .= '<option value="'. $key->id_jabatan .'"';
                if ($key->id_jabatan == $data->id_jabatan ) {
                    $output_jabatan .='selected ';
                }

            $output_jabatan .='>'. ce($key->nama_jabatan) .'</option>';
        }

        $output_pendidikan = '';

        foreach (pendidikan_terakhir() as $x){
            $output_pendidikan .= '<option value="'. $x .'"';
                if ($x == $data->pendidikan_pamong ) {
                    $output_pendidikan .='selected ';
                }
            $output_pendidikan .='>'. $x .'</option>';
        }

        $image = isset($data->foto_pamong) ?  asset("website/desa/" . $data->foto_pamong) :  asset('website/img/default.png');
        $nip = $data->nip_pamong;
        $nama = $data->nama_pamong;
        $tgl_lahir = tanggal_tampil($data->tanggallahir_pamong);
        $tgl_pelantikan = tanggal_tampil($data->tanggalpelantikan_pamong);
        $akhir_jabatan = tanggal_tampil($data->akhirjabatan_pamong);
        $no_sk = $data->nosk_pamong;
        $id_pamong = $data->id_pamong;

        echo json_encode([
                'id_pamong'             => $id_pamong,
                'image'                 => $image,
                'nip'                   => $nip,
                'nama'                  => $nama,
                'jabatan'               => $output_jabatan,
                'tgl_lahir'             => $tgl_lahir,
                'no_sk'                 => $no_sk,
                'tgl_pelantikan'        => $tgl_pelantikan,
                'pendidikan'            => $output_pendidikan,
                'akhir_jabatan'         => $akhir_jabatan
            ]);

    }


    public function update_pamong()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        $pamong = $this->pamong->getDataPamong($dataInput->id_pamong);

        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $namapamong = str_replace(' ', '_', strtolower($dataInput->nama_pamong));
        $dataInput->tanggallahir_pamong = insert_tanggal($dataInput->tanggallahir_pamong);
        $dataInput->tanggalpelantikan_pamong = insert_tanggal($dataInput->tanggalpelantikan_pamong);
        $dataInput->akhirjabatan_pamong = insert_tanggal($dataInput->akhirjabatan_pamong);

        $namafilebaru =  $namadesa . "_" . "pamong_" . $namapamong . "_" . time() . "." . pathinfo($_FILES["foto_pamong"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/website/desa/";


        $config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'gif|jpg|jpeg|png',
            "max_size"          => 2048,
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $namafilebaru
        ];


        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if ($_FILES["foto_pamong"]["name"] == '') {
            $update = $this->pamong->update_pamong($dataInput, ["id_pamong" => $dataInput->id_pamong]);

            $semua_pamong = $this->pamong->getDataPamong();
                $output ='';
                $no = 1;
                foreach ($semua_pamong as $data){
                    $output .='
                    <tr>
                        <td style="padding: 5px;" class="align-middle text-center">'. $no++ .'</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <a class="btn default btn-outline image-popup-vertical-fit el-link" href="';

                            if (isset($data->foto_pamong)) {
                                $output .=''.asset("website/desa/" . $data->foto_pamong).'';
                            }
                            else{
                                $output .=''.asset('website/img/default.png').'';
                            }

                            $output .='">
                                <img src="
                            ';

                            if (isset($data->foto_pamong)) {
                                $output .=''.asset("website/desa/" . $data->foto_pamong).'';
                            }
                            else{
                                $output .=''.asset('website/img/default.png').'';
                            }

                            $output .='" alt="user" class="rounded-circle" width="50" height="50"/>
                            </a>
                        </td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nip_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nama_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nama_jabatan .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nosk_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <button class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="'. $data->id_pamong .'">Detail</button>
                            <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="'. $data->id_pamong .'">Ubah</button>
                            <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="'. $data->id_pamong .'">Hapus</button>
                        </td>
                    </tr>
                    ';
                }

            if ($update > 0) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Diubah',
                    'output'            => $output
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                // redirect(base_url("pengaturan/perangkat_desa"));
            }else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Diubah',
                    'output'            => $output
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                // redirect(base_url("pengaturan/perangkat_desa"));
            }
        } else {
            if ($this->upload->do_upload("foto_pamong")) {

                if (is_file(FCPATH . 'assets/website/desa/' . $pamong->foto_pamong)) {
                    unlink(FCPATH . 'assets/website/desa/' . $pamong->foto_pamong);
                }

                $dataInput->foto_pamong = $namafilebaru;

                $update = $this->pamong->update_pamong($dataInput, ["id_pamong" => $dataInput->id_pamong]);

                $semua_pamong = $this->pamong->getDataPamong();
                $output ='';
                $no = 1;
                foreach ($semua_pamong as $data){
                    $output .='
                    <tr>
                        <td style="padding: 5px;" class="align-middle text-center">'. $no++ .'</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <a class="btn default btn-outline image-popup-vertical-fit el-link" href="';

                            if (isset($data->foto_pamong)) {
                                $output .=''.asset("website/desa/" . $data->foto_pamong).'';
                            }
                            else{
                                $output .=''.asset('website/img/default.png').'';
                            }

                            $output .='">
                                <img src="
                            ';

                            if (isset($data->foto_pamong)) {
                                $output .=''.asset("website/desa/" . $data->foto_pamong).'';
                            }
                            else{
                                $output .=''.asset('website/img/default.png').'';
                            }

                            $output .='" alt="user" class="rounded-circle" width="50" height="50"/>
                            </a>
                        </td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nip_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nama_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nama_jabatan .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nosk_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <button class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="'. $data->id_pamong .'">Detail</button>
                            <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="'. $data->id_pamong .'">Ubah</button>
                            <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="'. $data->id_pamong .'">Hapus</button>
                        </td>
                    </tr>
                    ';
                }

                if ($update > 0) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Diubah',
                        'output'            => $output
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                    // redirect(base_url("pengaturan/perangkat_desa"));
                }else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Diubah',
                        'output'            => $output
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                    // redirect(base_url("pengaturan/perangkat_desa"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error),
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("pengaturan/perangkat_desa"));
            }
        }
    }

    public function hapus_pamong()
    {
        $dataInput  = (object) $this->input->post();
        $pamong = $this->pamong->getDataPamong($dataInput->id_pamong);

        $hapus = $this->pamong->delete_pamong(["id_pamong" => $dataInput->id_pamong]);

        

        if(is_file(FCPATH . 'assets/website/desa/' . $pamong->foto_pamong)) {
            unlink(FCPATH . 'assets/website/desa/' . $pamong->foto_pamong);
        }

        $semua_pamong = $this->pamong->getDataPamong();
        $output ='';
        $no = 1;
        foreach ($semua_pamong as $data){
            $output .='
            <tr>
                <td style="padding: 5px;" class="align-middle text-center">'. $no++ .'</td>
                <td style="padding: 5px;" class="align-middle text-center">
                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="';

                    if (isset($data->foto_pamong)) {
                        $output .=''.asset("website/desa/" . $data->foto_pamong).'';
                    }
                    else{
                        $output .=''.asset('website/img/default.png').'';
                    }

                    $output .='">
                        <img src="
                    ';

                    if (isset($data->foto_pamong)) {
                        $output .=''.asset("website/desa/" . $data->foto_pamong).'';
                    }
                    else{
                        $output .=''.asset('website/img/default.png').'';
                    }

                    $output .='" alt="user" class="rounded-circle" width="50" height="50"/>
                    </a>
                </td>
                <td style="padding: 5px;" class="align-middle">'. $data->nip_pamong .'</td>
                <td style="padding: 5px;" class="align-middle">'. $data->nama_pamong .'</td>
                <td style="padding: 5px;" class="align-middle">'. $data->nama_jabatan .'</td>
                <td style="padding: 5px;" class="align-middle">'. $data->nosk_pamong .'</td>
                <td style="padding: 5px;" class="align-middle text-center">
                    <button class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="'. $data->id_pamong .'">Detail</button>
                    <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="'. $data->id_pamong .'">Ubah</button>
                    <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="'. $data->id_pamong .'">Hapus</button>
                </td>
            </tr>
            ';
        }

        if ($hapus > 0) {
            echo json_encode([
                'response_code'       => 200,
                'response_message'    => 'Data berhasil Dihapus',
                'output'              => $output
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Dihapus");
            // redirect(base_url("pengaturan/perangkat_desa"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Pamong Gagal Dihapus Karena Akan Menyebabkan Redudansi Data',
                'output'              => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
            // redirect(base_url("pengaturan/perangkat_desa"));
        }

    }

    public function tambah_pamong()
    {
        
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        // d($dataInput);

        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $namapamong = str_replace(' ', '_', strtolower($dataInput->nama_pamong));
        $dataInput->tanggallahir_pamong = insert_tanggal($dataInput->tanggallahir_pamong);
        $dataInput->tanggalpelantikan_pamong = insert_tanggal($dataInput->tanggalpelantikan_pamong);
        $dataInput->akhirjabatan_pamong = insert_tanggal($dataInput->akhirjabatan_pamong);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "pamong_" . $namapamong . "_" . time() . "." . pathinfo($_FILES["foto_pamong"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/website/desa/";


        $config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'gif|jpg|jpeg|png',
            "max_size"          => 2048,
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $namafilebaru
        ];


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($_FILES["foto_pamong"]["name"] == '') {
            $insert = $this->pamong->insert_pamong($dataInput);
                $pamong = $this->pamong->getDataPamong();
                $output ='';
                $no = 1;
                foreach ($pamong as $data){
                    $output .='
                    <tr>
                        <td style="padding: 5px;" class="align-middle text-center">'. $no++ .'</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <a class="btn default btn-outline image-popup-vertical-fit el-link" href="';

                            if (isset($data->foto_pamong)) {
                                $output .=''.asset("website/desa/" . $data->foto_pamong).'';
                            }
                            else{
                                $output .=''.asset('website/img/default.png').'';
                            }

                            $output .='">
                                <img src="
                            ';

                            if (isset($data->foto_pamong)) {
                                $output .=''.asset("website/desa/" . $data->foto_pamong).'';
                            }
                            else{
                                $output .=''.asset('website/img/default.png').'';
                            }

                            $output .='" alt="user" class="rounded-circle" width="50" height="50"/>
                            </a>
                        </td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nip_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nama_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nama_jabatan .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nosk_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <button class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="'. $data->id_pamong .'">Detail</button>
                            <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="'. $data->id_pamong .'">Ubah</button>
                            <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="'. $data->id_pamong .'">Hapus</button>
                        </td>
                    </tr>
                    ';
                }

            if ($insert) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Ditambahkan',
                    'output'            => $output
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                // redirect(base_url("pengaturan/perangkat_desa"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Ditambahkan',
                    'output'            => $output
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                // redirect(base_url("pengaturan/perangkat_desa"));
            }
        } else {
            if ($this->upload->do_upload("foto_pamong")) {

                $dataInput->foto_pamong = $namafilebaru;
                // d($dataInput);
                $insert = $this->pamong->insert_pamong($dataInput);
                $pamong = $this->pamong->getDataPamong();
                $output ='';
                $no = 1;
                foreach ($pamong as $data){
                    $output .='
                    <tr>
                        <td style="padding: 5px;" class="align-middle text-center">'. $no++ .'</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <a class="btn default btn-outline image-popup-vertical-fit el-link" href="';

                            if (isset($data->foto_pamong)) {
                                $output .=''.asset("website/desa/" . $data->foto_pamong).'';
                            }
                            else{
                                $output .=''.asset('website/img/default.png').'';
                            }

                            $output .='">
                                <img src="
                            ';

                            if (isset($data->foto_pamong)) {
                                $output .=''.asset("website/desa/" . $data->foto_pamong).'';
                            }
                            else{
                                $output .=''.asset('website/img/default.png').'';
                            }

                            $output .='" alt="user" class="rounded-circle" width="50" height="50"/>
                            </a>
                        </td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nip_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nama_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nama_jabatan .'</td>
                        <td style="padding: 5px;" class="align-middle">'. $data->nosk_pamong .'</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <button class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="'. $data->id_pamong .'">Detail</button>
                            <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="'. $data->id_pamong .'">Ubah</button>
                            <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="'. $data->id_pamong .'">Hapus</button>
                        </td>
                    </tr>
                    ';
                }

                if ($insert) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Ditambahkan',
                        'output'            => $output
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                    // redirect(base_url("pengaturan/perangkat_desa"));
                }else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Ditambahkan',
                        'output'            => $output
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                    // redirect(base_url("pengaturan/perangkat_desa"));
                }
            }else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("pengaturan/perangkat_desa"));
            }
        }

    }

    // FITUR PENGATURAN APLIKASI 
    public function aplikasi()
    {
        $desa = $this->desa->getInformasi_desa();

        $data["desa"] = $desa;
        $this->loadViewAdmin($this->router->fetch_class() . '/aplikasi', $data);
    }

    public function update_desa()
    {
        $dataInput  = (object) $this->input->post();
        $getdesa = $this->desa->getInformasi_desa();

        // $dataInput->provinsi_desa  = explode("|", $dataInput->provinsi_desa)[1];
        // $dataInput->kabupaten_desa  = explode("|", $dataInput->kabupaten_desa)[1];
        // $dataInput->kecamatan_desa  = trim(explode("|", $dataInput->kecamatan_desa)[1]);
        // $dataInput->nama_desa  = explode("|", $dataInput->nama_desa)[1];

        $namadesa = str_replace(' ', '_', strtolower($dataInput->nama_desa));

        $namafilebaru =  $namadesa . "_" . "logo_" . time() . "." . pathinfo($_FILES["logo_desa"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/website/desa/";

        $config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'pdf|gif|jpg|jpeg|png',
            "max_size"          => 2048,
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $namafilebaru
        ];


        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if ($_FILES["logo_desa"]["name"] == '') {
            // $update = $this->desa->update_desa($dataInput, ["id_desa" => $this->userData->id_desa]);
            $update   = $this->desa->update($dataInput, $this->userData->id_desa);
            $desabaru = $this->desa->getInformasi_desa();
            $image = isset($desabaru->logo_desa) ?  asset("website/desa/" . $desabaru->logo_desa) :  asset('website/img/default.png');

            if ($update > 0) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data desa berhasil Diubah',
                    'image'             => $image
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Diubah. Alamat Website sudah digunakan oleh desa lain'                    
                ]);
            }
        } else {
            if ($this->upload->do_upload("logo_desa")) {

                if (is_file(FCPATH . 'assets/website/desa/' . $getdesa->logo_desa)) {
                    unlink(FCPATH . 'assets/website/desa/' . $getdesa->logo_desa);
                }

                $dataInput->logo_desa = $namafilebaru;

                $update = $this->desa->update_desa($dataInput, ["id_desa" => $this->userData->id_desa]);
                $desabaru = $this->desa->getInformasi_desa();
                $image = isset($desabaru->logo_desa) ?  asset("website/desa/" . $desabaru->logo_desa) :  asset('website/img/logo-unav.jpg');

                if ($update > 0) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Diubah',
                        'image'             => $image
                    ]);
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Diubah'
                    ]);
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
            }
        }
    }
}
