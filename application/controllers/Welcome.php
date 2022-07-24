<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data = [
			"page" => "Home/index",
		];
		$this->load->view('Router/website', $data);
	}
	public function login()
	{
		$data = [
			"page" => "Login/index",
		];
		$this->load->view('Router/website', $data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function regis()
	{
		$this->db->join("user", "user.id_user = kecamatan.id_user");
		$dataUsKecamatan = $this->db->get_where("kecamatan")->result_array();
		$data = [
			"page" => "Login/Regis",
			"kecamatan" => $dataUsKecamatan,
		];
		$this->load->view('Router/website', $data);
	}
	public function Usulan()
	{
		$data = [
			"page" => "Usulan/index",
		];
		$this->load->view('Router/website', $data);
	}
	public function userSession()
	{
		$this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_user = user.id_user");
		$this->db->where("user.id_user", $this->session->userdata()['user']->id_user);
		return $this->db->get_where("user")->row_array();
	}
	public function buatUsulan()
	{
		try {
			$data = $_POST;
			$doc = up('documet', "assets/dokumen_pendukung/");
			$this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
			$this->db->where("masyarakat_pengusul.id_user", $this->session->userdata()['user']->id_user);
			$this->db->where("user.status", "active");
			$this->db->where("user.role", "MASYARAKAT");
			$getM = $this->db->get_where("masyarakat_pengusul")->row_array();

			if (empty($getM)) {
				$this->session->set_flashdata("error", "Akun Anda Tidak valid");
				redirect(base_url("welcome/usulan"));
				return;
			}
			$usulan = [
				"kode_desa" => $getM['kode_desa'],
				"id_masyarakat" => $getM['id_pengusul'],
				"usulan_masyarakat" => $data['usulan_masyarakat'],
				"prioritas" => $data['prioritas'],
				"masalah" => $data['masalah'],
				"lokasi" => $data['lokasi'],
				"documet" => $doc != false ? $doc : null,
				"status" => "pending",
				"tanggal" => date("Y-m-d"),
				"created_at" => date("Y-m-d H:i:s"),
			];
			$ins = $this->db->insert("usulan_masyarakat", $usulan);
			if ($ins) {
				$this->session->set_flashdata("success", "Usulan Berhasil di Kirim");
				redirect(base_url("welcome/usulan"));
			} else {
				$this->session->set_flashdata("error", "Usulan Gagal di Kirim");
				redirect(base_url("welcome/usulan"));
			}
		} catch (\Throwable $th) {
			$this->session->set_flashdata("error", "Usulan Gagal di Kirim");
			redirect(base_url("welcome/usulan"));
		}
	}
	public function DataUsulan()
	{
		$this->db->select("*,usulan_masyarakat.status as status_usulan");
		$this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_masyarakat.id_masyarakat");
		$this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
		$this->db->where("user.id_user", $this->session->userdata()['user']->id_user);
		$u = $this->db->get('usulan_masyarakat')->result_array();
		$data = [
			"page" => "Usulan/usulan",
			"usulan" => $u,
		];
		$this->load->view('Router/website', $data);
	}
	public function usulan_detail($id)
	{
		$this->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_pengusul = usulan_masyarakat.id_masyarakat");
		$this->db->join("user", "user.id_user = masyarakat_pengusul.id_user");
		$this->db->where("usulan_masyarakat.id_usulan_masyarakat", $id);
		$u = $this->db->get('usulan_masyarakat')->row_array();
		$data = [
			"page" => "Usulan/detail",
			"usulan" => $u,
		];
		$this->load->view('Router/website', $data);
	}
}
