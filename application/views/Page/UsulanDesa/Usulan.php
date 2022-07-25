<style>
    .cards {
        width: 100%;
        padding: 5px;
        border-radius: 5px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }

    .card-body-main {
        padding: 30px;
    }

    .continers-main {
        margin-top: 100px;
    }


    .breadcrumb>.active {
        font-weight: bold;
        color: red !important;
    }
</style>
<link href="<?= base_url('assets/admin/'); ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/admin/'); ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/admin/'); ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/admin/'); ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/admin/'); ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="continers-main">
    <ol class="breadcrumb">
        <li><a href="<?= base_url("Usulan/usulan_desa") ?>">Usulan Yang Belum Dikirim</a></li>
        <li><a href="<?= base_url("Usulan/usulan_desa_kecamatan") ?>">Usulan Yang DiKirim</a></li>
        <li class="active"><a href="<?= base_url("Usulan/usulanDesa") ?>">Laporan Usulan</a></li>
    </ol>
    <div class="cards">

        <div class="card-body-main">

            <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;border-bottom: 2px solid gray;">
                <h4>Usulan</h4>
                <button type="button" class="btn btn-primary btn-sm cetak"><b><i class="fa fa-print"></i> Print Laporan</b></button>
            </div>
            <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h4></h4>
                <div>

                    <form action="" method="get" style="display: flex;">
                        <div class="from-group" style="margin-right: 5px;">
                            <Strong>Tahun Pengajuan Usulan : </Strong>
                            <div style="display: flex; align-items: center; align-content: center;">
                                <select name="tahun" class="form-control form-control-sm">
                                    <option value="">PILIH TAHUN</option>
                                    <!-- for tahun by array -->
                                    <?php
                                    $tahun = date('Y');
                                    for ($i = $tahun; $i >= $tahun - 10; $i--) {
                                    ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="from-group" style="margin-right: 5px;">
                            <Strong>BULAN : </Strong>
                            <div style="display: flex; align-items: center; align-content: center;">
                                <select name="bulan" class="form-control form-control-sm">
                                    <option value="">PILIH BULAN</option>
                                    <!-- for tahun by array -->
                                    <?php
                                    $bulan = date('m');
                                    for ($i = 1; $i <= 12; $i++) {
                                    ?>
                                        <option value="<?= $i < 10 ? "0" . $i : $i ?>"><?= getBulan($i) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="from-group" style="margin-right: 5px;">
                            <Strong>Status : </Strong>
                            <div style="display: flex; align-items: center; align-content: center;">

                                <select name="status" class="form-control form-control-sm">
                                    <option value="">PILIH STATUS</option>
                                    <option value="send-kecamatan">Usulan belum diproses</option>
                                    <option value="tolak-kecamatan">Usulan ditolak</option>
                                    <option value="send-bapeda">Usulan dikirim ke bapeda</option>
                                    <option value="accept-bapeda">Usulan diterima bapeda</option>
                                    <option value="reject-bapeda">Usulan ditolak bapeda</option>
                                </select>
                                <button class="btn btn-info btn-sm" style="margin: 0; margin-left: 10px;">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width: 30px;"></th>
                        <th style="width: 30px;">NO</th>
                        <th style="width: 100px;">Tanggal Usulan</th>
                        <th style="width: 100px;">Tahun Usulan</th>
                        <th>Prioritas</th>
                        <th>Arah Kebijakan</th>
                        <th>Usulan/Kamus Usulan</th>
                        <th>Permasalahan yang dihadapi</th>
                        <th>Volume</th>
                        <th>Lokasi</th>
                        <th>Data Dukungan Foto</th>
                        <th>Data Dukungan File</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($usulan as  $value) : ?>
                        <tr>
                            <th></th>
                            <td><?= $i++ ?></td>
                            <td><?= tgl_i($value['tanggal']) ?></td>
                            <td><?= $value['tahun'] ?></td>
                            <td><?= $value['prioritas'] ?></td>
                            <td><?= $value['arah_kebijakan'] ?></td>
                            <td><?= $value['kamus_usulan'] ?></td>
                            <td><?= $value['permasalahan'] ?></td>
                            <td><?= $value['volume'] ?></td>
                            <td><?= $value['lokasi'] ?></td>
                            <td>
                                <a href="<?= base_url("assets/foto_lokasi/" . $value['foto_lokasi']) ?>">
                                    <img src="<?= base_url("assets/foto_lokasi/" . $value['foto_lokasi']) ?>" style="width: 100px;" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url("assets/dokumen_pendukung/" . $value['dokumen_pendukung']) ?>" target="_blank">
                                    Dokumen Pendukung / Proposal
                                </a>
                            </td>
                            <td>
                                <?php
                                if ($value['status_kirim'] == "proses") {
                                    echo "PREVIEW";
                                } else if ($value['status_kirim'] == "send-kecamatan") {
                                    echo "USULAN MASUK BELUM DI TANGGAPI";
                                } else if ($value['status_kirim'] == "send-bapeda") {
                                    echo "TERKIRIM KE BAPEDA";
                                } else if ($value['status_kirim'] == "tolak-kecamatan") {
                                    echo "TOLAK KECAMATAN";
                                } else if ($value['status_kirim'] == "accept-bapeda") {
                                    echo "USULAN DI TERIMA BA PEDA";
                                } else if ($value['status_kirim'] == "reject-bapeda") {
                                    echo "USULAN DI TOLAK BAPEDA";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade bs-modals" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div style="width: 100%;display: flex; justify-content: space-between; align-content: center;">
                    <h4 class="modal-title" id="myModalLabel">Panel Input</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
            <form action="<?= base_url("Usulan/edit_usulan_desa") ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_usulan" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">PRIORITAS</label>
                                <select name="prioritas" class="form-control form-control-sm" required>
                                    <option value="">PILIH PRIORITAS</option>
                                    <option value="INFRASTRUKTUR">INFRASTRUKTUR</option>
                                    <option value="KETERTIBAN UMUM">KETERTIBAN UMUM</option>
                                    <option value="SOSIAL">SOSIAL</option>
                                    <option value="BUDAYA">BUDAYA</option>
                                    <option value="EKONOMI">EKONOMI</option>
                                    <option value="HUKUM">HUKUM</option>
                                    <option value="POLITIK">POLITIK</option>
                                    <option value="KEAGAMAAN">KEAGAMAAN</option>
                                    <option value="TATA KELOLA PEMERINTAHAN DESA">TATA KELOLA PEMERINTAHAN DESA</option>
                                    <option value="PROGRAM DESA">PROGRAM DESA</option>
                                    <option value="RPJM DESA">RPJM DESA</option>
                                    <option value="PELAYANAN PUBLIK DESA">PELAYANAN PUBLIK DESA</option>
                                    <option value="BUMDES">BUMDES</option>
                                    <option value="TRANSPARANSI ALOKASI DANA DESA">TRANSPARANSI ALOKASI DANA DESA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">ARAH KEBIJAKAN</label>
                                <textarea name="arah_kebijakan" class="form-control form-control-sm summernote" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">KAMUS USULAN</label>
                                <textarea name="kamus_usulan" class="form-control form-control-sm summernote" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">PERMASALAHAN</label>
                                <textarea name="permasalahan" class="form-control form-control-sm summernote" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">VOLUME</label>
                                <input type="text" name="volume" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">LOKASI</label>
                                <input type="text" name="lokasi" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">FOTO LOKASI</label>
                                <input type="file" name="foto_lokasi" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6 docPen">
                            <div class="form-group">
                                <label for="">DOKUMEN PENDUKUNG</label>
                                <input type="file" name="dokumen_pendukung" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div style="width: 100%;display: flex; justify-content: space-between; align-content: center;">
                    <h4 class="modal-title" id="myModalLabel">Panel Input</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
            <form id="form-send" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">USULAN TAHUN</label>
                                <!-- select tahun -->
                                <select name="tahun_usulan" class="form-control form-control-sm" required>
                                    <?php for ($i = date("Y"); $i >= date("Y") - 5; $i--) : ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>