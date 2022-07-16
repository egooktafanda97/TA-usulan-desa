<?php

use function PHPSTORM_META\map;

defined('BASEPATH') or exit('No direct script access allowed');

class Usulan extends CI_Controller
{
    public function index()
    {

        $data = [
            "path" => "Kecamatan/index",
            "script" => "Kecamatan/script"
        ];
        $this->load->view('Router/route', $data);
    }
    public function usulan_masyarakat()
    {
        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_masyarakat.id_masyarakat");
        $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
        $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
        $this->db->where("usulan_masyarakat.status", "pending");
        $u = $this->db->get('usulan_masyarakat')->result_array();

        $data = [
            "path" => "UsulanMasyarakat/index",
            "script" => "UsulanMasyarakat/script",
            "usulan" => $u
        ];
        $this->load->view('Router/route', $data);
    }
    public function usulan_masyarakat_ditolak()
    {
        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_masyarakat.id_masyarakat");
        $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
        $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
        $this->db->where("usulan_masyarakat.status", "ditolak");
        $u = $this->db->get('usulan_masyarakat')->result_array();

        $data = [
            "path" => "UsulanMasyarakat/UsulanDitolak",
            "script" => "UsulanMasyarakat/script",
            "usulan" => $u
        ];
        $this->load->view('Router/route', $data);
    }
    public function detail_usulan($id)
    {
        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_masyarakat.id_masyarakat");
        $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->where("usulan_masyarakat.id_usulan_masyarakat", $id);
        $u = $this->db->get('usulan_masyarakat')->row_array();
        $data = [
            "path" => "UsulanMasyarakat/detailUsulan",
            "script" => "UsulanMasyarakat/script",
            "usulan" => $u
        ];
        $this->load->view('Router/route', $data);
    }
    public function usulan_desa()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->where("usulan_desa.status", "proses");
        $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
        $u = $this->db->get('usulan_desa')->result_array();
        $data = [
            "title" => "Usulan Desa",
            "path" => "UsulanDesa/usulan_desa",
            "script" => "UsulanDesa/script",
            "usulan" => $u
        ];
        $this->load->view('Router/route', $data);
    }
    public function UsulanDesaDiTolak()
    {

        $this->db->select("*, usulan_desa.status as status_kirim");
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("usulan_desa.status", "tolak-kecamatan");
        $this->db->where("usulan_desa.visible_camat", "1");
        if (!empty($_GET['desa'])) {
            $this->db->where("desa.kode_desa", $_GET['desa']);
        }
        if (!empty($_GET['tahun'])) {
            $this->db->where("usulan_desa.tahun", $_GET['tahun']);
        }
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);
        $u = $this->db->get('usulan_desa')->result_array();


        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);
        $desa = $this->db->get('desa')->result_array();

        $data = [
            "title" => "Usulan Desa",
            "path" => "UsulanByKec/UsulanDitolak",
            "script" => "UsulanByKec/script",
            "usulan" => $u,
            "desa" => $desa
        ];
        $this->load->view('Router/route', $data);
    }
    public function getUsulanByID($id)
    {
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_masyarakat.id_masyarakat");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_masyarakat.kode_desa");
        $this->db->where("usulan_masyarakat.id_usulan_masyarakat", $id);
        // $this->db->where("usulan_masyarakat.status", "pending");
        $u = $this->db->get('usulan_masyarakat')->row_array();
        echo json_encode($u);
    }
    public function usulan_desa_kecamatan()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->where("usulan_desa.status", "send-kecamatan");
        $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
        $u = $this->db->get('usulan_desa')->result_array();
        $data = [
            "title" => "Usulan Desa",
            "path" => "UsulanDesa/usulan_desa_dikirm",
            "script" => "UsulanDesa/script",
            "usulan" => $u
        ];
        $this->load->view('Router/route', $data);
    }
    public function usulanDesa()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
        if (!empty($_GET['status'])) {
            $this->db->like("usulan_desa.status", $_GET['status']);
        }
        if (!empty($_GET['bulan'])) {
            $thn = empty($_GET['tahun']) ? date('Y') : $_GET['tahun'];
            $this->db->like("usulan_desa.tanggal", $thn . "-" . $_GET['bulan']);
        }
        if (empty($_GET['bulan']) && !empty($_GET['tahun'])) {
            $this->db->where("usulan_desa.tahun", $_GET['tahun']);
        }
        $u = $this->db->get('usulan_desa')->result_array();
        $data = [
            "title" => "Usulan Desa",
            "path" => "UsulanDesa/Usulan",
            "script" => "UsulanDesa/script",
            "usulan" => $u
        ];
        $this->load->view('Router/route', $data);
    }

    // kecamatan
    public function usulan_desa_by_kec()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("usulan_desa.status", "send-kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);
        if (!empty($_GET['desa'])) {
            $this->db->where("desa.kode_desa", $_GET['desa']);
        }
        $this->db->order_by("desa.kode_desa", "asc");
        $u = $this->db->get('usulan_desa')->result_array();


        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);

        $desa = $this->db->get('desa')->result_array();

        $data = [
            "title" => "Usulan Desa",
            "path" => "UsulanByKec/usulan_desa",
            "script" => "UsulanByKec/script",
            "usulan" => $u,
            "desa" => $desa
        ];
        $this->load->view('Router/route', $data);
    }

    public function semua_usulan_desa_by_kec()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);
        if (!empty($_GET['desa'])) {
            $this->db->where("desa.kode_desa", $_GET['desa']);
        }
        if (!empty($_GET['tahun'])) {
            $this->db->where("usulan_desa.tahun", $_GET['tahun']);
        }
        if (!empty($_GET['status'])) {
            $this->db->like("usulan_desa.status", $_GET['status']);
        }
        $this->db->order_by("desa.kode_desa", "asc");
        $u = $this->db->get('usulan_desa')->result_array();


        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);

        $desa = $this->db->get('desa')->result_array();

        $data = [
            "title" => "Usulan Desa",
            "path" => "UsulanByKec/Semua_usulan",
            "script" => "UsulanByKec/script",
            "usulan" => $u,
            "desa" => $desa
        ];
        $this->load->view('Router/route', $data);
    }
    public function usulan_diterima_bapeda()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);
        if (!empty($_GET['desa'])) {
            $this->db->where("desa.kode_desa", $_GET['desa']);
        }
        if (!empty($_GET['tahun'])) {
            $this->db->where("usulan_desa.tahun", $_GET['tahun']);
        }
        if (!empty($_GET['status'])) {
            $this->db->like("usulan_desa.status", $_GET['status']);
        }
        $this->db->order_by("desa.kode_desa", "asc");
        $this->db->where("usulan_desa.status", "accept-bapeda");
        $u = $this->db->get('usulan_desa')->result_array();


        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);

        $desa = $this->db->get('desa')->result_array();

        $data = [
            "title" => "Usulan Desa",
            "path" => "UsulanByKec/UsulanDiterima",
            "script" => "UsulanByKec/script",
            "usulan" => $u,
            "desa" => $desa
        ];
        $this->load->view('Router/route', $data);
    }
    public function usulan_ditlak_bapeda()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);
        if (!empty($_GET['desa'])) {
            $this->db->where("desa.kode_desa", $_GET['desa']);
        }
        if (!empty($_GET['tahun'])) {
            $this->db->where("usulan_desa.tahun", $_GET['tahun']);
        }
        if (!empty($_GET['status'])) {
            $this->db->like("usulan_desa.status", $_GET['status']);
        }
        $this->db->order_by("desa.kode_desa", "asc");
        $this->db->where("usulan_desa.status", "reject-bapeda");
        $u = $this->db->get('usulan_desa')->result_array();


        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);

        $desa = $this->db->get('desa')->result_array();

        $data = [
            "title" => "Usulan Desa",
            "path" => "UsulanByKec/UsulanDitolakBapeda",
            "script" => "UsulanByKec/script",
            "usulan" => $u,
            "desa" => $desa
        ];
        $this->load->view('Router/route', $data);
    }
    public function cetak_usulan_bykecamatan()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);
        if (!empty($_GET['desa'])) {
            $this->db->where("desa.kode_desa", $_GET['desa']);
        }
        if (!empty($_GET['tahun'])) {
            $this->db->where("usulan_desa.tahun", $_GET['tahun']);
        }
        if (!empty($_GET['status'])) {
            $this->db->like("usulan_desa.status", $_GET['status']);
        }
        $this->db->order_by("desa.kode_desa", "asc");
        $u = $this->db->get('usulan_desa')->result_array();


        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);

        $desa = $this->db->get('desa')->result_array();

        $data = [
            "usulan" => $u,
            "desa" => $desa,
            "user" => $this->getUserLogin()
        ];
        $this->load->view('Page/UsulanByKec/print', $data);
    }
    public function detailUsulanDesa($id_usulan)
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("usulan_desa.status", "send-kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);
        $this->db->where("usulan_desa.id_usulan", $id_usulan);
        $u = $this->db->get('usulan_desa')->result_array();
        $data = [
            "title" => "Usulan Desa",
            "path" => "UsulanByKec/detailUsulan",
            "script" => "UsulanByKec/script",
            "usulan" => $u
        ];
        $this->load->view('Router/route', $data);
    }
    public function detailUsulanDesaDikirimKecamatan()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("usulan_desa.status", "send-bapeda");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);
        $u = $this->db->get('usulan_desa')->result_array();


        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("kecamatan.id_user", $this->session->userdata()['user']->id_user);
        $desa = $this->db->get('desa')->result_array();

        $data = [
            "title" => "Usulan Desa",
            "path" => "UsulanByKec/UsulanDikirim",
            "script" => "UsulanByKec/script",
            "usulan" => $u,
            "desa" => $desa
        ];
        $this->load->view('Router/route', $data);
    }
    public function detailUsulan($id_usulan)
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = desa.id_kecamatan");
        $this->db->where("usulan_desa.id_usulan", $id_usulan);
        $u = $this->db->get('usulan_desa')->row_array();

        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_masyarakat.id_masyarakat");
        $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->where("usulan_masyarakat.id_usulan_masyarakat", $u['id_usulan_masyarakat']);
        $uM = $this->db->get('usulan_masyarakat')->row_array();

        $data = [
            "path" => "Usulan/detail",
            "script" => "Usulan/script",
            "usulan" => $u,
            "usulan_masyarakat" => $uM
        ];
        $this->load->view('Router/route', $data);
    }
    public function cetakUsulanDesa()
    {
        $this->db->select("*, usulan_desa.status as status_kirim");
        // $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        // $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = usulan_desa.kode_desa");
        $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
        if (!empty($_GET['status'])) {
            $this->db->like("usulan_desa.status", $_GET['status']);
        }
        if (!empty($_GET['bulan'])) {
            $thn = empty($_GET['tahun']) ? date('Y') : $_GET['tahun'];
            $this->db->like("usulan_desa.tanggal", $thn . "-" . $_GET['bulan']);
        }
        if (empty($_GET['bulan']) && !empty($_GET['tahun'])) {
            $this->db->where("usulan_desa.tahun", $_GET['tahun']);
        }
        $u = $this->db->get('usulan_desa')->result_array();
        $data = [
            "usulan" => $u,
            "user" => $this->getUserLogin()
        ];
        $this->load->view('Page/UsulanDesa/print', $data);
    }
    public function getUsulanDesaByID($id)
    {
        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_desa.id_pengusul");
        $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
        $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan  = desa.id_kecamatan");
        $this->db->where("usulan_desa.id_usulan", $id);
        $u = $this->db->get('usulan_desa')->row_array();
        echo json_encode($u);
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
    public function terima_usulan()
    {
        $ups = up("dokumen_pendukung", "assets/dokumen_pendukung/");
        $fLoc = up("foto_lokasi", "assets/foto_lokasi/");
        $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_masyarakat.id_masyarakat");
        $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
        $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
        $this->db->where("usulan_masyarakat.id_usulan_masyarakat", $_POST['id_usulan_masyarakat']);
        $usuM = $this->db->get('usulan_masyarakat')->row_array();

        $dataInp = $_POST + $usuM + $this->getUserLogin();

        $d = [
            "id_pengusul" => $dataInp['id_masyarakat'],
            "kode_desa" => $dataInp['kode_desa'],
            "id_usulan_masyarakat" => $dataInp['id_usulan_masyarakat'],
            "tanggal" => date("Y-m-d"),
            "tahun" => date("Y"),
            "prioritas" => $dataInp['prioritas'],
            "arah_kebijakan" => $dataInp['arah_kebijakan'],
            "kamus_usulan" =>  $dataInp['kamus_usulan'],
            "permasalahan" => $dataInp['permasalahan'],
            "volume" => $dataInp['volume'],
            "lokasi" =>     $dataInp['lokasi'],
            "foto_lokasi" => $fLoc != false ? $fLoc : null,
            "dokumen_pendukung" =>  $ups != false ? $ups : $dataInp['documet'],
            "status" => "proses",
            "created_at" => date("Y-m-d H:i:s"),
        ];
        $this->db->where("id_usulan_masyarakat", $dataInp['id_usulan_masyarakat']);
        $this->db->update("usulan_masyarakat", ["status" => "proses"]);
        // save usulan_desa
        $ins = $this->db->insert("usulan_desa", $d);
        if ($ins) {
            $this->session->set_flashdata("success", "Usulan berhasil diterima");
            redirect("Usulan/usulan_masyarakat");
        } else {
            $this->session->set_flashdata("error", "Usulan gagal diterima");
            redirect("Usulan/usulan_masyarakat");
        }
    }
    public function buat_usulan()
    {
        $dataInp = $_POST +  $this->getUserLogin();
        $ups = up("dokumen_pendukung", "assets/dokumen_pendukung/");
        $fLoc = up("foto_lokasi", "assets/foto_lokasi/");

        $d = [
            "id_pengusul" => "",
            "kode_desa" => $dataInp['kode_desa'],
            "id_usulan_masyarakat" => $dataInp['id_usulan_masyarakat'],
            "tanggal" => date("Y-m-d"),
            "tahun" => date("Y"),
            "prioritas" => $dataInp['prioritas'],
            "arah_kebijakan" => $dataInp['arah_kebijakan'],
            "kamus_usulan" =>  $dataInp['kamus_usulan'],
            "permasalahan" => $dataInp['permasalahan'],
            "volume" => $dataInp['volume'],
            "lokasi" =>     $dataInp['lokasi'],
            "foto_lokasi" => $fLoc != false ? $fLoc : null,
            "dokumen_pendukung" =>  $ups != false ? $ups : $dataInp['documet'],
            "status" => "proses",
            "created_at" => date("Y-m-d H:i:s"),
        ];
        $this->db->where("id_usulan_masyarakat", $dataInp['id_usulan_masyarakat']);
        $this->db->update("usulan_masyarakat", ["status" => "proses"]);
        // save usulan_desa
        $ins = $this->db->insert("usulan_desa", $d);
        if ($ins) {
            $this->session->set_flashdata("success", "Usulan berhasil diterima");
            redirect("Usulan/usulan_desa");
        } else {
            $this->session->set_flashdata("error", "Usulan gagal diterima");
            redirect("Usulan/usulan_desa");
        }
    }
    // tolak_usulan
    public function tolak_usulan($id)
    {
        $this->db->where("id_usulan_masyarakat", $id);
        $up = $this->db->update("usulan_masyarakat", ["status" => "ditolak"]);
        if ($up) {
            $this->session->set_flashdata("success", "Usulan berhasil ditolak");
            redirect("Usulan/usulan_masyarakat");
        } else {
            $this->session->set_flashdata("error", "Usulan gagal ditolak");
            redirect("Usulan/usulan_masyarakat");
        }
    }
    public function deleteUsulanMasyarakat($id)
    {
        $this->db->where("id_usulan_masyarakat", $id);
        $up = $this->db->delete("usulan_masyarakat");
        if ($up) {
            $this->session->set_flashdata("success", "Usulan berhasil ditolak");
            redirect("Usulan/usulan_masyarakat_ditolak");
        } else {
            $this->session->set_flashdata("error", "Usulan gagal ditolak");
            redirect("Usulan/usulan_masyarakat_ditolak");
        }
    }
    public function batalKirimUsulanDesa($idusulan)
    {
        $this->db->where("id_usulan", $idusulan);
        $up = $this->db->update("usulan_desa", ["status" => "proses"]);
        if ($up) {
            $this->session->set_flashdata("success", "Kiriman usulan berhasil dibatalkan");
            redirect("Usulan/usulan_desa_kecamatan");
        } else {
            $this->session->set_flashdata("error", "Kiriman usulan gagal dibatalkan");
            redirect("Usulan/usulan_desa_kecamatan");
        }
    }
    public function tolak_usulan_desa($idusulan)
    {
        $idUs = $this->db->get_where("usulan_desa", ["id_usulan" => $idusulan])->row_array();

        $this->db->where("id_usulan", $idusulan);
        $this->db->delete("usulan_desa");

        $this->db->where("id_usulan_masyarakat", $idUs['id_usulan_masyarakat']);
        $up = $this->db->update("usulan_masyarakat", ["status" => "ditolak"]);
        if ($up) {
            $this->session->set_flashdata("success", "Usulan berhasil ditolak");
            redirect("Usulan/usulan_desa");
        } else {
            $this->session->set_flashdata("error", "Usulan gagal ditolak");
            redirect("Usulan/usulan_desa");
        }
    }


    public function edit_usulan_desa()
    {
        $req = $_POST;
        $ups = up("dokumen_pendukung", "assets/dokumen_pendukung/");
        $fLoc = up("foto_lokasi", "assets/foto_lokasi/");

        if ($ups != false) {
            $req += ["dokumen_pendukung" => $ups];
        }
        if ($fLoc != false) {
            $req += ["foto_lokasi" => $fLoc];
        }
        $this->db->where("id_usulan", $req['id_usulan']);
        $up = $this->db->update("usulan_desa", $req);
        if ($up) {
            $this->session->set_flashdata("success", "Usulan berhasil diubah");
            redirect("Usulan/usulan_desa");
        } else {
            $this->session->set_flashdata("error", "Usulan gagal diubah");
            redirect("Usulan/usulan_desa");
        }
    }
    public function sendKec()
    {
        $req = $_POST;
        if (count(json_decode($req['usulanId'], true)) > 0) {
            $id = json_decode($req['usulanId'], true);
            foreach ($id as $ID) {
                $this->db->where("id_usulan", $ID);
                $this->db->update("usulan_desa", ["status" => "send-kecamatan", "tahun_usulan" => $req['tahun_usulan']]);
            }
        }
    }



    public function sendBapeda()
    {
        $req = $_POST;
        if (count(json_decode($req['usulanId'], true)) > 0) {
            $id = json_decode($req['usulanId'], true);
            foreach ($id as $ID) {
                $this->db->where("id_usulan", $ID);
                $this->db->update("usulan_desa", ["status" => "send-bapeda"]);
            }
        }
    }
    public function tolak_usulan_desa_byKec($id)
    {
        $this->db->where("id_usulan", $id);
        $res = $this->db->update("usulan_desa", ["status" => "tolak-kecamatan"]);
        if ($res) {
            $this->session->set_flashdata("success", "Usulan Desa Berhasil Ditolak");
            redirect("Usulan/usulan_desa_by_kec");
        } else {
            $this->session->set_flashdata("error", "Usulan Desa Gagal Ditolak");
            redirect("Usulan/usulan_desa_by_kec");
        }
    }

    public function hapusbykecamatan($id)
    {
        $this->db->where("id_usulan", $id);
        $res = $this->db->update("usulan_desa", [
            "visible_camat" => false
        ]);
        if ($res) {
            $this->session->set_flashdata("success", "Usulan Desa Berhasil Dihapus");
            redirect("Usulan/UsulanDesaDiTolak");
        } else {
            $this->session->set_flashdata("error", "Usulan Desa Gagal Dihapus");
            redirect("Usulan/UsulanDesaDiTolak");
        }
    }

    // public function usulan_masyarakat_diproses()
    // {
    //     $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_masyarakat.id_masyarakat");
    //     $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
    //     $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
    //     $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
    //     $this->db->where("usulan_masyarakat.status", "pending");
    //     $u = $this->db->get('usulan_masyarakat')->result_array();

    //     $data = [
    //         "path" => "UsulanMasyarakat/index",
    //         "script" => "UsulanMasyarakat/script",
    //         "usulan" => $u
    //     ];
    //     $this->load->view('Router/route', $data);
    // }

    // public function usulan_masyarakat_ditolak()
    // {
    //     $this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_masyarakat.id_masyarakat");
    //     $this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
    //     $this->db->join("desa", "desa.kode_desa = masyarakat_pengusul.kode_desa");
    //     $this->db->where("desa.id_user", $this->session->userdata()['user']->id_user);
    //     $this->db->where("usulan_masyarakat.status", "pending");
    //     $u = $this->db->get('usulan_masyarakat')->result_array();

    //     $data = [
    //         "path" => "UsulanMasyarakat/index",
    //         "script" => "UsulanMasyarakat/script",
    //         "usulan" => $u
    //     ];
    //     $this->load->view('Router/route', $data);
    // }
}
