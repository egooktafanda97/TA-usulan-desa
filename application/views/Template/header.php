<?php
function getUserLogin()
{
  $ci = &get_instance();
  if ($ci->session->userdata()['user']->role == "DESA") {
    $ci->db->select("*,desa.nama_kepala_desa as nama");
    $ci->db->join("desa", "desa.id_user = user.id_user");
  } else if ($ci->session->userdata()['user']->role == "KECAMATAN") {
    $ci->db->select("*,kecamatan.nama_kecamatan as nama");
    $ci->db->join("kecamatan", "kecamatan.id_user = user.id_user");
  } else if ($ci->session->userdata()['user']->role == "MASYARAKAT") {
    $ci->db->select("*,masyarakat.nama_pengusul as nama");
    $ci->db->join("masyarakat_pengusul", "masyarakat_pengusul.id_user = user.id_user");
  } elseif ($ci->session->userdata()['user']->role == "SUPER-ADMIN") {
    $ci->db->select("*,bapeda.nama_kepaladinas as nama");
    $ci->db->join("bapeda", "bapeda.id_user = user.id_user");
  }
  $ci->db->where("user.id_user", $ci->session->userdata()['user']->id_user);
  $u = $ci->db->get('user')->row_array();
  return $u;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Musrebang </title>

  <!-- Bootstrap -->
  <link href="<?= base_url('assets/admin/'); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('assets/admin/'); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('assets/admin/'); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="<?= base_url('assets/admin/'); ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= base_url('assets/admin/'); ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">