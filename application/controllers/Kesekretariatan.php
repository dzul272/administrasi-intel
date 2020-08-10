<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kesekretariatan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Surat_masuk_model", "surat_masuk");
        $this->load->model("Surat_keluar_model", "surat_keluar");
        $this->load->model("Tipe_surat_model", "tipe_surat");
        $this->load->model("PengaturanDesa_model", "desa");
        $this->load->model("Pamong_model", "pamong");
    }

    //* Digunain buat config upload file
    public function getConfig($lokasiArsip = NULL, $fileName = NULL)
    {
        $config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'txt|xls|xlsx|ppt|pptx|docx|doc|pdf|gif|jpg|jpeg|png|rtf',
            "max_size"          => 5120, // 5 MB
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $fileName
        ];
        return $config;
    }

    public function getDataTahun($table = NULL)
    {
        $dataTahun  = $this->m_data->select(["YEAR(created_at) as tahun"]);
        $dataTahun  = $this->m_data->distinct();
        $dataTahun  = $this->m_data->getData($table)->result();
        return $dataTahun;
    }

    public function initExcel($template = NULL)
    {
        $inputFileType  = 'Xlsx';
        $inputFileName  = LOKASI_TEMPLATE_KESEKRETARIATAN . $template;
        $reader         = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $spreadsheet    = $reader->load($inputFileName);
        return $spreadsheet;
    }

    //! BATAS ------------------------------------------------------------------------

    public function index()
    {
        redirect(base_url($this->router->fetch_class() . '/cetak-surat'));
    }

    public function cetak_surat()
    {
        $this->loadViewAdmin($this->router->fetch_class() . "/cetak_surat");
    }

    public function surat_masuk()
    {
        $awal   = $this->input->get("awal");
        $akhir  = $this->input->get("akhir");

        $linkExport = base_url("kesekretariatan/export-surat-masuk");
        if (isset($awal) || isset($akhir)) {
            if (validateDate($awal, "m/d/Y") && validateDate($akhir, "m/d/Y")) {
                $awal   = date("Y-m-d", strtotime($awal));
                $akhir  = date("Y-m-d", strtotime($akhir));
                $linkExport = base_url("kesekretariatan/export-surat-masuk?awal=" . $awal . "&akhir=" . $akhir);
            } else {
                redirect(base_url("kesekretariatan/surat-masuk"));
            }
        }
        $surat_masuk  = $this->surat_masuk->getSuratMasuk(NULL, $awal, $akhir);
        $data["surat_masuk"]    = $surat_masuk;
        $data["linkExport"]     = $linkExport;
        $this->loadViewAdmin($this->router->fetch_class() . "/surat_masuk", $data);
    }

    public function tambah_surat_masuk()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        $dataInput->id_desa = $this->userData->id_desa;
        $dataInput->id_user = $this->userData->id_user;
        $dataInput->tujuan_surat = $getdesa->nama_desa;
        $dataInput->jenis_surat = "masuk";
        $dataInput->tanggal_surat = insert_tanggal($dataInput->tanggal_surat);

        $insert = $this->surat_masuk->insert_suratMasuk($dataInput);

        $surat_masuk = $this->surat_masuk->getSuratMasuk();
        $output = '';
        $no = 1;
        foreach ($surat_masuk as $data) {
            $output .= '
                <tr>
                    <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->nomor_surat . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->perihal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->asal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->tanggal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle text-center">
                        <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_surat . '">Ubah</button>
                        <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="' . $data->id_surat . '">Hapus</button>
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

    public function getdata_suratmasuk()
    {
        $dataInput  = (object) $this->input->post();
        $id = $dataInput->id_surat;
        $data = $this->surat_masuk->getSuratMasuk($id);

        $tanggal_surat = tanggal_tampil($data->tanggal_surat);
        $id_surat = $data->id_surat;
        $nomor_surat = $data->nomor_surat;
        $asal_surat = $data->asal_surat;
        $perihal_surat = $data->perihal_surat;

        echo json_encode([
            'id_surat'              => $id_surat,
            'nomor_surat'           => $nomor_surat,
            'asal_surat'            => $asal_surat,
            'tanggal_surat'         => $tanggal_surat,
            'perihal_surat'         => $perihal_surat
        ]);
    }

    public function hapus_surat_masuk()
    {
        $dataInput  = (object) $this->input->post();
        $delete = $this->surat_masuk->delete_suratMasuk(["id_surat" => $dataInput->id_surat]);

        $surat_masuk = $this->surat_masuk->getSuratMasuk();
        $output = '';
        $no = 1;
        foreach ($surat_masuk as $data) {
            $output .= '
                <tr>
                    <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->nomor_surat . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->perihal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->asal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->tanggal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle text-center">
                        <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_surat . '">Ubah</button>
                        <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="' . $data->id_surat . '">Hapus</button>
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
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
            // redirect(base_url("pengaturan/jabatan"));
        }
    }

    public function ubah_surat_masuk()
    {
        $dataInput  = (object) $this->input->post();
        $dataInput->tanggal_surat = insert_tanggal($dataInput->tanggal_surat);
        $dataInput->id_user = $this->userData->id_user;
        $update = $this->surat_masuk->update_suratMasuk($dataInput, ["id_surat" => $dataInput->id_surat]);

        $surat_masuk = $this->surat_masuk->getSuratMasuk();
        $output = '';
        $no = 1;
        foreach ($surat_masuk as $data) {
            $output .= '
                <tr>
                    <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->nomor_surat . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->perihal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->asal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->tanggal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle text-center">
                        <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_surat . '">Ubah</button>
                        <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="' . $data->id_surat . '">Hapus</button>
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
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Diubah',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
            // redirect(base_url("pengaturan/jabatan"));
        }
    }

    public function export_surat_masuk()
    {
        $awal   = $this->input->get("awal");
        $akhir  = $this->input->get("akhir");

        $surat_masuk  = $this->surat_masuk->getSuratMasuk(NULL, $awal, $akhir, "ASC");
        $spreadsheet    = $this->initExcel("surat_masuk.xlsx");
        $worksheet      = $spreadsheet->getActiveSheet();

        $tanggalSemua   = "";
        $fileName       = "";
        if ($awal == NULL || $akhir == NULL) {
            $tanggalSemua = "Semua";
        } else {
            $tanggalSemua = longdate_indo($awal) . " - " . longdate_indo($akhir);
        }

        $worksheet->getCell('A4')->setValue("Tanggal : " . $tanggalSemua);


        $baris  = 6;
        $no     = 1;
        foreach ($surat_masuk as $data) {
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($data->nomor_surat);
            $worksheet->getCell('C' . $baris)->setValue($data->asal_surat);
            $worksheet->getCell('D' . $baris)->setValue(shortdate_indo($data->tanggal_surat));
            $worksheet->getCell('E' . $baris)->setValue($data->perihal_surat);
            $baris++;
        }
        $fileName   = "BUKU_AGENDA_SURAT_MASUK_" . strtoupper($tanggalSemua) . "_" . strtoupper($this->userData->nama_desa) . "_" . date("Y.m.d.H.i.s");
        exportExcel($spreadsheet, $fileName, TRUE, 6, FALSE);
    }

    //! BATAS ---------------------------------------------------------------------

    public function surat_keluar()
    {
        $id_tipesurat  = $this->input->get("id_tipesurat");
        $bulan         = $this->input->get("bulan");
        $tahun         = $this->input->get("tahun");

        $linkExport = base_url("kesekretariatan/export-surat-keluar");

        if (isset($id_tipesurat) && $id_tipesurat != "semua" && isset($bulan) && $bulan != "semua" && isset($tahun) && $tahun != "semua") {
            if (!is_numeric($id_tipesurat) || !is_numeric($bulan) || !is_numeric($tahun)) {
                redirect(base_url("kesekretariatan/surat_keluar"));
            } else {
                $linkExport = base_url("kesekretariatan/export-surat-keluar?id_tipesurat=" . $id_tipesurat . "&bulan=" . $bulan . "&tahun=" . $tahun);
            }
        }

        $surat_keluar   = $this->surat_keluar->getSuratkeluar_all(null, $id_tipesurat, $bulan, $tahun);
        $tipesurat      = $this->tipe_surat->getTipeSurat();
        $pamong         = $this->pamong->getDataPamong();

        $data["dataTahun"]      = $this->getdataTahun("surat");
        $data["pamong"]         = $pamong;
        $data["tipesurat"]      = $tipesurat;
        $data["surat_keluar"]   = $surat_keluar;
        $data["linkExport"]     = $linkExport;
        $this->loadViewAdmin($this->router->fetch_class() . "/surat_keluar", $data);
    }

    public function export_surat_keluar()
    {
        $id_tipesurat  = $this->input->get("id_tipesurat");
        $bulan         = $this->input->get("bulan");
        $tahun         = $this->input->get("tahun");

        $surat_keluar   = $this->surat_keluar->getSuratkeluar_all(null, $id_tipesurat, $bulan, $tahun, "ASC");
        $spreadsheet    = $this->initExcel("surat_keluar.xlsx");
        $worksheet      = $spreadsheet->getActiveSheet();

        $bulantampil          = "";
        $tahuntampil          = "";
        $fileName       = "";
        if ($bulan == NULL) {
            $bulantampil = "Semua";
        } else {
            $bulantampil = bulan($bulan);
        }

        if ($tahun == NULL) {
            $tahuntampil = "Semua";
        } else {
            $tahuntampil = $tahun;
        }

        $worksheet->getCell('A5')->setValue("Bulan : " . $bulantampil);
        $worksheet->getCell('A6')->setValue("Tahun : " . $tahuntampil);


        $baris  = 8;
        $no     = 1;
        foreach ($surat_keluar as $data) {
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($data->kode_tipesurat . ' / ' . $data->nomor_surat . ' / Ds. ' . $data->nama_desa . ' / ' . bulantahun_surat(tanggal_tampil($data->tanggal_surat)));
            $worksheet->getCell('C' . $baris)->setValue($data->tanggal_surat);
            $worksheet->getCell('D' . $baris)->setValue($data->nama_tipesurat);
            $worksheet->getCell('E' . $baris)->setValue($data->perihal_surat);
            $baris++;
        }
        $fileName   = "BUKU_AGENDA_SURAT_KELUAR_" . strtoupper($bulantampil) . "_" . strtoupper($tahun) . "_" . strtoupper($this->userData->nama_desa) . "_" . date("Y.m.d.H.i.s");
        exportExcel($spreadsheet, $fileName, TRUE, 8, FALSE);
    }

    public function getkode_surat()
    {
        $dataInput  = (object) $this->input->post();
        $tipesurat  = $this->tipe_surat->getTipeSurat($dataInput->id_tipesurat);

        $kode_tipesurat = $tipesurat->kode_tipesurat . ' / ';
        echo json_encode([
            'kode_tipesurat'              => $kode_tipesurat
        ]);
    }

    public function getbulantahun_surat()
    {
        $dataInput  = (object) $this->input->post();
        $getdesa = $this->desa->getInformasi_desa();
        $tanggal_surat = $dataInput->tanggal_surat;
        $nama_desa = $getdesa->nama_desa;

        $pisah = array_map('intval', explode('/', $tanggal_surat));
        $bulan = array($pisah[0]);
        $tahun = array($pisah[2]);
        $bulanss = implode('', $bulan);
        $tahunfix = implode('', $tahun);
        $bulanfix = bulan_romawi($bulanss);

        $output = '';
        $output .= ' / Ds. ' . $nama_desa . ' / ' . $bulanfix . ' / ' . $tahunfix . '';

        echo json_encode([
            'output'              => $output
        ]);
    }

    public function tambah_surat_keluar()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        $dataInput->id_desa = $this->userData->id_desa;
        $dataInput->id_user = $this->userData->id_user;
        $dataInput->tujuan_surat = "Surat Keluar";
        $dataInput->jenis_surat = "keluar";
        $dataInput->tanggal_surat = insert_tanggal($dataInput->tanggal_surat);
        $dataInput->namapeminta_surat = strtoupper($dataInput->namapeminta_surat);
        //namafile_surat
        $perihal = str_replace(' ', '_', strtolower($dataInput->perihal_surat));
        $namapeminta = str_replace(' ', '_', strtolower($dataInput->namapeminta_surat));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $get_kode = $this->tipe_surat->getTipeSurat($dataInput->id_tipesurat);
        $kodesurat = $get_kode->kode_tipesurat;
        $namafilebaru =  $perihal . "_" . $namapeminta  . "_" . $kodesurat  . "_" . $dataInput->nomor_surat  . "_" . $namadesa  . "_" . time() . "." . pathinfo($_FILES["namafile_surat"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = LOKASI_ARSIP . $namadesa;

        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $cek_nomorsurat = $this->surat_keluar->countNomorsurat($dataInput->id_tipesurat, $dataInput->nomor_surat);

        if ($_FILES["namafile_surat"]["name"] == '') {
            if ($cek_nomorsurat < 1) {
                $insert = $this->surat_keluar->insert_suratkeluar($dataInput);

                $surat_keluar = $this->surat_keluar->getSuratkeluar_all();
                $output = '';
                $no = 1;
                foreach ($surat_keluar as $data) {
                    $output .= '
                    <tr>
                        <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                        <td style="padding: 5px;" class="align-middle">' . $data->kode_tipesurat . ' / ' . $data->nomor_surat . ' / ' . $data->nama_desa . ' / ' . bulantahun_surat(tanggal_tampil($data->tanggal_surat)) . '</td>
                        <td style="padding: 5px;" class="align-middle">' . $data->perihal_surat . '</td>
                        <td style="padding: 5px;" class="align-middle">' . $data->tanggal_surat . '</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <button title="Lihat Detail" class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="' . $data->id_surat . '">
                                    <span class="btn-label"><i class="fa fa-file-alt"></i></span>
                            </button>
                            <button title="Ubah Data" class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_surat . '">
                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                            </button>
                            <button title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="' . $data->id_surat . '">
                                    <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
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
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Ditambahkan',
                        'output'            => $output
                    ]);
                }
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Nomor surat sudah terpakai, Silahkan dicek kembali'
                ]);
            }
        } else {
            if ($cek_nomorsurat < 1) {
                if ($this->upload->do_upload("namafile_surat")) {
                    $dataInput->namafile_surat = $namafilebaru;
                    $insert = $this->surat_keluar->insert_suratkeluar($dataInput);

                    $surat_keluar = $this->surat_keluar->getSuratkeluar_all();
                    $output = '';
                    $no = 1;
                    foreach ($surat_keluar as $data) {
                        $output .= '
                            <tr>
                                <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                                <td style="padding: 5px;" class="align-middle">' . $data->kode_tipesurat . ' / ' . $data->nomor_surat . ' / ' . $data->nama_desa . ' / ' . bulantahun_surat(tanggal_tampil($data->tanggal_surat)) . '</td>
                                <td style="padding: 5px;" class="align-middle">' . $data->perihal_surat . '</td>
                                <td style="padding: 5px;" class="align-middle">' . $data->tanggal_surat . '</td>
                                <td style="padding: 5px;" class="align-middle text-center">
                                    <button title="Lihat Detail" class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="' . $data->id_surat . '">
                                            <span class="btn-label"><i class="fa fa-file-alt"></i></span>
                                    </button>
                                    <button title="Ubah Data" class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_surat . '">
                                            <span class="btn-label"><i class="fa fa-edit"></i></span>
                                    </button>
                                    <button title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="' . $data->id_surat . '">
                                            <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
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
                    } else {
                        echo json_encode([
                            'response_code'     => 400,
                            'response_message'  => 'Data Gagal Ditambahkan',
                            'output'            => $output
                        ]);
                    }
                } else {
                    $error = array('error' => $this->upload->display_errors("", ""));
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => implode("<br>", $error)
                    ]);
                }
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Nomor surat sudah terpakai, Silahkan dicek kembali'
                ]);
            }
        }
    }

    public function getdata_suratkeluar()
    {
        $dataInput      = (object) $this->input->post();
        $getdesa        = $this->desa->getInformasi_desa();
        $pamong         = $this->pamong->getDataPamong();
        $tipesurat      = $this->tipe_surat->getTipeSurat();
        $id             = $dataInput->id_surat;
        $data           = $this->surat_keluar->getSuratkeluar($id);


        $tanggal_surat  = tanggal_tampil($data->tanggal_surat);
        $id_surat       = $data->id_surat;

        $output_tipesurat  = '';
        foreach ($tipesurat as $x) {
            $output_tipesurat .= '<option value="' . $x->id_tipesurat . '"';
            if ($x->id_tipesurat == $data->id_tipesurat) {
                $output_tipesurat .= 'selected ';
            }

            $output_tipesurat .= '>' . $x->nama_tipesurat . '</option>';
        }

        $output_pamong  = '';
        foreach ($pamong as $key) {
            $output_pamong .= '<option value="' . $key->id_pamong . '"';
            if ($key->id_pamong == $data->id_pamong) {
                $output_pamong .= 'selected ';
            }

            $output_pamong .= '>' . ce($key->nama_pamong) . ' (' .  ce($key->nama_jabatan) . ') </option>';
        }

        $nomor_surat       = $data->nomor_surat;
        $perihal_surat     = $data->perihal_surat;
        $namapeminta_surat = $data->namapeminta_surat;
        $nikpeminta_surat  = $data->nikpeminta_surat;
        $namafile_surat    = $data->namafile_surat == NULL ? 'Tidak Ada File Lampiran' : $data->namafile_surat;

        $getTipeSurat      = $this->tipe_surat->getTipeSurat($data->id_tipesurat);
        $kode_tipesurat    = $getTipeSurat->kode_tipesurat . ' / ';

        $nama_desa         = $getdesa->nama_desa;
        $pisah             = array_map('intval', explode('/', $tanggal_surat));
        $bulan             = array($pisah[0]);
        $tahun             = array($pisah[2]);
        $bulanss           = implode('', $bulan);
        $tahunfix          = implode('', $tahun);
        $bulanfix          = bulan_romawi($bulanss);
        $output_nomorsurat = '';
        $output_nomorsurat .= ' / ' . $nama_desa . ' / ' . $bulanfix . ' / ' . $tahunfix . '';

        echo json_encode([
            'id_surat'              => $id_surat,
            'id_tipesurat'          => $output_tipesurat,
            'tanggal_surat'         => $tanggal_surat,
            'nomor_surat'           => $nomor_surat,
            'nikpeminta_surat'      => $nikpeminta_surat,
            'namapeminta_surat'     => $namapeminta_surat,
            'perihal_surat'         => $perihal_surat,
            'pamong'                => $output_pamong,
            'output_nomorsurat'     => $output_nomorsurat,
            'kode_tipesurat'        => $kode_tipesurat,
            'namafile_surat'        => $namafile_surat
        ]);
    }

    public function ubah_surat_keluar()
    {
        $getdesa = $this->desa->getInformasi_desa();
        $dataInput  = (object) $this->input->post();
        $dataInput->id_user = $this->userData->id_user;
        $dataInput->tanggal_surat = insert_tanggal($dataInput->tanggal_surat);
        $dataInput->namapeminta_surat = strtoupper($dataInput->namapeminta_surat);
        $getsurat = $this->surat_keluar->getSuratkeluar($dataInput->id_surat);
        //new
        $perihal = str_replace(' ', '_', strtolower($dataInput->perihal_surat));
        $namapeminta = str_replace(' ', '_', strtolower($dataInput->namapeminta_surat));
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $get_kode = $this->tipe_surat->getTipeSurat($dataInput->id_tipesurat);
        $kodesurat = $get_kode->kode_tipesurat;
        $namafilebaru =  $perihal . "_" . $namapeminta  . "_" . $kodesurat  . "_" . $dataInput->nomor_surat  . "_" . $namadesa  . "_" . time() . "." . pathinfo($_FILES["namafile_surat"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = LOKASI_ARSIP . $namadesa;
        //end
        $config = $this->getConfig($lokasiArsip, $namafilebaru);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        $cek_nomorsurat = $this->surat_keluar->countNomorsurat($dataInput->id_tipesurat, $dataInput->nomor_surat);

        if ($_FILES["namafile_surat"]["name"] == '') {
            if ($cek_nomorsurat > 0) { //JIKA NOMOR LEBIH DARI 0
                if ($getsurat->nomor_surat == $dataInput->nomor_surat) { //CARI APAKAH NOMOR SURAT SEBELUMNYA SAMA DENGAN NOMOR SURAT YANG DIINPUTKAN MAKA TETAP EDIT
                    $update = $this->surat_keluar->update_suratkeluar($dataInput, ["id_surat" => $dataInput->id_surat]);

                    $surat_keluar = $this->surat_keluar->getSuratkeluar_all();
                    $output = '';
                    $no = 1;
                    foreach ($surat_keluar as $data) {
                        $output .= '
                        <tr>
                            <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                            <td style="padding: 5px;" class="align-middle">' . $data->kode_tipesurat . ' / ' . $data->nomor_surat . ' / ' . $data->nama_desa . ' / ' . bulantahun_surat(tanggal_tampil($data->tanggal_surat)) . '</td>
                            <td style="padding: 5px;" class="align-middle">' . $data->perihal_surat . '</td>
                            <td style="padding: 5px;" class="align-middle">' . $data->tanggal_surat . '</td>
                            <td style="padding: 5px;" class="align-middle text-center">
                                <button title="Lihat Detail" class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="' . $data->id_surat . '">
                                        <span class="btn-label"><i class="fa fa-file-alt"></i></span>
                                </button>
                                <button title="Ubah Data" class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_surat . '">
                                        <span class="btn-label"><i class="fa fa-edit"></i></span>
                                </button>
                                <button title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="' . $data->id_surat . '">
                                        <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
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
                    } else {
                        echo json_encode([
                            'response_code'     => 400,
                            'response_message'  => 'Data Gagal Diubah',
                            'output'            => $output
                        ]);
                    }
                } else { //JIKA NOMOR YANG DIINPUTKAN TIDAK SAMA DENGAN NOMOR SURAT SEBELUMNYA MAKA GAGAL EDIT
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Nomor surat sudah terpakai, Silahkan dicek kembali'
                    ]);
                }
            } else { //NOMOR SEBELUMNYA BELUM TERPAKAI MAKA BERHASIL DIUBAH
                $update = $this->surat_keluar->update_suratkeluar($dataInput, ["id_surat" => $dataInput->id_surat]);

                $surat_keluar = $this->surat_keluar->getSuratkeluar_all();
                $output = '';
                $no = 1;
                foreach ($surat_keluar as $data) {
                    $output .= '
                    <tr>
                        <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                        <td style="padding: 5px;" class="align-middle">' . $data->kode_tipesurat . ' / ' . $data->nomor_surat . ' / ' . $data->nama_desa . ' / ' . bulantahun_surat(tanggal_tampil($data->tanggal_surat)) . '</td>
                        <td style="padding: 5px;" class="align-middle">' . $data->perihal_surat . '</td>
                        <td style="padding: 5px;" class="align-middle">' . $data->tanggal_surat . '</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <button title="Lihat Detail" class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="' . $data->id_surat . '">
                                    <span class="btn-label"><i class="fa fa-file-alt"></i></span>
                            </button>
                            <button title="Ubah Data" class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_surat . '">
                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                            </button>
                            <button title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="' . $data->id_surat . '">
                                    <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
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
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Diubah',
                        'output'            => $output
                    ]);
                }
            }
        } else {
            if ($cek_nomorsurat > 0) {
                if ($getsurat->nomor_surat == $dataInput->nomor_surat) {
                    if ($this->upload->do_upload("namafile_surat")) {
                        if (is_file(FCPATH . LOKASI_ARSIP . $namadesa . '/' . $getsurat->namafile_surat)) {
                            unlink(FCPATH . LOKASI_ARSIP . $namadesa . '/' . $getsurat->namafile_surat);
                        }

                        $dataInput->namafile_surat = $namafilebaru;
                        $update = $this->surat_keluar->update_suratkeluar($dataInput, ["id_surat" => $dataInput->id_surat]);

                        $surat_keluar = $this->surat_keluar->getSuratkeluar_all();
                        $output = '';
                        $no = 1;
                        foreach ($surat_keluar as $data) {
                            $output .= '
                                <tr>
                                    <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                                    <td style="padding: 5px;" class="align-middle">' . $data->kode_tipesurat . ' / ' . $data->nomor_surat . ' / ' . $data->nama_desa . ' / ' . bulantahun_surat(tanggal_tampil($data->tanggal_surat)) . '</td>
                                    <td style="padding: 5px;" class="align-middle">' . $data->perihal_surat . '</td>
                                    <td style="padding: 5px;" class="align-middle">' . $data->tanggal_surat . '</td>
                                    <td style="padding: 5px;" class="align-middle text-center">
                                        <button title="Lihat Detail" class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="' . $data->id_surat . '">
                                                <span class="btn-label"><i class="fa fa-file-alt"></i></span>
                                        </button>
                                        <button title="Ubah Data" class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_surat . '">
                                                <span class="btn-label"><i class="fa fa-edit"></i></span>
                                        </button>
                                        <button title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="' . $data->id_surat . '">
                                                <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
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
                        } else {
                            echo json_encode([
                                'response_code'     => 400,
                                'response_message'  => 'Data Gagal Diubah',
                                'output'            => $output
                            ]);
                        }
                    } else {
                        $error = array('error' => $this->upload->display_errors("", ""));
                        echo json_encode([
                            'response_code'     => 400,
                            'response_message'  => implode("<br>", $error)
                        ]);
                    }
                } else { //JIKA NOMOR YANG DIINPUTKAN TIDAK SAMA DENGAN NOMOR SURAT SEBELUMNYA MAKA GAGAL EDIT
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Nomor surat sudah terpakai, Silahkan dicek kembali'
                    ]);
                }
            } else { //NOMOR SEBELUMNYA BELUM TERPAKAI MAKA BERHASIL DIUBAH
                if ($this->upload->do_upload("namafile_surat")) {
                    if (is_file(FCPATH . LOKASI_ARSIP . $namadesa . '/' . $getsurat->namafile_surat)) {
                        unlink(FCPATH . LOKASI_ARSIP . $namadesa . '/' . $getsurat->namafile_surat);
                    }

                    $dataInput->namafile_surat = $namafilebaru;
                    $update = $this->surat_keluar->update_suratkeluar($dataInput, ["id_surat" => $dataInput->id_surat]);

                    $surat_keluar = $this->surat_keluar->getSuratkeluar_all();
                    $output = '';
                    $no = 1;
                    foreach ($surat_keluar as $data) {
                        $output .= '
                            <tr>
                                <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                                <td style="padding: 5px;" class="align-middle">' . $data->kode_tipesurat . ' / ' . $data->nomor_surat . ' / ' . $data->nama_desa . ' / ' . bulantahun_surat(tanggal_tampil($data->tanggal_surat)) . '</td>
                                <td style="padding: 5px;" class="align-middle">' . $data->perihal_surat . '</td>
                                <td style="padding: 5px;" class="align-middle">' . $data->tanggal_surat . '</td>
                                <td style="padding: 5px;" class="align-middle text-center">
                                    <button title="Lihat Detail" class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="' . $data->id_surat . '">
                                            <span class="btn-label"><i class="fa fa-file-alt"></i></span>
                                    </button>
                                    <button title="Ubah Data" class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_surat . '">
                                            <span class="btn-label"><i class="fa fa-edit"></i></span>
                                    </button>
                                    <button title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="' . $data->id_surat . '">
                                            <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
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
                    } else {
                        echo json_encode([
                            'response_code'     => 400,
                            'response_message'  => 'Data Gagal Diubah',
                            'output'            => $output
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

    public function hapus_surat_keluar()
    {
        $dataInput  = (object) $this->input->post();
        $arsip_surat = $this->surat_keluar->getSuratkeluar_all($dataInput->id_surat, null, null, null);
        $getdesa = $this->desa->getInformasi_desa();
        $namadesa = str_replace(' ', '_', strtolower($getdesa->nama_desa));
        $delete = $this->surat_keluar->delete_suratkeluar(["id_surat" => $dataInput->id_surat]);
        if (is_file(FCPATH . LOKASI_ARSIP . $namadesa . '/' . $arsip_surat->namafile_surat)) {
            unlink(FCPATH . LOKASI_ARSIP . $namadesa . '/' . $arsip_surat->namafile_surat);
        }

        $surat_keluar = $this->surat_keluar->getSuratkeluar_all();
        $output = '';
        $no = 1;
        foreach ($surat_keluar as $data) {
            $output .= '
                <tr>
                    <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->kode_tipesurat . ' / ' . $data->nomor_surat . ' / ' . $data->nama_desa . ' / ' . bulantahun_surat(tanggal_tampil($data->tanggal_surat)) . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->perihal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->tanggal_surat . '</td>
                    <td style="padding: 5px;" class="align-middle text-center">
                        <button title="Lihat Detail" class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="' . $data->id_surat . '">
                                <span class="btn-label"><i class="fa fa-file-alt"></i></span>
                        </button>
                        <button title="Ubah Data" class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_surat . '">
                                <span class="btn-label"><i class="fa fa-edit"></i></span>
                        </button>
                        <button title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="' . $data->id_surat . '">
                                <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
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
            // $this->session->set_flashdata("sukses", "Data Berhasil Dihapus");
            // redirect(base_url("pengaturan/jabatan"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
            // redirect(base_url("pengaturan/jabatan"));
        }
    }
}
