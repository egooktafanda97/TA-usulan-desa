<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MUser extends CI_Controller
{
    public function index()
    {
        $kecamatan = $this->db->get_where("wilayah_kecamatan", ["kabupaten_id" => '1401'])->result_array();
        $this->db->join("user", "user.id_user = kecamatan.id_user");
        $dataUsKecamatan = $this->db->get_where("kecamatan")->result_array();

        $data = [
            "path" => "Kecamatan/index",
            "script" => "Kecamatan/script",
            "kecamatan" => $kecamatan,
            "data_kecamatan" => $dataUsKecamatan
        ];
        $this->load->view('Router/route', $data);
    }
    public function user_desa()
    {
        $this->db->join("desa", "desa.id_user = user.id_user");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $dataUsdesa = $this->db->get_where("user")->result_array();

        $data = [
            "path" => "Desa/index",
            "script" => "Desa/script",
            "data_desa" => $dataUsdesa
        ];
        $this->load->view('Router/route', $data);
    }
    public function user_masyarakat()
    {

        $data = [
            "path" => "Masyarakat/index",
            "script" => "Masyarakat/script",
            "data_akun_m" => $this->getdataMasyarakat(),
        ];
        $this->load->view('Router/route', $data);
    }
    public function getdataMasyarakat()
    {
        $this->db->select("*,masyarakat_pengusul.id_user as id_user");
        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_user = user.id_user");
        $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
        $this->db->where("user.status", "request");
        $res = $this->db->get_where("user")->result_array();
        return $res;
    }
    public function getdataMasyarakatBysesiDesa()
    {
        $this->db->select("*,masyarakat_pengusul.id_user as id_user");
        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_user = user.id_user");
        $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
        $this->db->where("user.status", "active");
        $res = $this->db->get_where("user")->result_array();
        return $res;
    }
    public function getdataMasyarakatBysesiDesaBLock()
    {
        $this->db->select("*,masyarakat_pengusul.id_user as id_user");
        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_user = user.id_user");
        $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
        $this->db->where("user.status", "block");
        $res = $this->db->get_where("user")->result_array();
        return $res;
    }

    public function account_people()
    {
        $this->db->join("desa", "desa.id_user = user.id_user");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $dataUsdesa = $this->db->get_where("user")->result_array();

        $data = [
            "path" => "AkunPople/index",
            "script" => "AkunPople/script",
            "data_akun_m" => $this->getdataMasyarakatBysesiDesa()
        ];
        $this->load->view('Router/route', $data);
    }
    public function account_people_block()
    {
        $this->db->join("desa", "desa.id_user = user.id_user");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $dataUsdesa = $this->db->get_where("user")->result_array();

        $data = [
            "path" => "AkunPople/Block",
            "script" => "AkunPople/script",
            "data_akun_m" => $this->getdataMasyarakatBysesiDesaBLock()
        ];
        $this->load->view('Router/route', $data);
    }
}
