<?php

use function PHPSTORM_META\map;

defined('BASEPATH') or exit('No direct script access allowed');

class Bapeda extends CI_Controller
{
    public function index()
    {

        $data = [
            "path" => "Kecamatan/index",
            "script" => "Kecamatan/script"
        ];
        $this->load->view('Router/route', $data);
    }
    public function usulan_baru_kecamatan()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("usulan_desa.status", "send-bapeda");
        if (!empty($_GET['kecamatan'])) {
            $this->db->where("kecamatan.kode_kecamatan", $_GET['kecamatan']);
        }
        if (!empty($_GET['desa'])) {
            $this->db->where("desa.kode_desa", $_GET['desa']);
        }
        $this->db->order_by("desa.kode_desa", "asc");
        $u = $this->db->get('usulan_desa')->result_array();
        $kecamatan = $this->db->get_where("kecamatan")->result_array();

        $desa = $this->db->get('desa')->result_array();
        $data = [
            "path" => "Bapeda/UsulanBaru",
            "script" => "Bapeda/script",
            "usulan" => $u,
            "kecamatan" => $kecamatan
        ];
        $this->load->view('Router/route', $data);
    }
    public function usulan_kecamatan_diterima()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("usulan_desa.status", "accept-bapeda");
        if (!empty($_GET['kecamatan'])) {
            $this->db->where("kecamatan.kode_kecamatan", $_GET['kecamatan']);
        }
        if (!empty($_GET['desa'])) {
            $this->db->where("desa.kode_desa", $_GET['desa']);
        }
        $this->db->order_by("desa.kode_desa", "asc");
        $u = $this->db->get('usulan_desa')->result_array();
        $kecamatan = $this->db->get_where("kecamatan")->result_array();

        $desa = $this->db->get('desa')->result_array();
        $data = [
            "path" => "Bapeda/UsulanDiterima",
            "script" => "Bapeda/script",
            "usulan" => $u,
            "kecamatan" => $kecamatan
        ];
        $this->load->view('Router/route', $data);
    }
    public function laporan_cetak()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("usulan_desa.status", "accept-bapeda");
        if (!empty($_GET['kecamatan'])) {
            $this->db->where("kecamatan.kode_kecamatan", $_GET['kecamatan']);
        }
        if (!empty($_GET['desa'])) {
            $this->db->where("desa.kode_desa", $_GET['desa']);
        }
        $this->db->order_by("desa.kode_desa", "asc");
        $u = $this->db->get('usulan_desa')->result_array();
        $kecamatan = $this->db->get_where("kecamatan")->result_array();

        $desa = $this->db->get('desa')->result_array();
        $data = [
            "path" => "Bapeda/UsulanDiterima",
            "script" => "Bapeda/script",
            "usulan" => $u,
            "kecamatan" => $kecamatan,
            "user"  => $this->getUser()
        ];
        $this->load->view('Page/Bapeda/print', $data);
    }
    public function getUser()
    {
        if ($this->session->userdata()['user']->role == "DESA") {
            $this->db->select("*,desa.nama_kepala_desa as nama");
            $this->db->join("desa", "desa.id_user = user.id_user");
        } else if ($this->session->userdata()['user']->role == "KECAMATAN") {
            $this->db->select("*,kecamatan.nama_kecamatan as nama");
            $this->db->join("kecamatan", "kecamatan.id_user = user.id_user");
        } else if ($this->session->userdata()['user']->role == "MASYARAKAT") {
            $this->db->select("*,masyarakat.nama_pengusul as nama");
            $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_user = user.id_user");
        } elseif ($this->session->userdata()['user']->role == "SUPER-ADMIN") {
            $this->db->select("*,bapeda.nama_kepaladinas as nama");
            $this->db->join("bapeda", "bapeda.id_user = user.id_user");
        }
        $this->db->where("user.id_user", $this->session->userdata()['user']->id_user);
        $u = $this->db->get('user')->row_array();
        return $u;
    }
    public function usulan_kecamatan_ditolak()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("usulan_desa.status", "reject-bapeda");
        $this->db->where("usulan_desa.visible_bapeda", "1");
        if (!empty($_GET['kecamatan'])) {
            $this->db->where("kecamatan.kode_kecamatan", $_GET['kecamatan']);
        }
        if (!empty($_GET['desa'])) {
            $this->db->where("desa.kode_desa", $_GET['desa']);
        }
        $this->db->order_by("desa.kode_desa", "asc");
        $u = $this->db->get('usulan_desa')->result_array();
        $kecamatan = $this->db->get_where("kecamatan")->result_array();

        $desa = $this->db->get('desa')->result_array();
        $data = [
            "path" => "Bapeda/UsulanDitolak",
            "script" => "Bapeda/script",
            "usulan" => $u,
            "kecamatan" => $kecamatan
        ];
        $this->load->view('Router/route', $data);
    }
    public function terima_usulan()
    {
        $req = $_POST;
        if (count(json_decode($req['usulanId'], true)) > 0) {
            $id = json_decode($req['usulanId'], true);
            foreach ($id as $ID) {
                $this->db->where("id_usulan", $ID);
                $this->db->update("usulan_desa", ["status" => "accept-bapeda"]);
            }
        }
    }
    public function rejectBapeda($id)
    {
        $this->db->where("id_usulan", $id);
        $up = $this->db->update("usulan_desa", ["status" => "reject-bapeda"]);
        if ($up) {
            $this->session->set_flashdata("success", "Usulan berhasil ditolak");
            redirect("Bapeda/usulan_baru_kecamatan");
        } else {
            $this->session->set_flashdata("error", "Usulan gagal ditolak");
            redirect("Bapeda/usulan_baru_kecamatan");
        }
    }
    public function delete($id)
    {
        $this->db->where("id_usulan", $id);
        $up = $this->db->update("usulan_desa", ["visible_bapeda" => false]);
        if ($up) {
            $this->session->set_flashdata("success", "Usulan berhasil ditolak");
            redirect("Bapeda/usulan_kecamatan_ditolak");
        } else {
            $this->session->set_flashdata("error", "Usulan gagal ditolak");
            redirect("Bapeda/usulan_kecamatan_ditolak");
        }
    }
}
