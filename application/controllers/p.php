<?php
defined('BASEPATH') or exit('No direct script access allowed');

class p extends CI_Controller
{
    public function index()
    {

        $data = [
            "path" => "Kecamatan/index",
            "script" => "Kecamatan/script"
        ];
        $this->load->view('Router/route', $data);
    }
    public function UserKecamatanAction()
    {
        $data = $_POST;
        if (!empty($data['kode_kecamatan']) && $data['kode_kecamatan'] != "") {
            $this->db->join("user", "user.id_user = kecamatan.id_user");
            $this->db->where("kecamatan.kode_kecamatan", $data['kode_kecamatan']);
            $dataUsKecamatan = $this->db->get_where("kecamatan")->row_array();

            $this->db->where("kode_kecamatan", $data['kode_kecamatan']);
            $res = $this->db->update("kecamatan", [
                "nama_kecamatan" => $data['nama_kecamatan'],
                "nama_camat"     => $data['nama_camat']
            ]);

            $user = [
                "username" => $data['username'],
                "role"     => "KECAMATAN",
            ];
            if (!empty($data['password']) && $data['password'] != "") {
                $user += ["password" => md5($data['password'])];
            }
            $this->db->where("id_user",  $dataUsKecamatan['id_user']);
            $this->db->update("user", $user);

            if ($res) {
                $this->session->set_flashdata("success", "Data berhasil diubah");
                redirect(base_url("MUser/index"));
            } else {
                $this->session->set_flashdata("error", "Data gagal diubah");
                redirect(base_url("MUser/index"));
            }
        } else {
            $user = [
                "username" => $data['username'],
                "password" => md5($data['password']),
                "role"     => "KECAMATAN",
                "status"   => "active",
                "foto"     => "default.jpg",
            ];
            if ($this->db->get_where("user", ["username" => $data['username']])->num_rows() > 0) {
                $this->session->set_flashdata("error", "Username sudah ada");
                redirect(base_url("MUser/user_desa"));
                return;
            }
            $this->db->insert("user", $user);
            $res = $this->db->insert("kecamatan", [
                "id_user" => $this->db->get_where("user", $user)->row_array()['id_user'],
                "nama_kecamatan" => $data['nama_kecamatan'],
                "nama_camat"     => $data['nama_camat']
            ]);
            if ($res) {
                $this->session->set_flashdata("success", "Data berhasil ditambah");
                redirect(base_url("MUser/index"));
            } else {
                $this->session->set_flashdata("error", "Data gagal ditambah");
                redirect(base_url("MUser/index"));
            }
        }
    }
    public function deleteUserKecamatan($id)
    {
        $this->db->delete("kecamatan", ["id_user" => $id]);
        $del = $this->db->delete("user", ["id_user" => $id]);
        if ($del) {
            $this->session->set_flashdata("success", "Data berhasil dihapus");
            redirect(base_url("MUser/index"));
        } else {
            $this->session->set_flashdata("error", "Data gagal dihapus");
            redirect(base_url("MUser/index"));
        }
    }
    public function UserDesaAction()
    {
        $this->db->join("kecamatan", "kecamatan.id_user = user.id_user");
        $this->db->where("user.id_user", $this->session->userdata()['user']->id_user);
        $dataUsKecamatan = $this->db->get_where("user")->row_array();
        $data = $_POST;

        if (!empty($data['kode_desa']) && $data['kode_desa'] != "") {
            $this->db->select("*,desa.id_user as id_user");
            $this->db->join("desa", "desa.id_user = user.id_user");
            $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
            $this->db->where("desa.kode_desa", $data['kode_desa']);
            $dataUsdesa = $this->db->get_where("user")->row_array();
            $user = [
                "username" => $data['username'],
                "role"     => "DESA"
            ];
            if ($dataUsdesa['username'] != $data['username'] && $this->db->get_where("user", ["username" => $data['username']])->num_rows() > 0) {
                $this->session->set_flashdata("error", "Username sudah ada");
                redirect(base_url("MUser/user_desa"));
                return;
            }
            if (!empty($data['password']) && $data['password'] != "") {
                $user += ["password" => md5($data['password'])];
            }
            $this->db->where("id_user",  $dataUsdesa['id_user']);
            $this->db->update("user", $user);


            $this->db->where("kode_desa", $data['kode_desa']);
            $res = $this->db->update("desa", [
                "nama_desa" => $data['nama_desa'],
                "jenis" =>  $data['jenis'],
                "nama_kepala_desa" =>  $data['nama_kepala_desa'],
                "nip_kepaladesa" =>  $data['nip_kepaladesa'],
            ]);

            if ($res) {
                $this->session->set_flashdata("success", "Data berhasil diubah");
                redirect(base_url("MUser/user_desa"));
            } else {
                $this->session->set_flashdata("error", "Data gagal diubah");
                redirect(base_url("MUser/user_desa"));
            }
        } else {
            $user = [
                "username" => $data['username'],
                "password" => md5($data['password']),
                "role"     => "DESA",
                "status"   => "active",
                "foto"     => "default.jpg",
            ];
            if ($this->db->get_where("user", ["username" => $data['username']])->num_rows() > 0) {
                $this->session->set_flashdata("error", "Username sudah ada");
                redirect(base_url("MUser/user_desa"));
                return;
            }

            $this->db->insert("user", $user);

            $desa = [
                "id_user" => $this->db->get_where("user", $user)->row_array()['id_user'],
                "id_kecamatan" => $dataUsKecamatan['kode_kecamatan'],
                "nama_desa" => $data['nama_desa'],
                "jenis" =>  $data['jenis'],
                "nama_kepala_desa" =>  $data['nama_kepala_desa'],
                "nip_kepaladesa" =>  $data['nip_kepaladesa'],
            ];
            $res = $this->db->insert("desa", $desa);
            if ($res) {
                $this->session->set_flashdata("success", "Data berhasil ditambah");
                redirect(base_url("MUser/user_desa"));
            } else {
                $this->session->set_flashdata("error", "Data gagal ditambah");
                redirect(base_url("MUser/user_desa"));
            }
        }
    }
    public function deleteUserDesa($id)
    {
        $this->db->delete("desa", ["id_user" => $id]);
        $del = $this->db->delete("user", ["id_user" => $id]);
        if ($del) {
            $this->session->set_flashdata("success", "Data berhasil dihapus");
            redirect(base_url("MUser/index"));
        } else {
            $this->session->set_flashdata("error", "Data gagal dihapus");
            redirect(base_url("MUser/index"));
        }
    }
    public function validasi_masyarakat($id_user)
    {
        $this->db->where("id_user", $id_user);
        $this->db->update("user", ["status" => "active"]);
        $this->session->set_flashdata("success", "Data berhasil diubah");
        redirect(base_url("MUser/user_masyarakat"));
    }
    public function deleteUserPopleBlock($id_user)
    {
        $this->db->where("id_user", $id_user);
        $this->db->update("user", ["status" => "block"]);
        $this->session->set_flashdata("success", "Akun Di blikir");
        redirect(base_url("MUser/account_people"));
    }
    public function deleteUserPopleunBlock($id_user)
    {
        $this->db->where("id_user", $id_user);
        $this->db->update("user", ["status" => "active"]);
        $this->session->set_flashdata("success", "Akun Di unblikir");
        redirect(base_url("MUser/account_people_block"));
    }
    public function delete_user_masyarakat($id_user)
    {
        // delete masyarakat_pengusul & user
        $this->db->delete("masyarakat_pengusul", ["id_user" => $id_user]);
        $this->db->delete("user", ["id_user" => $id_user]);
        $this->session->set_flashdata("success", "Data berhasil dihapus");
        redirect(base_url("MUser/user_masyarakat"));
    }
}
