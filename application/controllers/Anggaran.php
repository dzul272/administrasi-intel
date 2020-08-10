<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggaran extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Tipeanggaran_model", "tipe_anggaran");
    }

    public function index()
    {
        $this->loadViewAdmin($this->router->fetch_class() . '/index');
    }

    public function tipe_anggaran()
    {
        $tipe_anggaran   = $this->tipe_anggaran
            ->where("id_desa", $this->userData->id_desa)
            ->order_by("id_tipeanggaran", "DESC")
            ->get_all();
        $data["tipe_anggaran"] = $tipe_anggaran;
        $this->loadViewAdmin($this->router->fetch_class() . '/tipe_anggaran', $data);
    }

    public function getdata_all()
    {
        $tipe_anggaran   = $this->tipe_anggaran
            ->where("id_desa", $this->userData->id_desa)
            ->order_by("id_tipeanggaran", "DESC")
            ->get_all();
        $output = '';
        $no = 1;
        foreach ($tipe_anggaran as $data) {
            $output .= '
            <tr>
                <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                <td style="padding: 5px;" class="align-middle">' . ce($data->nama_tipeanggaran) . '</td>
                <td style="padding: 5px;" class="align-middle">';
            if ($data->jenis_tipeanggaran == 1) {
                $output .= 'Pemasukan';
            } else {
                $output .= 'Pengeluaran';
            }
            $output .= '</td>
                <td style="padding: 5px;" class="align-middle text-center">
                    <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_tipeanggaran . '">Ubah</button>
                    <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" value="' . ce($data->nama_tipeanggaran) . '" data-id="' . $data->id_tipeanggaran . '">Hapus</button>
                </td>
            </tr>
            ';
        }

        return $output;
    }

    public function tambah_tipeanggaran()
    {
        $dataInsert = (object) $this->input->post();
        $dataInsert->id_desa = $this->userData->id_desa;
        $insert = $this->tipe_anggaran->insert($dataInsert);

        $tipe_anggaran   = $this->tipe_anggaran
            ->where("id_desa", $this->userData->id_desa)
            ->order_by("id_tipeanggaran", "DESC")
            ->get_all();
        $output = '';
        $no = 1;
        foreach ($tipe_anggaran as $data) {
            $output .= '
            <tr>
                <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                <td style="padding: 5px;" class="align-middle">' . ce($data->nama_tipeanggaran) . '</td>
                <td style="padding: 5px;" class="align-middle">';
            if ($data->jenis_tipeanggaran == 1) {
                $output .= 'Pemasukan';
            } else {
                $output .= 'Pengeluaran';
            }
            $output .= '</td>
                <td style="padding: 5px;" class="align-middle text-center">
                    <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="' . $data->id_tipeanggaran . '">Ubah</button>
                    <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" value="' . ce($data->nama_tipeanggaran) . '" data-id="' . $data->id_tipeanggaran . '">Hapus</button>
                </td>
            </tr>
            ';
        }

        if ($insert > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data tipe anggaran berhasil ditambahkan',
                'output'            => $output
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data tipe anggaran gagal ditambahkan',
                'output'            => $output
            ]);
        }
    }

    public function getdata_tipeanggaran()
    {
        $data   = $this->tipe_anggaran
            ->get($this->input->post('id_tipeanggaran'));

        $id                 = $data->id_tipeanggaran;
        $nama_tipeanggaran  = $data->nama_tipeanggaran;

        $output_jenis = '';
        $output_jenis .= '<option value="">Pilih Jenis Tipe Anggaran</option>';
        $output_jenis .= '<option value="1"';
        if ($data->jenis_tipeanggaran == 1) {
            $output_jenis .= 'selected ';
        }
        $output_jenis .= '>Pemasukan</option>';
        $output_jenis .= '<option value="2"';
        if ($data->jenis_tipeanggaran == 2) {
            $output_jenis .= 'selected ';
        }
        $output_jenis .= '>Pengeluaran</option>';

        echo json_encode([
            'id_tipeanggaran'     => $id,
            'nama_tipeanggaran'   => $nama_tipeanggaran,
            'jenis_tipeanggaran'  => $output_jenis
        ]);
    }

    public function ubah_tipeanggaran()
    {
        $id_tipeanggaran    = $this->input->post('id_tipeanggaran');
        $nama_tipeanggaran  = $this->input->post('nama_tipeanggaran');
        $dataUpdate         = (object) $this->input->post();
        unset($dataUpdate->id_tipeanggaran);
        $cekSebelumnya      = $this->tipe_anggaran
            ->get($id_tipeanggaran);

        $cekNama   = $this->tipe_anggaran
            ->where("id_desa", $this->userData->id_desa)
            ->where("nama_tipeanggaran", $nama_tipeanggaran)
            ->count_rows();

        if ($cekSebelumnya->nama_tipeanggaran != $nama_tipeanggaran) {
            if ($cekNama > 0) {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Data tipe ' . $this->input->post('nama_tipeanggaran') . ' sudah ada, silahkan Gunakan nama yang lain'
                ]);
                die();
            }
        }

        $update = $this->tipe_anggaran->update($dataUpdate, $id_tipeanggaran);
        $output = $this->getdata_all();

        if ($update > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data tipe anggaran berhasil di ubah',
                'output'            => $output
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data tipe anggaran gagal di ubah'
            ]);
        }
    }
}
