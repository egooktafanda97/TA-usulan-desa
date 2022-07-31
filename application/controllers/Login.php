<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('auth/login');
    }
    public function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->db->get_where('user', ["username" => $username, "password" => md5($password)])->num_rows();
        if ($cek > 0) {
            $us = $this->db->get_where('user', ["username" => $username, "password" => md5($password)])->row();
            $data_session = array(
                'username' => $username,
                'status' => "login",
                "user" => $us,
                "role" => $us->role,
            );
            $this->session->set_userdata($data_session);
            redirect(base_url("Admin/index"));
        } else {
            redirect(base_url("Login"));
        }
    }
    public function auth_masyarakat()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->db->get_where('user', ["username" => $username, "password" => md5($password), "status" => "active"])->num_rows();
        if ($cek > 0 && $this->db->get_where('user', ["username" => $username, "password" => md5($password)])->row()->role == "MASYARAKAT") {
            $us = $this->db->get_where('user', ["username" => $username, "password" => md5($password)])->row();
            $data_session = array(
                'username' => $username,
                'status' => "login",
                "user" => $us,
                "role" => $us->role,
            );
            $this->session->set_userdata($data_session);
            redirect(base_url("welcome"));
        } else {
            $this->session->set_flashdata("error", "Username atau Password Salah / anda belum di verifikasi");
            redirect(base_url("welcome/login"));
        }
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url("Login"));
    }
    public function getDesa($id)
    {
        $this->db->select("*,desa.id_user as id_user");
        $this->db->join("desa", "desa.id_user = user.id_user");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.kode_kecamatan", $id);
        $dataUsdesa = $this->db->get_where("user")->result_array();
        echo json_encode($dataUsdesa);
    }
    public function registration()
    {
        // $up = up("foto", "assets/img/user/");
        $ktp = up("ktp", "assets/img/user/");
        $data = $_POST;
        $user = [
            "username" => $data['username'],
            "password" => md5($data['password']),
            "role"     => "MASYARAKAT",
            "status"   => "request",
            "foto"     => "default.jpg",
        ];

        if ($this->db->get_where("user", ["username" => $data['username']])->num_rows() > 0) {
            $this->session->set_flashdata("error", "Username sudah ada");
            redirect(base_url("welcome/regis/"));
            return;
        }
        $this->db->insert("user", $user);

        $data = [
            "id_user" => $this->db->get_where("user", $user)->row_array()['id_user'],
            "kode_desa" => $data['desa'],
            "nik" => $data['nik'],
            "nama_pengusul" => $data['nama_pengusul'],
            "no_telp" => $data['no_telp'],
            "dusun" => $data['dusun'],
            "rt_rw" => $data['rt_rw'],
            "tgl_lahir" => $data['tgl_lahir'],
            "alamat_lengap" => $data['alamat_lengap'],
            "foto_ktp" => !$ktp ? null : $ktp,
        ];
        $res = $this->db->insert("masyarakat_pengusul", $data);
        if ($res) {
            $this->session->set_flashdata("success", "Tunggu konfirmasi dari admin");
            redirect(base_url("Welcome/login"));
        } else {
            $this->session->set_flashdata("error", "Gagal registrasi");
            redirect(base_url("Welcome/regis"));
        }
    }
}
