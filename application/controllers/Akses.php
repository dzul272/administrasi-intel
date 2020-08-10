<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Akses_model", "akses");
        $this->load->model("Role_model", "role");
        $this->load->model("RoleDetail_model", "roledetail");
        $this->load->model("User_model", "user");
    }

    public function index()
    {
        redirect(base_url($this->router->fetch_class() . '/pengguna'));
    }

    public function pengguna()
    {
        $pengguna = $this->user->getPengguna();
        $role = $this->role->tampilRole();

        $data["pengguna"] = $pengguna;
        $data["role"] = $role;
        $this->loadViewAdmin($this->router->fetch_class() . '/pengguna', $data);
    }

    public function tambah_pengguna()
    {
        $dataInput  = (object) $this->input->post();
        $password = (object) $this->input->post("password_user");
        $password2 = (object) $this->input->post("konfirmasi_password");
        $dataInput->id_desa = $this->userData->id_desa;

        if ($password != $password2) {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Konfirmasi Password Yang Anda Masukkan Salah'
            ]);
            // $this->session->set_flashdata("gagal", "Konfirmasi Password Yang Anda Masukkan Salah");
            // redirect(base_url("akses/pengguna"));
        } else {
            $data = $dataInput;
            unset($data->konfirmasi_password);
            $data->password_user = md5($dataInput->password_user);

            $insert_user = $this->user->insert_user($data);

            $pengguna = $this->user->getPengguna();
            $output = '';
            $no = 1;
            foreach ($pengguna as $data) {
                $output .= '
                <tr>
                    <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                    <td style="padding: 5px;" class="align-middle">' . ce($data->nama_user) . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->username_user . '</td>
                    <td style="padding: 5px;" class="align-middle">' . ce($data->nama_role) . '</td>
                    <td style="padding: 5px;" class="align-middle text-center">
                        <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Ubah</button>
                        <button class="btn btn-sm btn-primary waves-effect waves-light edit_password" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Password</button>
                        <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Hapus</button>
                    </td>
                </tr>
                ';
            }

            if ($insert_user) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Pengguna Berhasil Ditambahkan',
                    'output'            => $output
                ]);
                // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
                // redirect(base_url("akses/pengguna"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Pengguna Gagal Ditambahkan. Username sudah digunakan, silahkan gunakan username yang lain.',
                    'output'            => $output
                ]);
                // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
                // redirect(base_url("akses/pengguna"));
            }
        }
    }

    public function getdata_pengguna()
    {
        $dataInput  = (object) $this->input->post();
        $role = $this->role->tampilRole();
        $id = $dataInput->id_user;
        $data = $this->user->getPengguna($id);

        $output = '';

        foreach ($role as $key) {
            $output .= '<option value="' . $key->id_role . '"';
            if ($key->id_role == $data->id_role) {
                $output .= 'selected ';
            }

            $output .= '>' . ce($key->nama_role) . '</option>';
        }

        $id_user = $data->id_user;
        $nama_user = $data->nama_user;
        $username_user = $data->username_user;

        echo json_encode([
            'id_user'           => $id_user,
            'nama_user'         => $nama_user,
            'username_user'     => $username_user,
            'id_role'           => $output
        ]);
    }

    public function getdata_password()
    {
        $dataInput  = (object) $this->input->post();
        $id = $dataInput->id_user;
        $data = $this->user->getPengguna($id);

        $output = '';

        $output .= '
            <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Silahkan isi password pengguna baru disini</label>
                        <input type="hidden" name="id_user" value="' . $data->id_user . '">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password_user" id="password_user" placeholder="Minimal Password 8 Karakter" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Konfirmasi Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Minimal Password 8 Karakter" minlength="8" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="pass-btn">Simpan</button>
            </div>
            ';

        echo $output;
    }

    public function ubah_pengguna()
    {
        $dataInput  = (object) $this->input->post();

        $update_user = $this->user->update_user($dataInput, ["id_user" => $dataInput->id_user]);

        $pengguna = $this->user->getPengguna();
        $output = '';
        $no = 1;
        foreach ($pengguna as $data) {
            $output .= '
            <tr>
                <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                <td style="padding: 5px;" class="align-middle">' . ce($data->nama_user) . '</td>
                <td style="padding: 5px;" class="align-middle">' . $data->username_user . '</td>
                <td style="padding: 5px;" class="align-middle">' . ce($data->nama_role) . '</td>
                <td style="padding: 5px;" class="align-middle text-center">
                    <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Ubah</button>
                    <button class="btn btn-sm btn-primary waves-effect waves-light edit_password" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Password</button>
                    <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Hapus</button>
                </td>
            </tr>
            ';
        }

        $nama_user = ce($this->user->getPengguna($this->userData->id_user)->nama_user);

        if ($update_user > 0) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Pengguna Berhasil Diubah',
                'nama_user'         => $nama_user,
                'output'            => $output
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Diubah");
            // redirect(base_url("akses/pengguna"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Pengguna Gagal Diubah. Username tidak tersedia, silahkan gunakan username yang lain.',
                'output'            => $output
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Diubah");
            // redirect(base_url("akses/pengguna"));
        }
    }

    public function ubah_password()
    {
        $dataInput  = (object) $this->input->post();
        $password = (object) $this->input->post("password_user");
        $password2 = (object) $this->input->post("konfirmasi_password");

        if ($password != $password2) {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Konfirmasi Password Yang Anda Masukkan Salah'
            ]);
            // $this->session->set_flashdata("gagal", "Konfirmasi Password Yang Anda Masukkan Salah");
            // redirect(base_url("akses/pengguna"));
        } else {
            $databaru = $dataInput;
            unset($databaru->konfirmasi_password);
            $databaru->password_user = md5($dataInput->password_user);

            $update_user = $this->user->update_user($databaru, ["id_user" => $databaru->id_user]);

            $pengguna = $this->user->getPengguna();
            $output = '';
            $no = 1;
            foreach ($pengguna as $data) {
                $output .= '
                <tr>
                    <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                    <td style="padding: 5px;" class="align-middle">' . ce($data->nama_user) . '</td>
                    <td style="padding: 5px;" class="align-middle">' . $data->username_user . '</td>
                    <td style="padding: 5px;" class="align-middle">' . ce($data->nama_role) . '</td>
                    <td style="padding: 5px;" class="align-middle text-center">
                        <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Ubah</button>
                        <button class="btn btn-sm btn-primary waves-effect waves-light edit_password" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Password</button>
                        <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Hapus</button>
                    </td>
                </tr>
                ';
            }

            if ($update_user) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Password Pengguna Berhasil Diubah',
                    'output'            => $output
                ]);
                // $this->session->set_flashdata("sukses", "Password Berhasil Diubah");
                // redirect(base_url("akses/pengguna"));
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Password Pengguna Gagal Diubah',
                    'output'            => $output
                ]);
                // $this->session->set_flashdata("gagal", "Password Gagal Diubah");
                // redirect(base_url("akses/pengguna"));
            }
        }
    }

    public function hapus_pengguna()
    {
        $dataInput  = (object) $this->input->post();
        $total_user = $this->user->count();

        if ($dataInput->id_user != $this->userData->id_user) {
            if ($total_user > 1) {
                $delete_user = $this->user->delete_user(["id_user" => $dataInput->id_user]);
                $pengguna = $this->user->getPengguna();
                $output = '';
                $no = 1;
                foreach ($pengguna as $data) {
                    $output .= '
                    <tr>
                        <td style="padding: 5px;" class="align-middle text-center">' . $no++ . '</td>
                        <td style="padding: 5px;" class="align-middle">' . ce($data->nama_user) . '</td>
                        <td style="padding: 5px;" class="align-middle">' . $data->username_user . '</td>
                        <td style="padding: 5px;" class="align-middle">' . ce($data->nama_role) . '</td>
                        <td style="padding: 5px;" class="align-middle text-center">
                            <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Ubah</button>
                            <button class="btn btn-sm btn-primary waves-effect waves-light edit_password" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Password</button>
                            <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" style="width: 80px;" type="button" data-id="' . $data->id_user . '">Hapus</button>
                        </td>
                    </tr>
                    ';
                }

                if ($delete_user) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Dihapus',
                        'output'            => $output
                    ]);
                    // $this->session->set_flashdata("sukses", "Data Berhasil Dihapus");
                    // redirect(base_url("akses/pengguna"));
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data Gagal Dihapus',
                        'output'            => $output
                    ]);
                    // $this->session->set_flashdata("gagal", "Data Gagal Dihapus");
                    // redirect(base_url("akses/pengguna"));
                }
            } else {
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => 'Minimal Ada Satu Pengguna Dalam Satu ' . ce($this->userData->jenis_desa)
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Anda Tidak Dapat Menghapus Pengguna Yang Sedang Aktif'
            ]);
        }
        //----------------------
    }

    //! BATAS ---------------------------------------------------------------------------

    public function role()
    {
        $akses = $this->akses->getAkses();
        $role = $this->role->getRole();

        $data["akses"] = $akses;
        $data["role"] = $role;

        $this->loadViewAdmin($this->router->fetch_class() . '/role', $data);
    }

    public function tambah_role()
    {
        $dataInput  = (object) $this->input->post();
        $checkbox  = $this->input->post("hak_akses[]");
        $dataInput->id_desa = $this->userData->id_desa;
        // d($checkbox);
        // PROSES INSERT DATA KE TABEL ROLE
        $data = $dataInput;
        unset($data->hak_akses);
        $insert = $this->role->insert_role($data);

        // PROSES INSERT DATA KE TABEL ROLEDETAIL

        $jml_baris = count($checkbox);

        for ($i = 0; $i < $jml_baris; $i++) {
            $datadetail = $dataInput;
            unset($datadetail->nama_role, $data->hak_akses, $dataInput->id_desa);

            $datadetail->id_role = $insert;
            $datadetail->id_akses = $checkbox[$i];

            $insert_roledetail = $this->roledetail->insert_roledetail($datadetail); //Call the modal
        }

        if ($insert_roledetail) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Berhasil Ditambahkan'
            ]);
            // $this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan");
            // redirect(base_url("akses/role"));
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Ditambahkan'
            ]);
            // $this->session->set_flashdata("gagal", "Data Gagal Ditambahkan");
            // redirect(base_url("akses/role"));
        }
    }

    public function ubah_role()
    {
        // d($_POST);
        //TODO : UBAH NAMA ROLE DI TABLE ROLE
        $this->m_data->update(
            "role",                                                 //* Nama Table
            ["nama_role"    => $this->input->post("nama_role")],    //* Data
            ["id_role"      => $this->input->post('id_role')]       //* Kondisi
        );

        //TODO : HAPUS SEMUA DATA DI DETAIL ROLE WHERE ID_ROLE
        $this->m_data->delete(
            ["id_role" => $this->input->post('id_role')],
            "roledetail"
        );

        //TODO : INSERT INTO DETAIL ROLE
        if ($this->input->post("hak_akses")) {
            $dataRoleDetail = [];
            foreach ($this->input->post("hak_akses") as $data) {
                array_push(
                    $dataRoleDetail,
                    [
                        "id_role"   => $this->input->post('id_role'),
                        "id_akses"  => $data
                    ]
                );
            }
            $this->db->insert_batch("roledetail", $dataRoleDetail);
        }

        $nama_role = $this->input->post("nama_role");

        //TODO : REDIRECT WITH SEESSION FLASH
        // $this->session->set_flashdata("sukses", "Berhasil Ubah Role " . $this->input->post("nama_role"));
        // redirect(base_url("akses/role"));
        echo json_encode([
            'response_code'     => 200,
            'response_message'  => 'Data Role <b>' . $nama_role . '</b> Berhasil Diubah'
        ]);
    }

    public function hapus_role()
    {
        $cariRole = $this->role->tampilRole($this->input->post('id_role'));
        // d($_POST);
        //TODO : CEK ROLE INI DIGUNAIN OLEH USER GAK
        $cekRole    = $this->db->get_Where("user", ["id_role" => $this->input->post('id_role')])
            ->result();

        if (!$cekRole) {
            //TODO : HAPUS SEMUA DATA DI TABLE ROLEDETAIL WHERE ID ROLE
            $this->m_data->delete(
                ["id_role" => $this->input->post('id_role')],
                "roledetail"
            );

            //TODO : HAPUS SEMUA DATA DI TABLE ROLE WHERE ID ROLE
            $this->m_data->delete(
                ["id_role" => $this->input->post('id_role')],
                "role"
            );
            // $this->session->set_flashdata("sukses", "Berhasil Hapus Role <b>" . ce($this->input->post("nama_role")) . "</b>");
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Role <b>' . $cariRole->nama_role . '</b> Berhasil Dihapus'
            ]);
        } else {
            // $this->session->set_flashdata("gagal", "Gagal hapus role <b>" . ce($this->input->post("nama_role")) . "</b> karena role ini masih digunakan oleh pengguna lain");
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Role <b>' . $cariRole->nama_role . '</b> gagal dihapus karena role ini masih digunakan oleh pengguna lain'
            ]);
        }


        //TODO : REDIRECT WITH SEESSION FLASH

        // redirect(base_url("akses/role"));
    }
}
