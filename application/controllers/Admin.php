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
            $counting[$value] = $this->db->get_where("usulan_masyarakat", ["prioritas" => $value])->num_rows();
        }

        echo json_encode($counting);
    }
}
