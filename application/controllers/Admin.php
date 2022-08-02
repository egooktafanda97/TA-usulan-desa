<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $kecamatan = $this->db->get_where("wilayah_kecamatan", ["kabupaten_id" => '1401'])->result_array();
        $data = [
            "path" => "Home/index",
            "script" => "Home/script",
            "kecamatan" => $kecamatan
        ];
        $this->load->view('Router/route', $data);
    }

    public function Counting()
    {
        $data = [
            "INFRASTRUKTUR",
            "KETERTIBAN UMUM",
            "SOSIAL",
            "BUDAYA",
            "EKONOMI",
            "HUKUM",
            "POLITIK",
            "KEAGAMAAN",
            "TATA KELOLA PEMERINTAHAN DESA",
            "PROGRAM DESA",
            "RPJM DESA",
            "PELAYANAN PUBLIK DESA",
            "BUMDES",
            "TRANSPARANSI ALOKASI DANA DESA"
        ];

        // count  by data 
        $counting = [];
        foreach ($data as $value) {
            if ($this->session->userdata()['user']->role == "DESA") {
                $counting[$value] = $this->db->get_where("usulan_masyarakat", ["prioritas" => $value, "kode_desa" => $this->getUserLogin()['kode_desa']])->num_rows();
            } else if ($this->session->userdata()['user']->role == "KECAMATAN") {
                $counting[$value] = $this->db->get_where("usulan_masyarakat", ["prioritas" => $value])->num_rows();
            }
        }

        echo json_encode($counting);
    }
    public function getUserLogin()
    {
        if ($this->session->userdata()['user']->role == "DESA") {
            $this->db->join("desa", "desa.id_user = user.id_user");
        } else if ($this->session->userdata()['user']->role == "KECAMATAN") {
            $this->db->join("kecamatan", "kecamatan.id_user = user.id_user");
        } else if ($this->session->userdata()['user']->role == "MASYARAKAT") {
            $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_user = user.id_user");
        }
        $this->db->where("user.id_user", $this->session->userdata()['user']->id_user);
        $u = $this->db->get('user')->row_array();
        return $u;
    }
}
