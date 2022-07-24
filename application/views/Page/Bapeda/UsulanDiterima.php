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
    <!-- <ol class="breadcrumb">
        <li class="active"><a href="<?= base_url("Usulan/usulan_desa") ?>">Usulan Yang Belum Dikirim</a></li>
        <li><a href="<?= base_url("Usulan/usulan_desa_kecamatan") ?>">Usulan Yang DiKirim</a></li>
        <li><a href="<?= base_url("Usulan/usulanDesa") ?>">Usulan</a></li>
    </ol> -->
    <div class="cards">

        <div class="card-body-main">

            <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;border-bottom: 2px solid gray;">
                <h4>Semua Usulan</h4>
                <button type="button" class="btn btn-primary cetak"><i class="fa fa-print"></i> Cetak</button>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div></div>
                <form action="" method="get" style="display: flex; align-items: center; align-content: center;">
                    <div class="form-group">
                        <strong style="white-space: nowrap;">Pilih Tahun : </strong>
                        <div style="display: flex;">
                            <select name="tahun" class="form-control form-control-sm" style="margin-right: 10px;">
                                <option value="">Pilih Tahun</option>
                                <?php
                                $tahun = date('Y');
                                for ($i = $tahun; $i >= $tahun - 10; $i--) {
                                ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <strong style="white-space: nowrap;">Pilih Desa : </strong>
                        <div style="display: flex;">
                            <select name="desa" class="form-control form-control-sm" style="margin-right: 10px;">
                                <option value="">Pilih Desa</option>
                                <?php foreach ($desa as $d) : ?>
                                    <option value="<?= $d['kode_desa'] ?>"><?= $d['nama_desa'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <strong style="white-space: nowrap;">Status Usulan : </strong>
                        <div style="display: flex;">
                            <select name="status" class="form-control form-control-sm">
                                <option value="">PILIH STATUS</option>
                                <option value="send-kecamatan">Usulan belum diproses</option>
                                <option value="tolak-kecamatan">Usulan ditolak</option>
                                <option value="send-bapeda">Usulan diterima</option>
                            </select>
                            <button type="submit" class="btn btn-info btn-sm" style="margin-left: 10px; margin-bottom: 0px; ">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width: 30px;"></th>
                        <th style="width: 30px;">NO</th>
                        <th style="width: 100px;">Kelurahan Pengusul</th>
                        <th style="width: 100px;">Nama Pengusul</th>
                        <th style="width: 100px;">Profile</th>
                        <th style="width: 100px;">Usulan Tahun</th>
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
                            <td><?= $value['nama_desa'] ?></td>
                            <td><?= $value['nama_kepala_desa'] ?></td>
                            <td>KEPALA <?= strtoupper($value['jenis']) ?> <?= strtoupper($value['nama_desa']) ?></td>
                            <td><?= $value['tahun_usulan'] ?></td>
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
                                <a class="btn btn-success btn-sm" href="<?= base_url("assets/dokumen_pendukung/" . $value['dokumen_pendukung']) ?>" target="_blank">
                                    Dokumen Pendukung / Proposal
                                </a>
                            </td>
                            <td><?php
                                if ($value['status_kirim'] == "proses") {
                                    echo "PREVIEW";
                                } else if ($value['status_kirim'] == "send-kecamatan") {
                                    echo "USULAN MASUK BELUM DI TANGGAPI";
                                } else if ($value['status_kirim'] == "send-bapeda") {
                                    echo "TERKIRIM KE BAPEDA";
                                } else if ($value['status_kirim'] == "tolak-kecamatan") {
                                    echo "TOLAK KECAMATAN";
                                } else if ($value['status_kirim'] == "accept-bapeda") {
                                    echo "USULAN DI TERIMA";
                                } else if ($value['status_kirim'] == "reject-bapeda") {
                                    echo "USULAN DI TOLAK";
                                }
                                ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>