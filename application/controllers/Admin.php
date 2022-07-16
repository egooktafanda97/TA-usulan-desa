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
}
