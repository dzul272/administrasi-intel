<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Slider_model", "slider");
        $this->load->model("Kategori_artikel_model", "kategori");
        $this->load->model("Kategori_galeri_model", "kategori_galeri");
        $this->load->model("Artikel_model", "artikel");
        $this->load->model("Galeri_model", "galeri");
        $this->load->model("File_model", "file");
        $this->load->model("Komponen_sambutan_model", "sambutan");
        $this->load->model("Komponen_kontak_model", "kontak");
        $this->load->model("Komponen_sosmed_model", "sosmed");
        $this->load->model("Halaman_statis_model", "halaman");
        $this->load->model("Headline_model", "headline");
    }

    //* Digunain buat config upload file
    public function getConfig($lokasiArsip = NULL, $fileName = NULL)
    {
        $config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'jfif|jpg|jpeg|png|gif|svg',
            "max_size"          => 5120, // 5 MB
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $fileName
        ];
        return $config;
    }

    public function index()
    {
        redirect(base_url("website/slider"));
    }

    public function slider()
    {
        $slider             = $this->slider
            ->where("id_desa", $this->userData->id_desa)
            ->order_by("id_slider", "DESC")
            ->get_all();            
        $data["slider"]     = $slider;
        $this->loadViewAdmin('website/slider', $data);
    }

    public function tambah_slider()
    {        
        $namaFile = underscore($this->userData->nama_desa) . "_";
        $namaFile .= underscore(preg_replace("/[^A-Za-z0-9 ]/", "", $this->input->post('judul_slider', TRUE))) . "_";
        $namaFile .= time() . "." . pathinfo($_FILES["file_slider"]["name"], PATHINFO_EXTENSION);

        $dataInput = [
            "id_desa"       => $this->userData->id_desa,
            "judul_slider"  => $this->input->post("judul_slider", TRUE),
            "isi_slider"    => $this->input->post("isi_slider", TRUE),
            "foto_slider"   => $namaFile
        ];

        $config = $this->getConfig(LOKASI_ASSET_DESA, $namaFile);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload("file_slider")) {
            $insert = $this->slider->insert($dataInput);
            if ($insert > 0) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Slider Berhasil Ditambahkan'
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => "Gagal Menambahkan Data Slider"
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => $this->upload->display_errors('', '')
            ]);
        }
    }

    public function ubah_slider()
    {
        $sukses = TRUE;
        $namaFile = "";
        $dataUpdate = [
            "id_desa"       => $this->userData->id_desa,
            "judul_slider"  => $this->input->post("judul_slider", TRUE),
            "isi_slider"    => $this->input->post("isi_slider", TRUE)
        ];

        if (!empty($_FILES["file_slider"]["name"])) {
            //TODO : AMBIL DATA LAMA DULU
            $sliderLama = $this->slider->get($this->input->post("id_slider", TRUE));

            //TODO : UPLOAD FOTO BARU TRUS HAPUS YANG LAMA
            $namaFile = underscore($this->userData->nama_desa) . "_";
            $namaFile .= underscore(preg_replace("/[^A-Za-z0-9 ]/", "", $this->input->post('judul_slider', TRUE))) . "_";            
            $namaFile .= time() . "." . pathinfo($_FILES["file_slider"]["name"], PATHINFO_EXTENSION);

            $dataUpdate["foto_slider"] = $namaFile;

            $config = $this->getConfig(LOKASI_ASSET_DESA, $namaFile);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("file_slider")) {
                //TODO : HAPUS FOTO LAMA
                if (is_file(FCPATH . LOKASI_ASSET_DESA . $sliderLama->foto_slider)) {
                    unlink(FCPATH . LOKASI_ASSET_DESA . $sliderLama->foto_slider);
                }
            } else {
                $sukses = FALSE;
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => $this->upload->display_errors('', '')
                ]);
            }
        }

        if ($sukses) {
            $update = $this->slider->update($dataUpdate, $this->input->post('id_slider', TRUE));
            if ($update > 0) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => "Data slider berhasil di ubah"
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => "Data slider gagal di ubah :("
                ]);
            }
        }
    }

    public function hapus_slider()
    {
        $sliderLama = $this->slider->get($this->input->post("id_slider", TRUE));

        $hapus = $this->slider->delete($this->input->post("id_slider", TRUE));
        if ($hapus > 0) {
            if (is_file(FCPATH . LOKASI_ASSET_DESA . $sliderLama->foto_slider)) {
                unlink(FCPATH . LOKASI_ASSET_DESA . $sliderLama->foto_slider);
            }
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => "Data slider berhasil di Hapus"
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => "Data slider gagal di hapus :("
            ]);
        }
    }

    public function ubah_status_slider()
    {
        $sliderLama = $this->slider->get($this->input->post("id_slider", TRUE));
        $dataUpdate = [
            "is_active"    => $sliderLama->is_active == 1 ? 0 : 1,
        ];

        $update = $this->slider->update($dataUpdate, $this->input->post('id_slider', TRUE));
        if ($update > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => "Data slider berhasil di Ubah"
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => "Data slider gagal di ubah Status"
            ]);
        }
    }

    //! BATAS ---------------------------------------------------------------------------------------------
    //TODO : KATEGORI ARTIKEL GOES HERE!

    public function artikel($kategori = NULL)
    {
        $current_kategori   = $this->kategori
            ->where("id_desa", $this->userData->id_desa)
            ->where("route_kategori", $kategori)
            ->get();

        if (empty($kategori)) {
            $default    = $kategori_artikel   = $this->kategori
                ->where("id_desa", $this->userData->id_desa)
                ->get();
            if ($default) {
                redirect(base_url("website/artikel/" . $default->route_kategori));
            } else {
                show_404(); //kalo ga ada kategori artikel sama sekali :v
            }
        } else {
            if (!$current_kategori) {
                redirect(base_url("website/artikel"));
            }
        }

        $kategori_artikel   = $this->kategori
            ->where("id_desa", $this->userData->id_desa)
            ->get_all();

        //TODO : CARI JUMLAH ARTIKEL
        foreach ($kategori_artikel as $k) {
            $k->total_artikel = $this->artikel
                ->where("id_kategori", $k->id_kategori)
                ->where("id_desa", $this->userData->id_desa)
                ->count_rows();
        }

        //TODO : CARI ARTIKEL BERDASARKAN JENIS ARTIKEL
        $artikel = $this->artikel
            ->where("id_kategori", $current_kategori->id_kategori)
            ->with_user("fields:nama_user")
            ->with_kategori("fields:nama_kategori,route_kategori")
            ->order_by("id_artikel", "DESC")
            ->get_all();

        $data["current_kategori"]   = $current_kategori;
        $data["kategori_artikel"]   = $kategori_artikel;
        $data["artikel"]            = $artikel;
        $data["SidebarType"]        = "mini-sidebar"; // You can change it full / mini-sidebar / iconbar / overlay
        $this->loadViewAdmin('website/artikel_daftar', $data);
    }

    public function tambah_kategori_artikel()
    {
        $namaKategori   = $this->input->post('nama_kategori', TRUE);
        $warnaKategori  = htmlentities($this->input->post('warna', TRUE), ENT_QUOTES);
        $cekRoute   = $this->kategori
            ->where("id_desa", $this->userData->id_desa)
            ->where("route_kategori", slug($namaKategori))
            ->count_rows();

        if ($cekRoute > 0) {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data kategori ' . $namaKategori . ' sudah ada, silahkan gunakan nama yang lain',
                'slug'              => slug($namaKategori)
            ]);
            die();
        }

        $dataInsert = [
            "id_desa"           => $this->userData->id_desa,
            "nama_kategori"     => $namaKategori,
            "warna_kategori"    => $warnaKategori,
            "route_kategori"    => slug($namaKategori)
        ];

        $insert = $this->kategori->insert($dataInsert);
        if ($insert > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data kategori artikel berhasil ditambahkan',
                'slug'              => slug($namaKategori)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data kategori artikel gagal ditambahkan',
                'slug'              => ''
            ]);
        }
    }

    public function edit_kategori_artikel()
    {
        $namaKategori = $this->input->post('nama_kategori', TRUE);
        $warnaKategori  = htmlentities($this->input->post('warna', TRUE), ENT_QUOTES);

        $cekSebelumnya   = $this->kategori
            ->get($this->input->post('id_kategori'));

        $cekRoute   = $this->kategori
            ->where("id_desa", $this->userData->id_desa)
            ->where("route_kategori", slug($namaKategori))
            ->count_rows();

        if ($cekSebelumnya->nama_kategori != $namaKategori) {
            if ($cekRoute > 0) {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data kategori ' . $namaKategori . ' sudah ada, silahkan Gunakan nama yang lain',
                    'slug'              => slug($namaKategori)
                ]);
                die();
            }
        }

        $dataUpdate = [
            "nama_kategori"     => $namaKategori,
            "route_kategori"    => slug($namaKategori),
            "warna_kategori"    => $warnaKategori
        ];

        $update = $this->kategori->update($dataUpdate, $this->input->post('id_kategori'));
        if ($update > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data kategori artikel berhasil di ubah',
                'slug'              => slug($namaKategori)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data kategori artikel gagal di ubah',
                'slug'              => ''
            ]);
        }
    }

    public function hapus_kategori_artikel()
    {
        $hapus = $this->kategori->delete($this->input->post("id_kategori"));
        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => "Data kategori artikel berhasil di hapus"
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => "Data kategori artikel gagal di hapus :("
            ]);
        }
    }

    //! BATAS ==============================================================================================
    //TODO : KATEGORI GALERI DESA HERE!
    public function galeri_desa($kategori = NULL)
    {
        $current_kategori   = $this->kategori_galeri
            ->where("id_desa", $this->userData->id_desa)
            ->where("route_kategori", $kategori)
            ->get();

        if (empty($kategori)) {
            $default    = $kategori_galeri   = $this->kategori_galeri
                ->where("id_desa", $this->userData->id_desa)
                ->get();
            if ($default) {
                redirect(base_url("website/galeri_desa/" . $default->route_kategori));
            } else {
                show_404(); //kalo ga ada kategori artikel sama sekali :v
            }
        } else {
            if (!$current_kategori) {
                redirect(base_url("website/galeri_desa"));
            }
        }

        $kategori_galeri   = $this->kategori_galeri
            ->where("id_desa", $this->userData->id_desa)
            ->get_all();

        //TODO : CARI JUMLAH GALERI
        foreach ($kategori_galeri as $k) {
            $k->total_galeri = $this->galeri
                ->where("id_kategori", $k->id_kategori)
                ->where("id_desa", $this->userData->id_desa)
                ->count_rows();
            // d($k->total_galeri);
        }


        //TODO : CARI ARTIKEL BERDASARKAN JENIS ARTIKEL
        $galeri = $this->galeri
            ->where("id_kategori", $current_kategori->id_kategori)
            ->with_user("fields:nama_user")
            ->with_kategori_galeri("fields:nama_kategori,route_kategori")
            ->order_by("id_galeri", "DESC")
            ->get_all();

        $data["current_kategori"]   = $current_kategori;
        $data["kategori_galeri"]    = $kategori_galeri;
        $data["galeri"]             = $galeri;
        $data["SidebarType"]        = "mini-sidebar"; // You can change it full / mini-sidebar / iconbar / overlay
        $this->loadViewAdmin('website/galeri_desa', $data);
    }

    public function tambah_kategori_galeri()
    {
        $namaKategori   = $this->input->post('nama_kategori');
        $warnaKategori  = $this->input->post('warna');
        $cekRoute   = $this->kategori_galeri
            ->where("id_desa", $this->userData->id_desa)
            ->where("route_kategori", slug($namaKategori))
            ->count_rows();

        if ($cekRoute > 0) {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data kategori ' . $namaKategori . ' sudah ada, silahkan gunakan nama yang lain',
                'route_kategori'    => ''
            ]);
            die();
        }

        $dataInsert = [
            "id_desa"           => $this->userData->id_desa,
            "nama_kategori"     => $namaKategori,
            "warna_kategori"    => $warnaKategori,
            "route_kategori"    => slug($namaKategori)
        ];

        $insert = $this->kategori_galeri->insert($dataInsert);
        if ($insert > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data kategori galeri berhasil ditambahkan',
                'route_kategori'    => slug($namaKategori)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data kategori galeri gagal ditambahkan',
                'route_kategori'    => ''
            ]);
        }
    }

    public function edit_kategori_galeri()
    {
        $namaKategori = $this->input->post('nama_kategori');
        $warnaKategori  = $this->input->post('warna');

        $cekSebelumnya   = $this->kategori_galeri
            ->get($this->input->post('id_kategori'));

        $cekRoute   = $this->kategori_galeri
            ->where("id_desa", $this->userData->id_desa)
            ->where("route_kategori", slug($namaKategori))
            ->count_rows();

        if ($cekSebelumnya->nama_kategori != $namaKategori) {
            if ($cekRoute > 0) {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data kategori ' . $namaKategori . ' sudah ada, silahkan Gunakan nama yang lain',
                    'route_kategori'    => slug($namaKategori)
                ]);
                die();
            }
        }

        $dataUpdate = [
            "nama_kategori"     => $namaKategori,
            "route_kategori"    => slug($namaKategori),
            "warna_kategori"    => $warnaKategori
        ];

        $update = $this->kategori_galeri->update($dataUpdate, $this->input->post('id_kategori'));
        if ($update > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data kategori galeri berhasil di ubah',
                'route_kategori'    => slug($namaKategori)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data kategori galeri gagal di ubah',
                'route_kategori'    => ''
            ]);
        }
    }

    public function hapus_kategori_galeri()
    {
        $hapus = $this->kategori_galeri->delete($this->input->post("id_kategori"));
        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => "Data kategori galeri berhasil di hapus"
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => "Data kategori galeri gagal di hapus :("
            ]);
        }
    }


    //! BATAS ---------------------------------------------------------------------------------------------
    //TODO : GALERI GOES HERE!
    public function tambah_galeri_foto()
    {
        $cek_kategori_galeri   = $this->kategori_galeri
            ->get($this->input->post('id_kategori'));
        $namaKategori = $cek_kategori_galeri->nama_kategori;

        $dataInput = [
            "id_desa"               => $this->userData->id_desa,
            "id_user"               => $this->userData->id_user,
            "id_kategori"           => $this->input->post('id_kategori', TRUE),
            "is_active"             => 1,
            "tipe_galeri"           => 1,
            "keterangan_galeri"     => $this->input->post("keterangan_galeri")
        ];

        if (!empty($_FILES["isi_galeri"]["name"])) {
            $namaFile = underscore($namaKategori) . "_";
            $namaFile .= time() . "." . pathinfo($_FILES["isi_galeri"]["name"], PATHINFO_EXTENSION);

            $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa);
            $config = $this->getConfig($lokasi, $namaFile);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("isi_galeri")) {
                $dataInput["isi_galeri"]    = $namaFile;
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal upload galeri foto : ' . $this->upload->display_errors('', ''),
                    'route_kategori'    => slug($namaKategori)
                ]);
                die();
            }
        }

        $insert = $this->galeri->insert($dataInput);
        if ($insert > 0) {

            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Berhasil menambahkan galeri foto',
                'route_kategori'    => slug($namaKategori)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gagal menambahkan galeri foto'
            ]);
        }
    }

    public function ubah_galeri_foto()
    {
        $cek_kategori_galeri   = $this->kategori_galeri
            ->get($this->input->post('id_kategori'));
        $namaKategori = $cek_kategori_galeri->nama_kategori;

        $cek_galeri = $this->galeri
            ->get($this->input->post('id_galeri'));

        $dataUpdate = [
            "id_kategori"           => $this->input->post('id_kategori', TRUE),
            "is_active"             => 1,
            "tipe_galeri"           => 1,
            "keterangan_galeri"     => $this->input->post("keterangan_galeri")
        ];

        if (!empty($_FILES["isi_galeri"]["name"])) {
            $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa);
            if (is_file(FCPATH . $lokasi . $cek_galeri->isi_galeri)) {
                unlink(FCPATH . $lokasi . $cek_galeri->isi_galeri);
            }

            $namaFile = underscore($namaKategori) . "_";
            $namaFile .= time() . "." . pathinfo($_FILES["isi_galeri"]["name"], PATHINFO_EXTENSION);

            $config = $this->getConfig($lokasi, $namaFile);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("isi_galeri")) {
                $dataUpdate["isi_galeri"]    = $namaFile;
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal upload galeri foto : ' . $this->upload->display_errors('', ''),
                    'route_kategori'    => slug($namaKategori)
                ]);
                die();
            }
        }

        $update = $this->galeri->update($dataUpdate, $this->input->post('id_galeri', TRUE));
        if ($update > 0) {

            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Berhasil mengubah galeri foto',
                'route_kategori'    => slug($namaKategori)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gagal mengubah galeri foto'
            ]);
        }
    }

    public function tambah_galeri_video()
    {
        $cek_kategori_galeri   = $this->kategori_galeri
            ->get($this->input->post('id_kategori'));
        $namaKategori = $cek_kategori_galeri->nama_kategori;

        $dataInput = [
            "id_desa"               => $this->userData->id_desa,
            "id_user"               => $this->userData->id_user,
            "id_kategori"           => $this->input->post('id_kategori', TRUE),
            "is_active"             => 1,
            "tipe_galeri"           => 2,
            "isi_galeri"            => $this->input->post("isi_galeri"),
            "keterangan_galeri"     => $this->input->post("keterangan_galeri")
        ];

        $insert = $this->galeri->insert($dataInput);
        if ($insert > 0) {

            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Berhasil menambahkan galeri Video',
                'route_kategori'    => slug($namaKategori)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gagal menambahkan galeri Video'
            ]);
        }
    }

    public function ubah_galeri_video()
    {
        $cek_kategori_galeri   = $this->kategori_galeri
            ->get($this->input->post('id_kategori'));
        $namaKategori = $cek_kategori_galeri->nama_kategori;

        $dataUpdate = [
            "id_kategori"           => $this->input->post('id_kategori', TRUE),
            "isi_galeri"            => $this->input->post("isi_galeri"),
            "keterangan_galeri"     => $this->input->post("keterangan_galeri")
        ];

        $update = $this->galeri->update($dataUpdate, $this->input->post('id_galeri', TRUE));
        if ($update > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Berhasil mengubah galeri Video',
                'route_kategori'    => slug($namaKategori)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gagal mengubah galeri Video'
            ]);
        }
    }


    public function ubah_kategori_galeri()
    {
        $ubah = $this->galeri->update(
            ["id_kategori" => $this->input->post('id_kategori', TRUE)],
            $this->input->post('id_galeri', TRUE)
        );
        if ($ubah) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Berhasil ubah kategori galeri',
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gagal ubah kategori galeri :(',
            ]);
        }
    }

    public function ubah_status_galeri()
    {
        $currentGaleri = $this->galeri
            ->where("id_galeri", $this->input->post('id_galeri', TRUE))
            ->with_user("fields:nama_user")
            ->with_kategori("fields:nama_kategori,route_kategori")
            ->get();

        if ($currentGaleri) {
            $status = $currentGaleri->is_active == 1 ? 0 : 1;
            $ubah = $this->galeri->update(
                ["is_active" => $status],
                $currentGaleri->id_galeri
            );
            if ($ubah > 0) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Berhasil ubah status galeri',
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal ubah status galeri :(',
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => "Data galeri tidak ditemukan :("
            ]);
        }
    }

    public function hapus_galeri()
    {
        $hapus = $this->galeri->delete($this->input->post('id_galeri', TRUE));
        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => "Data galeri berhasil di hapus"
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => "Data galeri gagal di hapus :("
            ]);
        }
    }

    public function getdata_galeri()
    {
        $ambil_galeri   = $this->galeri
            ->get($this->input->post('id_galeri'));

        // d($ambil_galeri);
        $kategori_galeri   = $this->kategori_galeri
            ->where("id_desa", $this->userData->id_desa)
            ->get_all();

        $image = isset($ambil_galeri->isi_galeri) ? asset("file/") . underscore($this->userData->nama_desa) . '/' . $ambil_galeri->isi_galeri : asset("website/img/default-galeri.jpg");

        $id_galeri = $ambil_galeri->id_galeri;

        $output = '';
        foreach ($kategori_galeri as $x) {
            $output .= '<option value="' . $x->id_kategori . '"';
            if ($x->id_kategori == $ambil_galeri->id_kategori) {
                $output .= 'selected ';
            }

            $output .= '>' . $x->nama_kategori . '</option>';
        }

        $keterangan = $ambil_galeri->keterangan_galeri;


        echo json_encode([
            'isi_galeri'                  => $image,
            'id_galeri'                   => $id_galeri,
            'id_kategori'                 => $output,
            'keterangan_galeri'           => $keterangan
        ]);
    }

    public function getdata_video()
    {
        $ambil_galeri   = $this->galeri
            ->get($this->input->post('id_galeri'));

        // d($ambil_galeri);
        $kategori_galeri   = $this->kategori_galeri
            ->where("id_desa", $this->userData->id_desa)
            ->get_all();


        $isi_galeri = $ambil_galeri->isi_galeri;
        $id_galeri = $ambil_galeri->id_galeri;

        $output = '';
        foreach ($kategori_galeri as $x) {
            $output .= '<option value="' . $x->id_kategori . '"';
            if ($x->id_kategori == $ambil_galeri->id_kategori) {
                $output .= 'selected ';
            }

            $output .= '>' . $x->nama_kategori . '</option>';
        }

        $keterangan = $ambil_galeri->keterangan_galeri;


        echo json_encode([
            'isi_galeri'                  => $isi_galeri,
            'id_galeri'                   => $id_galeri,
            'id_kategori'                 => $output,
            'keterangan_galeri'           => $keterangan
        ]);
    }


    //! BATAS ---------------------------------------------------------------------------------------------
    //TODO : ARTIKEL GOES HERE!

    public function tambah_artikel()
    {
        $kategori_artikel   = $this->kategori
            ->where("id_desa", $this->userData->id_desa)
            ->get_all();

        $data["kategori_artikel"]   = $kategori_artikel;
        $data["SidebarType"]        = "mini-sidebar"; // You can change it full / mini-sidebar / iconbar / overlay
        $this->loadViewAdmin('website/tambah_artikel', $data);
    }

    public function proses_tambah_artikel()
    {
        $terakhir = $this->artikel
            ->where("id_desa", $this->userData->id_desa)
            ->fields("no_artikel")
            ->order_by("id_artikel", "DESC")
            ->limit(1)
            ->get();

        $dataArtikel = [
            "id_desa"               => $this->userData->id_desa,
            "id_user"               => $this->userData->id_user,
            "id_kategori"           => $this->input->post('id_kategori', TRUE),
            "no_artikel"            => $terakhir ? ($terakhir->no_artikel + 1) : 0,
            "judul_artikel"         => htmlentities($this->input->post('judul_artikel', TRUE), ENT_QUOTES),
            "isi_artikel"           => validasi_input_artikel($this->input->post('isi_artikel', TRUE)),
            "slug_artikel"          => $this->getUniqueSlug($this->input->post('judul_artikel', TRUE)),
            "namalampiran_artikel"  => $this->input->post('nama_dokumen'),
        ];

        if (!empty($_FILES["file_gambar_headline"]["name"])) {

            $namaFile = slug($this->input->post('judul_artikel')) . "-";
            $namaFile .= time() . "." . pathinfo($_FILES["file_gambar_headline"]["name"], PATHINFO_EXTENSION);
            $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa);
            $config = $this->getConfig($lokasi, $namaFile);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("file_gambar_headline")) {
                $dataArtikel["headline_artikel"]    = $namaFile;
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal upload Headline : ' . $this->upload->display_errors('', ''),
                    'redirect'          => base_url('website/artikel'),
                ]);
                die();
            }
        }

        if (!empty($_FILES["file_lampiran"]["name"])) {
            $namaDokumen = time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
            $lokasiDokumen = LOKASI_FILE . underscore($this->userData->nama_desa);

            $config2  = [
                "upload_path"       => $lokasiDokumen,
                "allowed_types"     => '*',
                "max_size"          => 5120, // 5 MB
                "file_ext_tolower"  => FALSE,
                "overwrite"         => TRUE,
                "remove_spaces"     => TRUE,
                "file_name"         => $namaDokumen
            ];

            $this->load->library('upload', $config2);
            $this->upload->initialize($config2);

            if ($this->upload->do_upload("file_lampiran")) {
                $dataArtikel["lampiran_artikel"]        = $namaDokumen;
                $dataArtikel["namalampiran_artikel"]    = !empty($this->input->post('nama_dokumen')) ? $this->input->post('nama_dokumen') : $namaDokumen;
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal upload lampiran : ' . $this->upload->display_errors('', ''),
                    'redirect'          => base_url('website/artikel'),
                ]);
                die();
            }
        }

        $insert = $this->artikel->insert($dataArtikel);
        if ($insert > 0) {
            //TODO : CARI BUAT REDIRECT :V        
            $redirect = $this->kategori->get($this->input->post('id_kategori', TRUE));

            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Berhasil menambahkan artikel',
                'redirect'          => base_url('website/artikel/' . $redirect->route_kategori),
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gagal menambahkan artikel',
                'redirect'          => base_url('website/artikel'),
            ]);
        }
    }

    public function getUniqueSlug($judul)
    {
        $slug = slug($judul);
        $cekSlug        = $this->db->where(["id_desa" => $this->userData->id_desa])
            ->like("slug_artikel", $slug, "after")->get("artikel")->num_rows();
        return $cekSlug > 0 ? $slug . "-" . $cekSlug : $slug;
    }

    public function upload_foto_artikel()
    {
        $terakhir = $this->artikel
            ->where("id_desa", $this->userData->id_desa)
            ->fields("no_artikel")
            ->order_by("id_artikel", "DESC")
            ->limit(1)
            ->get();

        $namaFile = ($terakhir->no_artikel + 1) . "-";
        $namaFile .= time() . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

        $dataInsert = [
            "id_desa"       => $this->userData->id_desa,
            "no_artikel"    => $terakhir->no_artikel + 1,
            "nama_file"     => $namaFile,
        ];

        $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa);
        $config = $this->getConfig($lokasi, $namaFile);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload("image");

        if ($this->upload->do_upload("image")) {
            $this->file->insert($dataInsert);
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Foto berhasil di upload',
                'url'               => base_url($lokasi . "/" . $namaFile)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => $this->upload->display_errors('', ''),
                'url'               => ""
            ]);
        }
    }

    public function hapus_foto_artikel()
    {
        $image = $this->input->post('image');
        $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa) . "/";
        $file_name = str_replace(base_url($lokasi), '', $image);

        $this->file
            ->where(["nama_file" => $file_name, "id_desa" => $this->userData->id_desa])
            ->delete();
        if (is_file(FCPATH . $lokasi . $file_name)) {
            if (unlink(FCPATH . $lokasi . $file_name)) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Foto berhasil di hapus',
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Foto gagal di hapus',
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Foto tidak ditemukan',
            ]);
        }
    }

    public function ubah_artikel($slugArtikel = NULL)
    {
        $currentArtikel = $this->artikel
            ->where([
                "id_desa"       => $this->userData->id_desa,
                "slug_artikel"  => $slugArtikel
            ])->get();
        if (!$currentArtikel) redirect(base_url("website/artikel"));

        $kategori_artikel   = $this->kategori
            ->where("id_desa", $this->userData->id_desa)
            ->get_all();

        $artikel = $this->artikel
            ->where("id_artikel", $currentArtikel->id_artikel)
            ->with_user("fields:nama_user")
            ->with_kategori("fields:nama_kategori,route_kategori")
            ->get();

        $data["artikel"]            = $artikel;
        $data["kategori_artikel"]   = $kategori_artikel;
        $data["SidebarType"]        = "mini-sidebar"; // You can change it full / mini-sidebar / iconbar / overlay
        $this->loadViewAdmin('website/edit_artikel', $data);
    }

    public function proses_ubah_artikel()
    {
        $currentArtikel = $this->artikel
            ->where("id_artikel", $this->input->post('id_artikel', TRUE))
            ->with_user("fields:nama_user")
            ->with_kategori("fields:nama_kategori,route_kategori")
            ->get();

        $dataUpdate = [
            "id_kategori"           => $this->input->post('id_kategori', TRUE),
            "judul_artikel"         => htmlentities($this->input->post('judul_artikel', TRUE), ENT_QUOTES),
            "isi_artikel"           => validasi_input_artikel($this->input->post('isi_artikel', TRUE)),
            // "slug_artikel"          => $this->getUniqueSlug($this->input->post('judul_artikel', TRUE)), //BIAR URLNYA GA GANTI
            "namalampiran_artikel"  => $this->input->post('nama_dokumen'),
        ];

        if (!empty($_FILES["file_gambar_headline"]["name"])) {

            $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa);

            if (is_file(FCPATH . $lokasi . $currentArtikel->headline_artikel)) {
                unlink(FCPATH . $lokasi . $currentArtikel->headline_artikel);
            }

            $namaFile = slug($this->input->post('judul_artikel')) . "-";
            $namaFile .= time() . "." . pathinfo($_FILES["file_gambar_headline"]["name"], PATHINFO_EXTENSION);

            $config = $this->getConfig($lokasi, $namaFile);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("file_gambar_headline")) {
                $dataUpdate["headline_artikel"]    = $namaFile;
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal upload Headline : ' . $this->upload->display_errors('', ''),
                    'redirect'          => base_url('website/artikel'),
                ]);
                die();
            }
        }

        if (!empty($_FILES["file_lampiran"]["name"])) {
            $namaDokumen = time() . "." . pathinfo($_FILES["file_lampiran"]["name"], PATHINFO_EXTENSION);
            $lokasiDokumen = LOKASI_FILE . underscore($this->userData->nama_desa);

            if (is_file(FCPATH . $lokasiDokumen . $currentArtikel->lampiran_artikel)) {
                unlink(FCPATH . $lokasiDokumen . $currentArtikel->lampiran_artikel);
            }

            $config2  = [
                "upload_path"       => $lokasiDokumen,
                "allowed_types"     => '*',
                "max_size"          => 5120, // 5 MB
                "file_ext_tolower"  => FALSE,
                "overwrite"         => TRUE,
                "remove_spaces"     => TRUE,
                "file_name"         => $namaDokumen
            ];

            $this->load->library('upload', $config2);
            $this->upload->initialize($config2);

            if ($this->upload->do_upload("file_lampiran")) {
                $dataUpdate["lampiran_artikel"]        = $namaDokumen;
                $dataUpdate["namalampiran_artikel"]    = !empty($this->input->post('nama_dokumen')) ? $this->input->post('nama_dokumen', TRUE) : $namaDokumen;
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal upload lampiran : ' . $this->upload->display_errors('', ''),
                    'redirect'          => base_url('website/artikel'),
                ]);
                die();
            }
        }

        $update = $this->artikel->update($dataUpdate, $this->input->post('id_artikel', TRUE));
        if ($update > 0) {
            //TODO : CARI BUAT REDIRECT :V        
            $redirect = $this->kategori->get($this->input->post('id_kategori', TRUE));

            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Berhasil update artikel',
                'redirect'          => base_url('website/artikel/' . $redirect->route_kategori),
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gagal update artikel',
                'redirect'          => base_url('website/artikel'),
            ]);
        }
    }

    public function hapus_artikel()
    {
        $hapus = $this->artikel->delete($this->input->post('id_artikel', TRUE));
        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => "Data artikel berhasil di hapus"
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => "Data artikel gagal di hapus :("
            ]);
        }
    }

    public function ubah_kategori_artikel()
    {
        $ubah = $this->artikel->update(
            ["id_kategori" => $this->input->post('id_kategori', TRUE)],
            $this->input->post('id_artikel', TRUE)
        );
        if ($ubah) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Berhasil ubah kategori artikel',
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gagal ubah kategori artikel :(',
            ]);
        }
    }

    public function ubah_status_artikel()
    {
        $currentArtikel = $this->artikel
            ->where("id_artikel", $this->input->post('id_artikel', TRUE))
            ->with_user("fields:nama_user")
            ->with_kategori("fields:nama_kategori,route_kategori")
            ->get();

        if ($currentArtikel) {
            $status = $currentArtikel->is_active == 1 ? 0 : 1;
            $ubah = $this->artikel->update(
                ["is_active" => $status],
                $this->input->post('id_artikel', TRUE)
            );
            if ($ubah) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Berhasil ubah status artikel',
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal ubah status artikel :(',
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => "Data artikel tidak ditemukan :("
            ]);
        }
    }

    //! BATAS =======================================================================================
    //TODO : KOMPONEN / KONTEN GOES HERE !!

    public function konten($jenisKomponen = NULL)
    {
        $listKomponen = [
            "sambutan",
            "kontak-penting",
            "sosial-media",
            "background-headline-artikel",
            "background-footer"
        ];
        if (empty($jenisKomponen) || !in_array($jenisKomponen, $listKomponen)) {
            redirect(base_url('website/konten/' . $listKomponen[0]));
        }        

        $data["sosmed"]             = $this->sosmed->get(["id_desa" => $this->userData->id_desa]);
        $data["kontak"]             = $this->kontak->where("id_desa", $this->userData->id_desa)->order_by("is_favorite", "DESC")->get_all();
        $data["headlineArtikel"]    = $this->headline->get(["id_desa" => $this->userData->id_desa, "jenis_headline" => "artikel"]);
        $data["headlineFooter"]     = $this->headline->get(["id_desa" => $this->userData->id_desa, "jenis_headline" => "footer"]);
        $data["sambutan"]           = $this->sambutan->get(["id_desa" => $this->userData->id_desa]);
        $data["jenisKomponen"]      = $jenisKomponen;
        $this->loadViewAdmin("website/komponen/list_komponen", $data);
    }

    //* SAMBUTAN
    public function update_sambutan()
    {
        $sukses         = TRUE;
        $cekSambutan    = $this->sambutan->get(["id_desa" => $this->userData->id_desa]);

        $data = [
            "ketfoto_sambutan"      => $this->input->post("ket_foto", TRUE),
            "video_sambutan"        => $this->input->post("video_sambutan", TRUE),
            "judul_sambutan"        => $this->input->post("judul_sambutan", TRUE),
            "isi_sambutan"          => $this->input->post("isi_sambutan", TRUE),
            "penyambut_sambutan"    => $this->input->post("nama_penyambut", TRUE),
            "jabatan_sambutan"      => $this->input->post("jabatan", TRUE),
        ];

        if (!empty($_FILES["foto_sambutan"]["name"])) {
            //TODO : UPLOAD FOTO
            $namaFile = underscore($this->userData->nama_desa) . "_";
            $namaFile .= "foto_sambutan_";
            $namaFile .= time() . "." . pathinfo($_FILES["foto_sambutan"]["name"], PATHINFO_EXTENSION);

            $config = $this->getConfig(LOKASI_ASSET_DESA, $namaFile);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("foto_sambutan")) {
                //TODO : HAPUS FOTO LAMA
                if ($cekSambutan) {
                    if (is_file(FCPATH . LOKASI_ASSET_DESA . $cekSambutan->foto_sambutan)) {
                        unlink(FCPATH . LOKASI_ASSET_DESA . $cekSambutan->foto_sambutan);
                    }
                }

                $data["foto_sambutan"]  = $namaFile;
            } else {
                $sukses = FALSE;
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => $this->upload->display_errors('', '')
                ]);
            }
        }

        if ($sukses) {
            if ($cekSambutan) {
                //TODO : UPDATE
                $update = $this->sambutan->update($data, $cekSambutan->id_sambutan);
                if ($update > 0) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => "Berhasil memperbaharui data sambutan"
                    ]);
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => "Gagal memperbaharui data sambutan"
                    ]);
                }
            } else {
                //TODO : INSERT
                $data["id_desa"]    = $this->userData->id_desa;
                $insert = $this->sambutan->insert($data);
                if ($insert > 0) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => "Berhasil menambah data sambutan"
                    ]);
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => "Gagal menambah data sambutan"
                    ]);
                }
            }
        }
    }

    //* KONTAK
    public function proses_tambah_kontak()
    {
        $dataInsert = [
            "id_desa"       => $this->userData->id_desa,
            "nama_kontak"   => $this->input->post("nama_kontak", TRUE),
            "nomor_kontak"  => $this->input->post("nomor_kontak", TRUE)
        ];

        $cekNomor = $this->kontak->get([
            "id_desa"       => $this->userData->id_desa,
            "nomor_kontak"  => $this->input->post("nomor_kontak", TRUE),
        ]);


        if (!$cekNomor) {
            $insert = $this->kontak->insert($dataInsert);
            if ($insert > 0) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data kontak berhasil ditambahkan',
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data kontak gagal ditambahkan',
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Nomor sudah terdaftar dengan nama ' . $cekNomor->nama_kontak,
            ]);
        }
    }

    public function proses_edit_kontak()
    {
        $dataUpdate = [
            "nama_kontak"   => $this->input->post("nama_kontak", TRUE),
            "nomor_kontak"  => $this->input->post("nomor_kontak", TRUE),
        ];

        $cekNomor = $this->kontak->get([
            "id_desa"       => $this->userData->id_desa,
            "nomor_kontak"  => $this->input->post("nomor_kontak", TRUE),
        ]);

        if (!$cekNomor) {
            $update = $this->kontak->update($dataUpdate, $this->input->post("id_kontak", TRUE));
            if ($update) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Berhasil ubah data kontak',
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal ubah data kontak',
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Nomor sudah terdaftar dengan nama ' . $cekNomor->nama_kontak,
            ]);
        }
    }

    public function hapus_kontak()
    {
        $hapus = $this->kontak->delete($this->input->post('id_kontak', TRUE));
        if ($hapus > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => "Data kontak berhasil di hapus"
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => "Data kontak gagal di hapus :("
            ]);
        }
    }

    public function ubah_status_kontak()
    {
        $kontakLama = $this->kontak->get($this->input->post("id_kontak", TRUE));
        $dataUpdate = [
            "is_favorite"    => $kontakLama->is_favorite == 1 ? 0 : 1,
        ];

        $update = $this->kontak->update($dataUpdate, $this->input->post('id_kontak', TRUE));
        if ($update > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => "Data kontak berhasil di Ubah"
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => "Data kontak gagal di ubah Status"
            ]);
        }
    }

    //* SOSMED
    public function update_sosmed()
    {
        $dataUpdate = [
            "facebook_sosmed"       => $this->input->post("facebook", TRUE),
            "twitter_sosmed"        => $this->input->post("twitter", TRUE),
            "instagram_sosmed"      => $this->input->post("instagram", TRUE),
            "youtube_sosmed"        => $this->input->post("youtube", TRUE),
            "whatsapp_sosmed"       => $this->input->post("whatsapp", TRUE),
            "telegram_sosmed"       => $this->input->post("telegram", TRUE),
        ];

        $cekData = $this->sosmed->get(["id_desa" => $this->userData->id_desa]);

        if ($cekData) {
            //TODO : UPDATE
            $update = $this->sosmed->where(["id_desa" => $this->userData->id_desa])->update($dataUpdate);
            if ($update > 0) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => "Data Sosial Media berhasil di Ubah"
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => "Data Sosial Media Gagal di Ubah"
                ]);
            }
        } else {
            //TODO : INSERT
            $dataUpdate["id_desa"]      = $this->userData->id_desa;
            $insert = $this->sosmed->insert($dataUpdate);
            if ($insert > 0) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => "Data Sosial Media berhasil di Tambahkan"
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => "Data Sosial Media Gagal di Tambahkan"
                ]);
            }
        }
    }

    //* Background Headline Artikel
    public function update_headline_artikel()
    {
        $cekHeadline = $this->headline->get(
            [
                "id_desa"           => $this->userData->id_desa,
                "jenis_headline"    => "artikel"
            ]
        );

        $dataHeadline = [
            "id_desa"           => $this->userData->id_desa,
            "jenis_headline"    => "artikel",
        ];

        if (!empty($_FILES['file_gambar_headline']['name'])) {
            $namaFile = "headline-arrtikel-";
            $namaFile .= time() . "." . pathinfo($_FILES["file_gambar_headline"]["name"], PATHINFO_EXTENSION);
            $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa) . "/";
            $config = $this->getConfig($lokasi, $namaFile);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("file_gambar_headline")) {
                $dataHeadline["gambar_headline"]    = $namaFile;
                if ($cekHeadline) {
                    //TODO : UPDATE 
                    $update = $this->headline->update($dataHeadline, $cekHeadline->id_headline);
                    if ($update > 0) {
                        if (is_file(FCPATH . $lokasi . $cekHeadline->gambar_headline)) {
                            unlink(FCPATH . $lokasi . $cekHeadline->gambar_headline);
                        }
                        echo json_encode([
                            'response_code'     => 200,
                            'response_message'  => 'Berhasil memperbaharui headline artikel'
                        ]);
                    } else {
                        echo json_encode([
                            'response_code'     => 400,
                            'response_message'  => 'Gagal memperbaharui headline artikel'
                        ]);
                    }
                } else {
                    //TODO : INSERT
                    $insert = $this->headline->insert($dataHeadline);
                    if ($insert > 0) {
                        echo json_encode([
                            'response_code'     => 200,
                            'response_message'  => 'Berhasil menambah headline artikel'
                        ]);
                    } else {
                        echo json_encode([
                            'response_code'     => 400,
                            'response_message'  => 'Gagal menambah headline artikel'
                        ]);
                    }
                }
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal upload Headline : ' . $this->upload->display_errors('', ''),
                    'redirect'          => base_url('website/halaman-statis/profile-desa'),
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gambar headline wajib diisi!'
            ]);
        }
    }

    //* Background Footer    
    public function update_headline_footer()
    {
        $cekHeadline = $this->headline->get(
            [
                "id_desa"           => $this->userData->id_desa,
                "jenis_headline"    => "footer"
            ]
        );

        $dataHeadline = [
            "id_desa"           => $this->userData->id_desa,
            "jenis_headline"    => "footer",
        ];

        if (!empty($_FILES['file_gambar_headline']['name'])) {
            $namaFile = "headline-footer-";
            $namaFile .= time() . "." . pathinfo($_FILES["file_gambar_headline"]["name"], PATHINFO_EXTENSION);
            $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa) . "/";
            $config = $this->getConfig($lokasi, $namaFile);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("file_gambar_headline")) {
                $dataHeadline["gambar_headline"]    = $namaFile;
                if ($cekHeadline) {
                    //TODO : UPDATE 
                    $update = $this->headline->update($dataHeadline, $cekHeadline->id_headline);
                    if ($update > 0) {
                        if (is_file(FCPATH . $lokasi . $cekHeadline->gambar_headline)) {
                            unlink(FCPATH . $lokasi . $cekHeadline->gambar_headline);
                        }
                        echo json_encode([
                            'response_code'     => 200,
                            'response_message'  => 'Berhasil memperbaharui footer'
                        ]);
                    } else {
                        echo json_encode([
                            'response_code'     => 400,
                            'response_message'  => 'Gagal memperbaharui footer'
                        ]);
                    }
                } else {
                    //TODO : INSERT
                    $insert = $this->headline->insert($dataHeadline);
                    if ($insert > 0) {
                        echo json_encode([
                            'response_code'     => 200,
                            'response_message'  => 'Berhasil menambah footer'
                        ]);
                    } else {
                        echo json_encode([
                            'response_code'     => 400,
                            'response_message'  => 'Gagal menambah footer'
                        ]);
                    }
                }
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal upload Footer : ' . $this->upload->display_errors('', '')
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gambar Footer wajib diisi!'
            ]);
        }
    }

    public function reset_headline()
    {
        $headline   = $this->headline->get($this->input->post('id_headline', TRUE));
        $hapus      = $this->headline->delete($this->input->post('id_headline', TRUE));
        if ($hapus > 0) {
            $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa) . "/";
            if (is_file(FCPATH . $lokasi . $headline->gambar_headline)) {
                unlink(FCPATH . $lokasi . $headline->gambar_headline);
            }
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Berhasil reset ke pengaturan awal'
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Gagal reset ke pengaturan awal'
            ]);
        }
    }

    //! BATAS =======================================================================================
    public function halaman_statis($jenisHalaman = NULL)
    {
        $listHalaman = [
            "profile-desa",
            "visi-misi"
        ];
        if (empty($jenisHalaman) || !in_array($jenisHalaman, $listHalaman)) {
            redirect(base_url('website/halaman-statis/' . $listHalaman[0]));
        }

        $profile = $this->halaman->get(
            [
                "id_desa"       => $this->userData->id_desa,
                "jenis_halaman" => "profile-desa"
            ]
        );

        $visiMisi = $this->halaman->get(
            [
                "id_desa"       => $this->userData->id_desa,
                "jenis_halaman" => "visi-misi"
            ]
        );

        $data["visiMisi"]       = $visiMisi;
        $data["profile"]        = $profile;
        $data["jenisHalaman"]   = $jenisHalaman;
        $this->loadViewAdmin("website/halaman_statis/list_halaman", $data);
    }

    //* PROFILE DESA
    public function upload_foto_artikel2()
    {
        $namaFile = "profile-desa-" . $this->userData->id_desa . "-" . underscore($this->userData->nama_desa);
        $namaFile .= time() . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

        $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa);
        $config = $this->getConfig($lokasi, $namaFile);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload("image");

        if ($this->upload->do_upload("image")) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Foto berhasil di upload',
                'url'               => base_url($lokasi . "/" . $namaFile)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => $this->upload->display_errors('', ''),
                'url'               => ""
            ]);
        }
    }

    public function hapus_foto_artikel2()
    {
        $image = $this->input->post('image');
        $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa) . "/";
        $file_name = str_replace(base_url($lokasi), '', $image);

        if (is_file(FCPATH . $lokasi . $file_name)) {
            if (unlink(FCPATH . $lokasi . $file_name)) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Foto berhasil di hapus',
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Foto gagal di hapus',
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Foto tidak ditemukan',
            ]);
        }
    }

    public function update_profile_desa()
    {
        $cekHalaman = $this->halaman->get(
            [
                "id_desa"       => $this->userData->id_desa,
                "jenis_halaman" => "profile-desa"
            ]
        );

        $dataHalaman = [
            "jenis_halaman"     => "profile-desa",
            "isi_halaman"       => $this->input->post("isi_artikel", TRUE)
        ];
        $lokasi = "";
        if (!empty($_FILES['file_gambar_headline']['name'])) {
            //TODO : UPLOAD FILE
            $namaFile = "profile-desa-";
            $namaFile .= time() . "." . pathinfo($_FILES["file_gambar_headline"]["name"], PATHINFO_EXTENSION);
            $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa) . "/";
            $config = $this->getConfig($lokasi, $namaFile);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("file_gambar_headline")) {
                $dataHalaman["headline_halaman"]    = $namaFile;
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal upload Headline : ' . $this->upload->display_errors('', ''),
                    'redirect'          => base_url('website/halaman-statis/profile-desa'),
                ]);
                die();
            }
        }

        if ($cekHalaman) {
            //TODO : UPDATE                

            $update = $this->halaman->update($dataHalaman, $cekHalaman->id_halaman);
            if ($update > 0) {
                //TODO : UNLINK FOTO
                if (is_file(FCPATH . $lokasi . $cekHalaman->headline_halaman)) {
                    unlink(FCPATH . $lokasi . $cekHalaman->headline_halaman);
                }

                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Berhasil memperbaharui halaman profile desa',
                    'redirect'          => base_url('website/halaman-statis/profile-desa'),
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal memperbaharui halaman profile desa',
                    'redirect'          => base_url('website/halaman-statis/profile-desa'),
                ]);
            }
        } else {
            //TODO : INSERT
            $dataHalaman["id_desa"] = $this->userData->id_desa;
            $insert = $this->halaman->insert($dataHalaman);
            if ($insert > 0) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Berhasil menambah halaman profile desa',
                    'redirect'          => base_url('website/halaman-statis/profile-desa'),
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal menambah halaman profile desa',
                    'redirect'          => base_url('website/halaman-statis/profile-desa'),
                ]);
            }
        }
    }

    //* VISI MISI
    public function upload_foto_artikel3()
    {
        $namaFile = "visi-misi-" . $this->userData->id_desa . "-" . underscore($this->userData->nama_desa);
        $namaFile .= time() . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

        $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa);
        $config = $this->getConfig($lokasi, $namaFile);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload("image");

        if ($this->upload->do_upload("image")) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Foto berhasil di upload',
                'url'               => base_url($lokasi . "/" . $namaFile)
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => $this->upload->display_errors('', ''),
                'url'               => ""
            ]);
        }
    }

    public function hapus_foto_artikel3()
    {
        $image = $this->input->post('image');
        $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa) . "/";
        $file_name = str_replace(base_url($lokasi), '', $image);

        if (is_file(FCPATH . $lokasi . $file_name)) {
            if (unlink(FCPATH . $lokasi . $file_name)) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Foto berhasil di hapus',
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Foto gagal di hapus',
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Foto tidak ditemukan',
            ]);
        }
    }

    public function update_visi_misi()
    {
        // d($_FILES);
        $cekHalaman = $this->halaman->get(
            [
                "id_desa"       => $this->userData->id_desa,
                "jenis_halaman" => "visi-misi"
            ]
        );

        $dataHalaman = [
            "jenis_halaman"     => "visi-misi",
            "isi_halaman"       => $this->input->post("isi_artikel", TRUE)
        ];
        $lokasi = "";
        if (!empty($_FILES['file_gambar_headline']['name'])) {
            //TODO : UPLOAD FILE
            $namaFile = "visi-misi-";
            $namaFile .= time() . "." . pathinfo($_FILES["file_gambar_headline"]["name"], PATHINFO_EXTENSION);
            $lokasi = LOKASI_FILE . underscore($this->userData->nama_desa) . "/";
            $config = $this->getConfig($lokasi, $namaFile);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("file_gambar_headline")) {
                $dataHalaman["headline_halaman"]    = $namaFile;
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal upload Headline : ' . $this->upload->display_errors('', ''),
                    'redirect'          => base_url('website/halaman-statis/visi-misi'),
                ]);
                die();
            }
        }

        if ($cekHalaman) {
            //TODO : UPDATE    
            $update = $this->halaman->update($dataHalaman, $cekHalaman->id_halaman);
            if ($update > 0) {
                //TODO : UNLINK FOTO
                if (is_file(FCPATH . $lokasi . $cekHalaman->headline_halaman)) {
                    unlink(FCPATH . $lokasi . $cekHalaman->headline_halaman);
                }
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Berhasil memperbaharui halaman visi misi',
                    'redirect'          => base_url('website/halaman-statis/visi-misi'),
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal memperbaharui halaman visi misi',
                    'redirect'          => base_url('website/halaman-statis/visi-misi'),
                ]);
            }
        } else {
            //TODO : INSERT
            $dataHalaman["id_desa"] = $this->userData->id_desa;
            $insert = $this->halaman->insert($dataHalaman);
            if ($insert > 0) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Berhasil menambah halaman visi misi',
                    'redirect'          => base_url('website/halaman-statis/visi-misi'),
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Gagal menambah halaman visi misi',
                    'redirect'          => base_url('website/halaman-statis/visi-misi'),
                ]);
            }
        }
    }
}
