<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk_kades extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Sk_kades_model", "sk_kades");
        $this->load->model("PengaturanDesa_model", "desa");
    }

    public function index()
    {
        redirect(base_url($this->router->fetch_class() . '/surat-keputusan-kades'));
    }

    public function surat_keputusan_kades()
    {    
        $sk_kades   = $this->sk_kades->get_sk_kades();

        $data["sk_kades"]   = $sk_kades;
        $this->loadViewAdmin("dokumen/surat_keputusan_kades", $data);
    }

    public function tambah_sk_kades()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();

        $nomor_sk = str_replace(' ', '_', strtolower($dataInput->no_kades));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_kades = insert_tanggal($dataInput->tgl_kades);
        $dataInput->tgl_diundangkan = insert_tanggal($dataInput->tgl_diundangkan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_kades_" . $nomor_sk . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/website/desa/";


        $config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'xls|xlsx|ppt|pptx|docx|doc|pdf|gif|jpg|jpeg|png',
            "max_size"          => 2048,
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $namafilebaru
        ];


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {
            $insert = $this->sk_kades->insert_sk_kades($dataInput);
            if ($insert) {
                // echo json_encode([
                //     'response_code'     => 200,
                //     'response_message'  => 'Data Berhasil Ditambahkan Ora Upload'
                // ]);
                $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                redirect(base_url("dokumen/surat_keputusan_kades"));
            } else {
                // echo json_encode([
                //     'response_code'     => 400,
                //     'response_message'  => 'Data Gagal Ditambahkan Ora upload'
                // ]);
                $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                redirect(base_url("dokumen/surat_keputusan_kades"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $insert = $this->sk_kades->insert_sk_kades($dataInput);
                if ($insert) {
                    // echo json_encode([
                    //     'response_code'     => 200,
                    //     'response_message'  => 'Data Berhasil Ditambahkan Ora Upload'
                    // ]);
                    $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan plus upload");
                    redirect(base_url("dokumen/surat_keputusan_kades"));
                }else {
                    // echo json_encode([
                    //     'response_code'     => 400,
                    //     'response_message'  => 'Data Gagal Ditambahkan Ora upload'
                    // ]);
                    $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan plus upload");
                    redirect(base_url("dokumen/surat_keputusan_kades"));
                }
            }else {
                $error = array('error' => $this->upload->display_errors("", ""));
                // echo json_encode([
                //     'response_code'     => 400,
                //     'response_message'  => implode("<br>", $error)
                // ]);
                $this->session->set_flashdata("gagal", implode("<br>", $error));
                redirect(base_url("dokumen/surat_keputusan_kades"));
            }
        }
    }

}
