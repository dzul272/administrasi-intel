<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Surat_model", "surat");
        $this->load->model("Pamong_model", "pamong");
        $this->load->model("User_model", "user");
        $this->load->model("Tipe_surat_model", "tipe_surat");
        $this->load->model("Arsip_surat_model", "arsip_surat");
        $this->load->model("PengaturanDesa_model", "desa");
    }

    public function index()
    {
        redirect(base_url($this->router->fetch_class() . '/cetak'));
    }

    public function cek_surat($id_desa = NULL, $id_tipesurat = NULL, $nomor_surat = NULL)
    {
        $cekSurat    = $this->db->get_where(
            "surat",    //? table
            [
                "id_desa"       => $id_desa,
                "id_tipesurat"  => $id_tipesurat,
                "nomor_surat"   => $nomor_surat,
            ]
        )->row();

        echo json_encode($cekSurat);
    }

    //! BATAS ---------------------------------------------------------------------------

    public function cetak()
    {
        $tipeSurat  = $this->surat->getTipeSurat(null, TRUE)->result();
        $data["tipeSurat"] = $tipeSurat; // gajadi di gunain

        $this->loadViewAdmin($this->router->fetch_class() . "/cetak_surat", $data);
    }

    public function getSurat()
    {
        $tipeSurat  = $this->surat->getTipeSurat(null, TRUE)->result();
        if ($tipeSurat) {
            echo json_encode(array(
                "respon_code"       => 200,
                "respon_message"    => "Data Berhasil Ditemukan",
                "data"              => $tipeSurat
            ));
        } else {
            echo json_encode(array(
                "respon_code"       => 404,
                "respon_message"    => "Data Tidak Ditemukan",
                "data"              => NULL
            ));
        }
    }
    //! BATAS ---------------------------------------------------------------------------
    public function arsip()
    {
        $arsip_surat = $this->arsip_surat->getArsipsurat_all();
        $getdesa = $this->desa->getInformasi_desa();
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $data["arsip_surat"] = $arsip_surat;
        $data["namadesa"] = $namadesa;
        $this->loadViewAdmin($this->router->fetch_class() . "/arsip_surat", $data);
    }

    public function download_arsip($fileName = NULL)
    {
        $getdesa = $this->desa->getInformasi_desa();
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));

        $filebaru = explode('.', $fileName);
        $namafilebaru = array($filebaru[0]);
        $namabaru = implode("", $namafilebaru);
        $ekstensi = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!empty($fileName)) {

            // $file = realpath(LOKASI_ARSIP . $namadesa) . "\\" . $fileName;
            $file = FCPATH . LOKASI_ARSIP . $namadesa . '/' . $fileName;
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
                $this->session->set_flashdata("gagal", "Data File Surat Tidak Ditemukan");
                redirect(base_url("surat/arsip"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Data File Surat Tidak Ditemukan");
            redirect(base_url("surat/arsip"));
        }
    }

    public function hapus_arsip()
    {
        $dataInput  = (object) $this->input->post();
        $arsip_surat = $this->arsip_surat->getArsipsurat_all($dataInput->id_surat);
        $getdesa = $this->desa->getInformasi_desa();
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        // $delete = $this->arsip_surat->delete_arsip_surat(["id_surat" => $dataInput->id_surat]);

        if (is_file(FCPATH . LOKASI_ARSIP . $namadesa . '/' . $arsip_surat->namafile_surat)) {
            unlink(FCPATH . LOKASI_ARSIP . $namadesa . '/' . $arsip_surat->namafile_surat);
        }
        echo json_encode([
            'response_code'     => 200,
            'response_message'  => 'Arsip Berhasil Dihapus'
        ]);
    }

    public function pengaturan()
    {
        $tipesurat  = $this->tipe_surat->getTipeSurat();
        $data["tipesurat"] = $tipesurat;
        $this->loadViewAdmin($this->router->fetch_class() . "/pengaturan_surat", $data);
    }

    public function tambah_tipesurat()
    {
        $dataInput  = (object) $this->input->post();
        $dataInput->id_desa = $this->userData->id_desa;
        $dataInput->nama_tipesurat = ce($dataInput->nama_tipesurat);

        $insert = $this->tipe_surat->insert_tipe_surat($dataInput);

        $tipesurat  = $this->tipe_surat->getTipeSurat();
        $output = '';
        $no = 1;
        foreach ($tipesurat as $data) {
            $output .= '
                <tr>
                    <td style="padding: 5px" class="text-center align-middle">' . $no++ . '</td>
                    <td style="padding: 5px" class="align-middle">' . $data->nama_tipesurat . '</td>
                    <td style="padding: 5px" class="align-middle">' . $data->kode_tipesurat . '</td>
                    <td style="padding: 5px" class="text-center align-middle">
                        <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" style="width: 70px;" type="button" data-id="' . $data->id_tipesurat . '">
                            <span class="btn-label"><i class="far fa-edit"></i></span> ubah
                        </button>
                        <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" style="width: 70px;" type="button" data-id="' . $data->id_tipesurat . '">
                            <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span> Hapus
                        </button>
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
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Ditambahkan',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
            // redirect(base_url("pengaturan/jabatan"));
        }
    }

    public function getdata_tipesurat()
    {
        $dataInput  = (object) $this->input->post();
        $id = $dataInput->id_tipesurat;
        $data = $this->tipe_surat->getTipeSurat($id);

        echo json_encode([
            'id_tipesurat'          => $data->id_tipesurat,
            'kode_tipesurat'        => $data->kode_tipesurat,
            'nama_tipesurat'        => $data->nama_tipesurat
        ]);
    }

    public function ubah_tipesurat()
    {
        $dataInput  = (object) $this->input->post();
        $dataInput->nama_tipesurat = ce($dataInput->nama_tipesurat);

        $update = $this->tipe_surat->update_tipe_surat($dataInput, ["id_tipesurat" => $dataInput->id_tipesurat]);

        $tipesurat  = $this->tipe_surat->getTipeSurat();
        $output = '';
        $no = 1;
        foreach ($tipesurat as $data) {
            $output .= '
                <tr>
                    <td style="padding: 5px" class="text-center align-middle">' . $no++ . '</td>
                    <td style="padding: 5px" class="align-middle">' . $data->nama_tipesurat . '</td>
                    <td style="padding: 5px" class="align-middle">' . $data->kode_tipesurat . '</td>
                    <td style="padding: 5px" class="text-center align-middle">
                        <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" style="width: 70px;" type="button" data-id="' . $data->id_tipesurat . '">
                            <span class="btn-label"><i class="far fa-edit"></i></span> ubah
                        </button>
                        <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" style="width: 70px;" type="button" data-id="' . $data->id_tipesurat . '">
                            <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span> Hapus
                        </button>
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

            // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
            // redirect(base_url("pengaturan/jabatan"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Diubah',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
            // redirect(base_url("pengaturan/jabatan"));
        }
    }

    public function hapus_tipesurat()
    {
        $dataInput  = (object) $this->input->post();

        $delete = $this->tipe_surat->delete_tipe_surat(["id_tipesurat" => $dataInput->id_tipesurat]);

        $tipesurat  = $this->tipe_surat->getTipeSurat();
        $output = '';
        $no = 1;
        foreach ($tipesurat as $data) {
            $output .= '
                <tr>
                    <td style="padding: 5px" class="text-center align-middle">' . $no++ . '</td>
                    <td style="padding: 5px" class="align-middle">' . $data->nama_tipesurat . '</td>
                    <td style="padding: 5px" class="align-middle">' . $data->kode_tipesurat . '</td>
                    <td style="padding: 5px" class="text-center align-middle">
                        <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" style="width: 70px;" type="button" data-id="' . $data->id_tipesurat . '">
                            <span class="btn-label"><i class="far fa-edit"></i></span> ubah
                        </button>
                        <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" style="width: 70px;" type="button" data-id="' . $data->id_tipesurat . '">
                            <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span> Hapus
                        </button>
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

            // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
            // redirect(base_url("pengaturan/jabatan"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
            // redirect(base_url("pengaturan/jabatan"));
        }
    }

    public function cetak_surat($surat = "") //ini tak route -> lihat di routing
    {
        $pamong = $this->pamong->getDataPamong();
        $dataSurat  = $this->surat->getSurat($surat);
        // d($dataSurat);

        $data["pamong"]         = $pamong;
        $data["dataSurat"]      = $dataSurat;
        $data['form_action']    = site_url("surat/action/$surat");

        $this->loadViewAdmin("surat/form/" . $surat, $data);
    }

    public function action($surat = "")
    {
        // d($this->input->post());
        $dataSurat  = $this->surat->getSurat($surat); //ambil data surat kaya lokasi rtf, kode surat, dll
        // d($dataSurat);

        # PROSES BUAT SURAT
        // Surat Keterangan Nomer 400 Oleh Rafli Firdausy Desa Wanadadi Tanggal 7 February 2020 Jam 12:42:40
        // No 400 / 1 / Ds. Wanadadi / II / 2020
        // Akan seperti ini
        // surat_pengantar_ktp_rafli_firdausy_irawan_200-1-ds-wanadadi-II-2020_waktu_export_07-Feb-2020-12-42-40

        #surat_ket_pengantar => diambil dari table tipesurat kolom nama_tipesurat
        #rafli_firdausy_irawan => diambil dari inputan
        #400-1-Ds-Wanadadi-II-2020 => kombinasi kode surat, no urut dan tanggal sekarang

        $jenis = $this->userData->jenis_desa == "desa" ? "ds" : "kel";

        $namaSurat = "";
        switch ($surat) {
            case "surat_pengantar_ntcr":
                $namaSurat  = str_replace(" ", "_", strtolower($dataSurat['nama_tipesurat']));
                $namaSurat  .= "_";
                $namaSurat  .= $dataSurat['kode_tipesurat'] . "-" . $this->input->post("nomor_surat") . "-$jenis-";
                $namaSurat  .= str_replace(" ", "_", strtolower($this->user->userData->nama_desa));
                $namaSurat  .= "-";
                $namaSurat  .= bulan_romawi(date("n")) . "-" . date("Y");
                $namaSurat  .= "_waktu_export_" . date("d-M-Y-H-i-s");
                break;
            case "surat_permohonan_akta_kelahiran":
                $namaSurat  = str_replace(" ", "_", strtolower($dataSurat['nama_tipesurat']));
                $namaSurat  .= "_";
                $namaSurat  .= $dataSurat['kode_tipesurat'] . "-" . $this->input->post("nomor_surat") . "-$jenis-";
                $namaSurat  .= str_replace(" ", "_", strtolower($this->user->userData->nama_desa));
                $namaSurat  .= "-";
                $namaSurat  .= bulan_romawi(date("n")) . "-" . date("Y");
                $namaSurat  .= "_waktu_export_" . date("d-M-Y-H-i-s");
                break;
            case "surat_permohonan_akta_kematian":
                $namaSurat  = str_replace(" ", "_", strtolower($dataSurat['nama_tipesurat']));
                $namaSurat  .= "_";
                $namaSurat  .= $dataSurat['kode_tipesurat'] . "-" . $this->input->post("nomor_surat") . "-$jenis-";
                $namaSurat  .= str_replace(" ", "_", strtolower($this->user->userData->nama_desa));
                $namaSurat  .= "-";
                $namaSurat  .= bulan_romawi(date("n")) . "-" . date("Y");
                $namaSurat  .= "_waktu_export_" . date("d-M-Y-H-i-s");
                break;
            case "surat_kuasa":
                $namaSurat  = str_replace(" ", "_", strtolower($dataSurat['nama_tipesurat']));
                $namaSurat  .= "_";
                $namaSurat  .= $dataSurat['kode_tipesurat'] . "-" . $this->input->post("nomor_surat") . "-$jenis-";
                $namaSurat  .= str_replace(" ", "_", strtolower($this->user->userData->nama_desa));
                $namaSurat  .= "-";
                $namaSurat  .= bulan_romawi(date("n")) . "-" . date("Y");
                $namaSurat  .= "_waktu_export_" . date("d-M-Y-H-i-s");
                break;
            case "surat_pernyataan_lahir_luar_nikah":
                $namaSurat  = str_replace(" ", "_", strtolower($dataSurat['nama_tipesurat']));
                $namaSurat  .= "_";
                $namaSurat  .= $dataSurat['kode_tipesurat'] . "-" . $this->input->post("nomor_surat") . "-$jenis-";
                $namaSurat  .= str_replace(" ", "_", strtolower($this->user->userData->nama_desa));
                $namaSurat  .= "-";
                $namaSurat  .= bulan_romawi(date("n")) . "-" . date("Y");
                $namaSurat  .= "_waktu_export_" . date("d-M-Y-H-i-s");
                break;
            case "sptjm_kebenaran_sebagai_pasangan_suami_istri":
                $namaSurat  = str_replace(" ", "_", strtolower($dataSurat['nama_tipesurat']));
                $namaSurat  .= "_";
                $namaSurat  .= $dataSurat['kode_tipesurat'] . "-" . $this->input->post("nomor_surat") . "-$jenis-";
                $namaSurat  .= str_replace(" ", "_", strtolower($this->user->userData->nama_desa));
                $namaSurat  .= "-";
                $namaSurat  .= bulan_romawi(date("n")) . "-" . date("Y");
                $namaSurat  .= "_waktu_export_" . date("d-M-Y-H-i-s");
                break;
            case "sptjm_kebenaran_data_kelahiran":
                $namaSurat  = str_replace(" ", "_", strtolower($dataSurat['nama_tipesurat']));
                $namaSurat  .= "_";
                $namaSurat  .= $dataSurat['kode_tipesurat'] . "-" . $this->input->post("nomor_surat") . "-$jenis-";
                $namaSurat  .= str_replace(" ", "_", strtolower($this->user->userData->nama_desa));
                $namaSurat  .= "-";
                $namaSurat  .= bulan_romawi(date("n")) . "-" . date("Y");
                $namaSurat  .= "_waktu_export_" . date("d-M-Y-H-i-s");
                break;
            case "surat_keterangan_ahli_waris":
                $namaSurat  = str_replace(" ", "_", strtolower($dataSurat['nama_tipesurat']));
                $namaSurat  .= "_";
                $namaSurat  .= $dataSurat['kode_tipesurat'] . "-" . $this->input->post("nomor_surat") . "-$jenis-";
                $namaSurat  .= str_replace(" ", "_", strtolower($this->user->userData->nama_desa));
                $namaSurat  .= "-";
                $namaSurat  .= bulan_romawi(date("n")) . "-" . date("Y");
                $namaSurat  .= "_waktu_export_" . date("d-M-Y-H-i-s");
                break;
            default:
                $namaSurat  = str_replace(" ", "_", strtolower($dataSurat['nama_tipesurat']));
                $namaSurat  .= "_";
                $namaSurat  .= str_replace(" ", "_", strtolower(ce(set($this->input->post("NAMA_LGKP")))));
                $namaSurat  .= "_";
                $namaSurat  .= $dataSurat['kode_tipesurat'] . "-" . set($this->input->post("nomor_surat")) . "-$jenis-";
                $namaSurat  .= str_replace(" ", "_", strtolower($this->user->userData->nama_desa));
                $namaSurat  .= "-";
                $namaSurat  .= bulan_romawi(date("n")) . "-" . date("Y");
                $namaSurat  .= "_waktu_export_" . date("d-M-Y-H-i-s");
                break;
        }
        return $this->surat->buatSurat($surat, $namaSurat, $dataSurat);
    }
}
