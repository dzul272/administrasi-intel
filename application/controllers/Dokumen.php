<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Sk_kades_model", "sk_kades");
        $this->load->model("Sk_bpd_model", "sk_bpd");
        $this->load->model("Sk_perdes_model", "sk_perdes");
        $this->load->model("Sk_pengundangan_perdes_model", "sk_pengundangan_perdes");
        $this->load->model("Sk_pengundangan_perkades_model", "sk_pengundangan_perkades");
        $this->load->model("Sk_perkades_model", "sk_perkades");
        $this->load->model("PengaturanDesa_model", "desa");
        $this->load->model("Pamong_model", "pamong");
    }

    //* Digunain buat config upload file
    public function getConfig($lokasiArsip = NULL, $fileName = NULL)
    {
        $config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'txt|xls|xlsx|ppt|pptx|docx|doc|pdf|gif|jpg|jpeg|png',
            "max_size"          => 5120, // 5 MB
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $fileName
        ];
        return $config;
    }

    //* Fungsi ini digunain buat cari data tahun di table x
    //* buat di tampilin di select option halaman baut pilihan cari by tahun
    public function getDataTahun($table = NULL)
    {
        $dataTahun  = $this->m_data->select(["YEAR(created_at) as tahun"]);
        $dataTahun  = $this->m_data->distinct();
        $dataTahun  = $this->m_data->getData($table)->result();
        return $dataTahun;
    }

    //* Fungsi ini digunakan buat initialize excel dengan ambil template mana
    public function initExcel($template = NULL)
    {
        $inputFileType  = 'Xlsx';
        $inputFileName  = LOKASI_TEMPLATE_DOKUMEN . $template;
        $reader         = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $spreadsheet    = $reader->load($inputFileName);
        return $spreadsheet;
    }

    //* Fungsi ini digunain buat cek dan validasi di halaman ada $_GET['tahun']
    //* Fungsi ini digunain waktu nampilin ke view sama buat export 
    //* Ubah value $uri buat redirect halaman tertentu
    public function validasiHalaman($uri = NULL)
    {
        $tahun  = $this->input->get("tahun");
        if (isset($tahun) && $tahun != "semua") {
            if (!is_numeric($tahun)) {
                redirect(base_url($uri));
            }
        }
        return $tahun;
    }
    //! BATAS -------------------------------------------------------------------------------------

    public function index()
    {
        redirect(base_url($this->router->fetch_class() . '/surat-keputusan-kades'));
    }

    public function surat_keputusan_kades()
    {
        $tahun = $this->validasiHalaman("dokumen/surat-keputusan-kades");
        $sk_kades   = $this->sk_kades->get_sk_kades(null, $tahun);
        $data["dataTahun"]  = $this->getdataTahun("sk_kades");
        $data["sk_kades"]   = $sk_kades;
        $this->loadViewAdmin($this->router->fetch_class() . "/surat_keputusan_kades", $data);
    }

    public function tambah_sk_kades()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_kades));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_kades = insert_tanggal($dataInput->tgl_kades);
        $dataInput->tgl_diundangkan = insert_tanggal($dataInput->tgl_diundangkan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_kades_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {
            $insert = $this->sk_kades->insert_sk_kades($dataInput);
            if ($insert) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Ditambahkan'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_kades"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Ditambahkan'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_kades"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $insert = $this->sk_kades->insert_sk_kades($dataInput);
                if ($insert) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_kades"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_kades"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_kades"));
            }
        }
    }

    public function ubah_sk_kades()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        $sk_kades = $this->sk_kades->get_sk_kades($dataInput->id_sk_kades);

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_kades));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_kades = insert_tanggal($dataInput->tgl_kades);
        $dataInput->tgl_diundangkan = insert_tanggal($dataInput->tgl_diundangkan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_kades_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {

            $update = $this->sk_kades->update_sk_kades($dataInput, ["id_sk_kades" => $dataInput->id_sk_kades]);
            if ($update) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Diubah'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                // redirect(base_url("dokumen/surat_keputusan_kades"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Diubah'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                // redirect(base_url("dokumen/surat_keputusan_kades"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                if (is_file(FCPATH . ASSET_DESA . $sk_kades->file_lampiran)) {
                    unlink(FCPATH . ASSET_DESA . $sk_kades->file_lampiran);
                }

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $update = $this->sk_kades->update_sk_kades($dataInput, ["id_sk_kades" => $dataInput->id_sk_kades]);
                if ($update) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Diubah'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_kades"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Diubah Ora upload'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_kades"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_kades"));
            }
        }
    }

    public function hapus_sk_kades()
    {
        $dataInput  = (object) $this->input->post();
        $sk_kades = $this->sk_kades->get_sk_kades($dataInput->id_sk_kades);

        $hapus = $this->sk_kades->delete_sk_kades(["id_sk_kades" => $dataInput->id_sk_kades]);

        if (is_file(FCPATH . ASSET_DESA . $sk_kades->file_lampiran)) {
            unlink(FCPATH . ASSET_DESA . $sk_kades->file_lampiran);
        }

        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'    => 'Data berhasil Dihapus'
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_kades"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus'
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_kades"));
        }
    }

    public function downloadFile($fileName = NULL)
    {
        // $fileName  = (object) $this->input->post("fileName");
        $filebaru = explode('.', $fileName);
        $namafilebaru = array($filebaru[0]);
        $namabaru = implode("", $namafilebaru);
        $ekstensi = pathinfo($fileName, PATHINFO_EXTENSION);
        if ($fileName) {
            // echo json_encode([
            //        'response_code'     => 200,
            //        'response_message'  => 'Data Berhasil Ditemukan'
            //    ]);
            $file = realpath("assets/website/desa") . "\\" . $fileName;
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                // $name = 'file_lampiran.pdf';
                if ($ekstensi == 'pdf') {
                    $name = $namabaru . '.pdf';
                } else {
                    $name = $fileName;
                }
                //force download
                force_download($name, $data);
            } else {
                // Redirect to base url
                $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
                redirect(base_url("dokumen/surat_keputusan_kades"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
            redirect(base_url("dokumen/surat_keputusan_kades"));
            // echo json_encode([
            //     'response_code'     => 400,
            //     'response_message'  => "Data File Lampiran Tidak Ditemukan"
            // ]);
        }
    }

    public function export_sk_kades()
    {
        $tahun = $this->validasiHalaman("dokumen/surat-keputusan-kades");
        $sk_kades       = $this->sk_kades->get_sk_kades(null, $tahun);
        $spreadsheet    = $this->initExcel("sk_kades.xlsx");
        $worksheet      = $spreadsheet->getActiveSheet();
        $worksheet->getCell('B4')->setValue(': ' . $_GET['tahun']);

        $baris  = 7;
        $no     = 1;
        foreach ($sk_kades as $data) {
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($data->no_kades);
            $worksheet->getCell('C' . $baris)->setValue(shortdate_indo($data->tgl_kades));
            $worksheet->getCell('D' . $baris)->setValue($data->tentang);
            $worksheet->getCell('E' . $baris)->setValue($data->uraian);
            $worksheet->getCell('F' . $baris)->setValue($data->no_diundangkan);
            $worksheet->getCell('G' . $baris)->setValue(shortdate_indo($data->tgl_diundangkan));
            $worksheet->getCell('H' . $baris)->setValue($data->keterangan);
            $baris++;
        }

        $fileName   = "AGENDA_SURAT_KEPUTUSAN_KEPALA_DESA_" . strtoupper($this->userData->nama_desa) . "_" . date("Y.m.d.H.i.s");
        exportExcel($spreadsheet, $fileName);
    }

    //! BATAS -------------------------------------------------------------------------------------

    public function surat_keputusan_bpd()
    {
        $tahun = $this->validasiHalaman("dokumen/surat-keputusan-bpd");
        $sk_bpd   = $this->sk_bpd->get_sk_bpd(null, $tahun);
        $data["dataTahun"]  = $this->getdataTahun("sk_bpd");
        $data["sk_bpd"]   = $sk_bpd;
        $this->loadViewAdmin($this->router->fetch_class() . "/surat_keputusan_bpd", $data);
    }

    public function tambah_sk_bpd()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_kades));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tanggal = insert_tanggal($dataInput->tanggal);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_bpd_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {
            $insert = $this->sk_bpd->insert_sk_bpd($dataInput);
            if ($insert) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Ditambahkan'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_bpd"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Ditambahkan'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_bpd"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $insert = $this->sk_bpd->insert_sk_bpd($dataInput);
                if ($insert) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_bpd"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_bpd"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_bpd"));
            }
        }
    }

    public function ubah_sk_bpd()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        $sk_bpd = $this->sk_bpd->get_sk_bpd($dataInput->id_sk_bpd);

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_bpd));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tanggal = insert_tanggal($dataInput->tanggal);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_bpd_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {

            $update = $this->sk_bpd->update_sk_bpd($dataInput, ["id_sk_bpd" => $dataInput->id_sk_bpd]);
            if ($update) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Diubah'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                // redirect(base_url("dokumen/surat_keputusan_bpd"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Diubah'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                // redirect(base_url("dokumen/surat_keputusan_bpd"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                if (is_file(FCPATH . ASSET_DESA . $sk_bpd->file_lampiran)) {
                    unlink(FCPATH . ASSET_DESA . $sk_bpd->file_lampiran);
                }

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $update = $this->sk_bpd->update_sk_bpd($dataInput, ["id_sk_bpd" => $dataInput->id_sk_bpd]);
                if ($update) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Diubah'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_bpd"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Diubah Ora upload'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_bpd"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_bpd"));
            }
        }
    }

    public function hapus_sk_bpd()
    {
        $dataInput  = (object) $this->input->post();
        $sk_bpd = $this->sk_bpd->get_sk_bpd($dataInput->id_sk_bpd);
        // d($sk_bpd->file_lampiran);

        $hapus = $this->sk_bpd->delete_sk_bpd(["id_sk_bpd" => $dataInput->id_sk_bpd]);

        if (is_file(FCPATH . ASSET_DESA . $sk_bpd->file_lampiran)) {
            unlink(FCPATH . ASSET_DESA . $sk_bpd->file_lampiran);
        }

        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'    => 'Data berhasil Dihapus'
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_bpd"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus'
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_bpd"));
        }
    }

    public function downloadSkbpd($fileName = NULL)
    {
        // $fileName  = (object) $this->input->post("fileName");
        $filebaru = explode('.', $fileName);
        $namafilebaru = array($filebaru[0]);
        $namabaru = implode("", $namafilebaru);
        $ekstensi = pathinfo($fileName, PATHINFO_EXTENSION);
        if ($fileName) {
            // echo json_encode([
            //        'response_code'     => 200,
            //        'response_message'  => 'Data Berhasil Ditemukan'
            //    ]);
            $file = realpath("assets/website/desa") . "\\" . $fileName;
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                // $name = 'file_lampiran.pdf';
                if ($ekstensi == 'pdf') {
                    $name = $namabaru . '.pdf';
                } else {
                    $name = $fileName;
                }
                //force download
                force_download($name, $data);
            } else {
                // Redirect to base url
                $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
                redirect(base_url("dokumen/surat_keputusan_bpd"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
            redirect(base_url("dokumen/surat_keputusan_bpd"));
            // echo json_encode([
            //     'response_code'     => 400,
            //     'response_message'  => "Data File Lampiran Tidak Ditemukan"
            // ]);
        }
    }

    public function export_sk_bpd()
    {
        $tahun = $this->validasiHalaman("dokumen/surat-keputusan-bpd");
        $sk_bpd         = $this->sk_bpd->get_sk_bpd(null, $tahun);
        $spreadsheet    = $this->initExcel("sk_bpd.xlsx");
        $worksheet      = $spreadsheet->getActiveSheet();
        $worksheet->getCell('B4')->setValue(': ' . $_GET['tahun']);
        $baris  = 7;
        $no     = 1;
        foreach ($sk_bpd as $data) {
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($data->nomor);
            $worksheet->getCell('C' . $baris)->setValue(shortdate_indo($data->tanggal));
            $worksheet->getCell('D' . $baris)->setValue($data->tentang);
            $worksheet->getCell('E' . $baris)->setValue($data->uraian);
            $worksheet->getCell('F' . $baris)->setValue($data->keterangan);
            $baris++;
        }

        $fileName   = "AGENDA_SURAT_KEPUTUSAN_BPD_" . strtoupper($this->userData->nama_desa) . "_" . date("Y.m.d.H.i.s");
        exportExcel($spreadsheet, $fileName, FALSE);
    }

    //! BATAS -------------------------------------------------------------------------------------

    public function peraturan_desa()
    {
        $tahun              = $this->validasiHalaman("dokumen/surat-keputusan-bpd");
        $sk_perdes          = $this->sk_perdes->get_sk_perdes(null, $tahun);
        $data["dataTahun"]  = $this->getdataTahun("sk_perdes");
        $data["sk_perdes"]  = $sk_perdes;
        $this->loadViewAdmin($this->router->fetch_class() . "/peraturan_desa", $data);
    }

    public function tambah_sk_perdes()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_kades));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_perdes = insert_tanggal($dataInput->tgl_perdes);
        $dataInput->tgl_persetujuan = insert_tanggal($dataInput->tgl_persetujuan);
        $dataInput->tgl_dilaporkan = insert_tanggal($dataInput->tgl_dilaporkan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_perdes_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {
            $insert = $this->sk_perdes->insert_sk_perdes($dataInput);
            if ($insert) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Ditambahkan'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_perdes"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Ditambahkan'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_perdes"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $insert = $this->sk_perdes->insert_sk_perdes($dataInput);
                if ($insert) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_perdes"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_perdes"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_perdes"));
            }
        }
    }

    public function ubah_sk_perdes()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        $sk_perdes = $this->sk_perdes->get_sk_perdes($dataInput->id_sk_perdes);

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_perdes));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_perdes = insert_tanggal($dataInput->tgl_perdes);
        $dataInput->tgl_persetujuan = insert_tanggal($dataInput->tgl_persetujuan);
        $dataInput->tgl_dilaporkan = insert_tanggal($dataInput->tgl_dilaporkan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_perdes_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {

            $update = $this->sk_perdes->update_sk_perdes($dataInput, ["id_sk_perdes" => $dataInput->id_sk_perdes]);
            if ($update) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Diubah'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                // redirect(base_url("dokumen/surat_keputusan_perdes"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Diubah'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                // redirect(base_url("dokumen/surat_keputusan_perdes"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                if (is_file(FCPATH . ASSET_DESA . $sk_perdes->file_lampiran)) {
                    unlink(FCPATH . ASSET_DESA . $sk_perdes->file_lampiran);
                }

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $update = $this->sk_perdes->update_sk_perdes($dataInput, ["id_sk_perdes" => $dataInput->id_sk_perdes]);
                if ($update) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Diubah'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_perdes"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Diubah Ora upload'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_perdes"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_perdes"));
            }
        }
    }

    public function hapus_sk_perdes()
    {
        $dataInput  = (object) $this->input->post();
        $sk_perdes = $this->sk_perdes->get_sk_perdes($dataInput->id_sk_perdes);
        // d($sk_perdes->file_lampiran);

        $hapus = $this->sk_perdes->delete_sk_perdes(["id_sk_perdes" => $dataInput->id_sk_perdes]);

        if (is_file(FCPATH . ASSET_DESA . $sk_perdes->file_lampiran)) {
            unlink(FCPATH . ASSET_DESA . $sk_perdes->file_lampiran);
        }

        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'    => 'Data berhasil Dihapus'
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_perdes"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus'
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_perdes"));
        }
    }

    public function downloadSkperdes($fileName = NULL)
    {
        // $fileName  = (object) $this->input->post("fileName");
        $filebaru = explode('.', $fileName);
        $namafilebaru = array($filebaru[0]);
        $namabaru = implode("", $namafilebaru);
        $ekstensi = pathinfo($fileName, PATHINFO_EXTENSION);
        if ($fileName) {
            // echo json_encode([
            //        'response_code'     => 200,
            //        'response_message'  => 'Data Berhasil Ditemukan'
            //    ]);
            $file = realpath("assets/website/desa") . "\\" . $fileName;
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                // $name = 'file_lampiran.pdf';
                if ($ekstensi == 'pdf') {
                    $name = $namabaru . '.pdf';
                } else {
                    $name = $fileName;
                }
                //force download
                force_download($name, $data);
            } else {
                // Redirect to base url
                $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
                redirect(base_url("dokumen/peraturan-desa"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
            redirect(base_url("dokumen/peraturan-desa"));
            // echo json_encode([
            //     'response_code'     => 400,
            //     'response_message'  => "Data File Lampiran Tidak Ditemukan"
            // ]);
        }
    }

    public function export_peraturan_desa()
    {
        $tahun = $this->validasiHalaman("dokumen/surat-keputusan-bpd");
        $sk_perdes      = $this->sk_perdes->get_sk_perdes(null, $tahun);
        $spreadsheet    = $this->initExcel("sk_perdes.xlsx");
        $worksheet      = $spreadsheet->getActiveSheet();
        $worksheet->getCell('B4')->setValue(': ' . $_GET['tahun']);
        $baris  = 7;
        $no     = 1;
        foreach ($sk_perdes as $data) {
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($data->no_perdes);
            $worksheet->getCell('C' . $baris)->setValue(shortdate_indo($data->tgl_perdes));
            $worksheet->getCell('D' . $baris)->setValue($data->tentang);
            $worksheet->getCell('E' . $baris)->setValue($data->uraian);
            $worksheet->getCell('F' . $baris)->setValue($data->no_persetujuan);
            $worksheet->getCell('G' . $baris)->setValue(shortdate_indo($data->tgl_persetujuan));
            $worksheet->getCell('H' . $baris)->setValue($data->no_dilaporkan);
            $worksheet->getCell('I' . $baris)->setValue(shortdate_indo($data->tgl_dilaporkan));
            $worksheet->getCell('J' . $baris)->setValue($data->keterangan);
            $baris++;
        }

        $fileName   = "AGENDA_PERATURAN_DESA_" . strtoupper($this->userData->nama_desa) . "_" . date("Y.m.d.H.i.s");
        exportExcel($spreadsheet, $fileName);
    }

    //! BATAS -------------------------------------------------------------------------------------

    public function peraturan_kepala_desa()
    {
        $tahun                  = $this->validasiHalaman("dokumen/peraturan-kepala-desa");
        $sk_perkades            = $this->sk_perkades->get_sk_perkades(null, $tahun);
        $data["dataTahun"]      = $this->getdataTahun("sk_perkades");
        $data["sk_perkades"]    = $sk_perkades;
        $this->loadViewAdmin($this->router->fetch_class() . "/peraturan_kepala_desa", $data);
    }

    public function tambah_sk_perkades()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_kades));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_perkades = insert_tanggal($dataInput->tgl_perkades);
        $dataInput->tgl_dilaporkan = insert_tanggal($dataInput->tgl_dilaporkan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_perkades_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {
            $insert = $this->sk_perkades->insert_sk_perkades($dataInput);
            if ($insert) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Ditambahkan'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_perkades"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Ditambahkan'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_perkades"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $insert = $this->sk_perkades->insert_sk_perkades($dataInput);
                if ($insert) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_perkades"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_perkades"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_perdes"));
            }
        }
    }

    public function ubah_sk_perkades()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        $sk_perkades = $this->sk_perkades->get_sk_perkades($dataInput->id_sk_perkades);

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_perkades));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_perkades = insert_tanggal($dataInput->tgl_perkades);
        $dataInput->tgl_dilaporkan = insert_tanggal($dataInput->tgl_dilaporkan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_perkades_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {

            $update = $this->sk_perkades->update_sk_perkades($dataInput, ["id_sk_perkades" => $dataInput->id_sk_perkades]);
            if ($update) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Diubah'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                // redirect(base_url("dokumen/surat_keputusan_perkades"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Diubah'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                // redirect(base_url("dokumen/surat_keputusan_perkades"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                if (is_file(FCPATH . ASSET_DESA . $sk_perkades->file_lampiran)) {
                    unlink(FCPATH . ASSET_DESA . $sk_perkades->file_lampiran);
                }

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $update = $this->sk_perkades->update_sk_perkades($dataInput, ["id_sk_perkades" => $dataInput->id_sk_perkades]);
                if ($update) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Diubah'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_perkades"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Diubah Ora upload'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_perkades"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_perkades"));
            }
        }
    }

    public function hapus_sk_perkades()
    {
        $dataInput  = (object) $this->input->post();
        $sk_perkades = $this->sk_perkades->get_sk_perkades($dataInput->id_sk_perkades);
        // d($sk_perkades->file_lampiran);

        $hapus = $this->sk_perkades->delete_sk_perkades(["id_sk_perkades" => $dataInput->id_sk_perkades]);

        if (is_file(FCPATH . ASSET_DESA . $sk_perkades->file_lampiran)) {
            unlink(FCPATH . ASSET_DESA . $sk_perkades->file_lampiran);
        }

        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'    => 'Data berhasil Dihapus'
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_perkades"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus'
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_perkades"));
        }
    }

    public function downloadSkperkades($fileName = NULL)
    {
        // $fileName  = (object) $this->input->post("fileName");
        $filebaru = explode('.', $fileName);
        $namafilebaru = array($filebaru[0]);
        $namabaru = implode("", $namafilebaru);
        $ekstensi = pathinfo($fileName, PATHINFO_EXTENSION);
        if ($fileName) {
            // echo json_encode([
            //        'response_code'     => 200,
            //        'response_message'  => 'Data Berhasil Ditemukan'
            //    ]);
            $file = realpath("assets/website/desa") . "\\" . $fileName;
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                // $name = 'file_lampiran.pdf';
                if ($ekstensi == 'pdf') {
                    $name = $namabaru . '.pdf';
                } else {
                    $name = $fileName;
                }
                //force download
                force_download($name, $data);
            } else {
                // Redirect to base url
                $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
                redirect(base_url("dokumen/peraturan-desa"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
            redirect(base_url("dokumen/peraturan-desa"));
            // echo json_encode([
            //     'response_code'     => 400,
            //     'response_message'  => "Data File Lampiran Tidak Ditemukan"
            // ]);
        }
    }

    public function export_peraturan_kepala_desa()
    {
        $tahun          = $this->validasiHalaman("dokumen/peraturan-kepala-desa");
        $sk_perkades    = $this->sk_perkades->get_sk_perkades(null, $tahun);
        $spreadsheet    = $this->initExcel("sk_perkades.xlsx");
        $worksheet      = $spreadsheet->getActiveSheet();
        $worksheet->getCell('B4')->setValue(': ' . $_GET['tahun']);
        $baris  = 7;
        $no     = 1;
        foreach ($sk_perkades as $data) {
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($data->no_perkades);
            $worksheet->getCell('C' . $baris)->setValue(shortdate_indo($data->tgl_perkades));
            $worksheet->getCell('D' . $baris)->setValue($data->tentang);
            $worksheet->getCell('E' . $baris)->setValue($data->uraian);
            $worksheet->getCell('F' . $baris)->setValue($data->no_dilaporkan);
            $worksheet->getCell('G' . $baris)->setValue(shortdate_indo($data->tgl_dilaporkan));            
            $worksheet->getCell('H' . $baris)->setValue($data->keterangan);
            $baris++;
        }

        $fileName   = "AGENDA_PENGUNDANGAN_PERATURAN_KEPALA_DESA_" . strtoupper($this->userData->nama_desa) . "_" . date("Y.m.d.H.i.s");
        exportExcel($spreadsheet, $fileName);
    }

    //! BATAS -------------------------------------------------------------------------------------

    public function pengundangan_perdes()
    {
        $tahun = $this->validasiHalaman("dokumen/pengundangan_perdes");
        $sk_pengundangan_perdes   = $this->sk_pengundangan_perdes->get_sk_pengundangan_perdes(null, $tahun);
        $data["dataTahun"]  = $this->getdataTahun("sk_pengundangan_perdes");
        $data["sk_pengundangan_perdes"]   = $sk_pengundangan_perdes;
        $this->loadViewAdmin($this->router->fetch_class() . "/pengundangan_perdes", $data);
    }

    public function tambah_sk_pengundangan_perdes()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_kades));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_perdes = insert_tanggal($dataInput->tgl_perdes);
        $dataInput->tgl_pengundangan = insert_tanggal($dataInput->tgl_pengundangan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_pengundangan_perdes_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {
            $insert = $this->sk_pengundangan_perdes->insert_sk_pengundangan_perdes($dataInput);
            if ($insert) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Ditambahkan'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Ditambahkan'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $insert = $this->sk_pengundangan_perdes->insert_sk_pengundangan_perdes($dataInput);
                if ($insert) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
            }
        }
    }

    public function ubah_sk_pengundangan_perdes()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        $sk_pengundangan_perdes = $this->sk_pengundangan_perdes->get_sk_pengundangan_perdes($dataInput->id_sk_pengundangan_perdes);

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_pengundangan_perdes));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_perdes = insert_tanggal($dataInput->tgl_perdes);
        $dataInput->tgl_pengundangan = insert_tanggal($dataInput->tgl_pengundangan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_pengundangan_perdes_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {

            $update = $this->sk_pengundangan_perdes->update_sk_pengundangan_perdes($dataInput, ["id_sk_pengundangan_perdes" => $dataInput->id_sk_pengundangan_perdes]);
            if ($update) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Diubah'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Diubah'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                if (is_file(FCPATH . ASSET_DESA . $sk_pengundangan_perdes->file_lampiran)) {
                    unlink(FCPATH . ASSET_DESA . $sk_pengundangan_perdes->file_lampiran);
                }

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $update = $this->sk_pengundangan_perdes->update_sk_pengundangan_perdes($dataInput, ["id_sk_pengundangan_perdes" => $dataInput->id_sk_pengundangan_perdes]);
                if ($update) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Diubah'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Diubah Ora upload'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
            }
        }
    }

    public function hapus_sk_pengundangan_perdes()
    {
        $dataInput  = (object) $this->input->post();
        $sk_pengundangan_perdes = $this->sk_pengundangan_perdes->get_sk_pengundangan_perdes($dataInput->id_sk_pengundangan_perdes);
        // d($sk_pengundangan_perdes->file_lampiran);

        $hapus = $this->sk_pengundangan_perdes->delete_sk_pengundangan_perdes(["id_sk_pengundangan_perdes" => $dataInput->id_sk_pengundangan_perdes]);

        if (is_file(FCPATH . ASSET_DESA . $sk_pengundangan_perdes->file_lampiran)) {
            unlink(FCPATH . ASSET_DESA . $sk_pengundangan_perdes->file_lampiran);
        }

        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'    => 'Data berhasil Dihapus'
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus'
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_pengundangan_perdes"));
        }
    }

    public function downloadSkpengundangan_perdes($fileName = NULL)
    {
        // $fileName  = (object) $this->input->post("fileName");
        $filebaru = explode('.', $fileName);
        $namafilebaru = array($filebaru[0]);
        $namabaru = implode("", $namafilebaru);
        $ekstensi = pathinfo($fileName, PATHINFO_EXTENSION);
        if ($fileName) {
            // echo json_encode([
            //        'response_code'     => 200,
            //        'response_message'  => 'Data Berhasil Ditemukan'
            //    ]);
            $file = realpath("assets/website/desa") . "\\" . $fileName;
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                // $name = 'file_lampiran.pdf';
                if ($ekstensi == 'pdf') {
                    $name = $namabaru . '.pdf';
                } else {
                    $name = $fileName;
                }
                //force download
                force_download($name, $data);
            } else {
                // Redirect to base url
                $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
                redirect(base_url("dokumen/peraturan-desa"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
            redirect(base_url("dokumen/peraturan-desa"));
            // echo json_encode([
            //     'response_code'     => 400,
            //     'response_message'  => "Data File Lampiran Tidak Ditemukan"
            // ]);
        }
    }

    public function export_sk_pengundangan_perdes()
    {
        $tahun                     = $this->validasiHalaman("dokumen/pengundangan_perdes");
        $sk_pengundangan_perdes    = $this->sk_pengundangan_perdes->get_sk_pengundangan_perdes(null, $tahun);
        $spreadsheet               = $this->initExcel("sk_pengundangan_perdes.xlsx");
        $worksheet                 = $spreadsheet->getActiveSheet();
        $worksheet->getCell('B4')->setValue(': ' . $_GET['tahun']);
        $baris  = 7;
        $no     = 1;
        foreach ($sk_pengundangan_perdes as $data) {
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($data->no_perdes);
            $worksheet->getCell('C' . $baris)->setValue(shortdate_indo($data->tgl_perdes));
            $worksheet->getCell('D' . $baris)->setValue($data->tentang);
            $worksheet->getCell('E' . $baris)->setValue($data->uraian);
            $worksheet->getCell('F' . $baris)->setValue($data->no_pengundangan);
            $worksheet->getCell('G' . $baris)->setValue(shortdate_indo($data->tgl_pengundangan));
            $worksheet->getCell('H' . $baris)->setValue($data->keterangan);
            $baris++;
        }

        $fileName   = "AGENDA_SURAT_PENGUNDANGAN_PERATURAN_DESA_" . strtoupper($this->userData->nama_desa) . "_" . date("Y.m.d.H.i.s");
        exportExcel($spreadsheet, $fileName);
    }

    //! BATAS -------------------------------------------------------------------------------------  

    public function pengundangan_perkades()
    {
        $tahun = $this->validasiHalaman("dokumen/pengundangan_perkades");
        $sk_pengundangan_perkades   = $this->sk_pengundangan_perkades->get_sk_pengundangan_perkades(null, $tahun);
        $data["dataTahun"]  = $this->getdataTahun("sk_pengundangan_perkades");
        $data["sk_pengundangan_perkades"]   = $sk_pengundangan_perkades;
        $this->loadViewAdmin($this->router->fetch_class() . "/pengundangan_perkades", $data);
    }

    public function tambah_sk_pengundangan_perkades()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_kades));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_perkades = insert_tanggal($dataInput->tgl_perkades);
        $dataInput->tgl_pengundangan = insert_tanggal($dataInput->tgl_pengundangan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_pengundangan_perkades_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {
            $insert = $this->sk_pengundangan_perkades->insert_sk_pengundangan_perkades($dataInput);
            if ($insert) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Ditambahkan'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Ditambahkan'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $insert = $this->sk_pengundangan_perkades->insert_sk_pengundangan_perkades($dataInput);
                if ($insert) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Ditambahkan'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                    // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
            }
        }
    }

    public function ubah_sk_pengundangan_perkades()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        $sk_pengundangan_perkades = $this->sk_pengundangan_perkades->get_sk_pengundangan_perkades($dataInput->id_sk_pengundangan_perkades);

        // $no_sk = str_replace(' ', '_', strtolower($dataInput->no_pengundangan_perkades));
        // $nomor_sk = str_replace('/', '_', strtolower($no_sk));
        $tentang = str_replace(' ', '_', strtolower($dataInput->tentang));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $dataInput->tgl_perkades = insert_tanggal($dataInput->tgl_perkades);
        $dataInput->tgl_pengundangan = insert_tanggal($dataInput->tgl_pengundangan);
        $dataInput->id_desa = $this->userData->id_desa;

        $namafilebaru =  $namadesa . "_" . "sk_pengundangan_perkades_" . $tentang . "_" . time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = ASSET_DESA;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // d($dataInput);

        if ($_FILES["file_lampiran"]["name"] == '') {

            $update = $this->sk_pengundangan_perkades->update_sk_pengundangan_perkades($dataInput, ["id_sk_pengundangan_perkades" => $dataInput->id_sk_pengundangan_perkades]);
            if ($update) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil Diubah'
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data Gagal Diubah'
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
            }
        } else {
            if ($this->upload->do_upload("file_lampiran")) {

                if (is_file(FCPATH . ASSET_DESA . $sk_pengundangan_perkades->file_lampiran)) {
                    unlink(FCPATH . ASSET_DESA . $sk_pengundangan_perkades->file_lampiran);
                }

                $dataInput->file_lampiran = $namafilebaru;
                // d($dataInput);
                $update = $this->sk_pengundangan_perkades->update_sk_pengundangan_perkades($dataInput, ["id_sk_pengundangan_perkades" => $dataInput->id_sk_pengundangan_perkades]);
                if ($update) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Diubah'
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Diubah Ora upload'
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
                    // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
                // $this->session->set_flashdata("gagal", implode("<br>", $error));
                // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
            }
        }
    }

    public function hapus_sk_pengundangan_perkades()
    {
        $dataInput  = (object) $this->input->post();
        $sk_pengundangan_perkades = $this->sk_pengundangan_perkades->get_sk_pengundangan_perkades($dataInput->id_sk_pengundangan_perkades);
        // d($sk_pengundangan_perkades->file_lampiran);

        $hapus = $this->sk_pengundangan_perkades->delete_sk_pengundangan_perkades(["id_sk_pengundangan_perkades" => $dataInput->id_sk_pengundangan_perkades]);

        if (is_file(FCPATH . ASSET_DESA . $sk_pengundangan_perkades->file_lampiran)) {
            unlink(FCPATH . ASSET_DESA . $sk_pengundangan_perkades->file_lampiran);
        }

        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'    => 'Data berhasil Dihapus'
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus'
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
            // redirect(base_url("dokumen/surat_keputusan_pengundangan_perkades"));
        }
    }

    public function downloadSkpengundangan_perkades($fileName = NULL)
    {
        // $fileName  = (object) $this->input->post("fileName");
        $filebaru = explode('.', $fileName);
        $namafilebaru = array($filebaru[0]);
        $namabaru = implode("", $namafilebaru);
        $ekstensi = pathinfo($fileName, PATHINFO_EXTENSION);
        if ($fileName) {
            // echo json_encode([
            //        'response_code'     => 200,
            //        'response_message'  => 'Data Berhasil Ditemukan'
            //    ]);
            $file = realpath("assets/website/desa") . "\\" . $fileName;
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                // $name = 'file_lampiran.pdf';
                if ($ekstensi == 'pdf') {
                    $name = $namabaru . '.pdf';
                } else {
                    $name = $fileName;
                }
                //force download
                force_download($name, $data);
            } else {
                // Redirect to base url
                $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
                redirect(base_url("dokumen/peraturan-desa"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Data File Lampiran Tidak Ditemukan");
            redirect(base_url("dokumen/peraturan-desa"));
            // echo json_encode([
            //     'response_code'     => 400,
            //     'response_message'  => "Data File Lampiran Tidak Ditemukan"
            // ]);
        }
    }

    public function export_sk_pengundangan_perkades()
    {
        $tahun                     = $this->validasiHalaman("dokumen/pengundangan_perkades");
        $sk_pengundangan_perkades    = $this->sk_pengundangan_perkades->get_sk_pengundangan_perkades(null, $tahun);
        $spreadsheet               = $this->initExcel("sk_pengundangan_perkades.xlsx");
        $worksheet                 = $spreadsheet->getActiveSheet();
        $worksheet->getCell('B4')->setValue(': ' . $_GET['tahun']);
        $baris  = 7;
        $no     = 1;
        foreach ($sk_pengundangan_perkades as $data) {
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($data->no_perkades);
            $worksheet->getCell('C' . $baris)->setValue(shortdate_indo($data->tgl_perkades));
            $worksheet->getCell('D' . $baris)->setValue($data->tentang);
            $worksheet->getCell('E' . $baris)->setValue($data->uraian);
            $worksheet->getCell('F' . $baris)->setValue($data->no_pengundangan);
            $worksheet->getCell('G' . $baris)->setValue(shortdate_indo($data->tgl_pengundangan));
            $worksheet->getCell('H' . $baris)->setValue($data->keterangan);
            $baris++;
        }

        $fileName   = "AGENDA_SURAT_PENGUNDANGAN_PERATURAN_KEPALA_DESA_" . strtoupper($this->userData->nama_desa) . "_" . date("Y.m.d.H.i.s");
        exportExcel($spreadsheet, $fileName);
    }
}
