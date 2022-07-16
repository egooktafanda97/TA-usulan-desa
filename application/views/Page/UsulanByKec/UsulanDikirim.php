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
                <h4>Usulan Dikirm Ke Bapeda</h4>
                <!-- <button type="button" class="btn btn-primary btn-send-kec" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-paper-plane"></i> Kirim Ke Bapeda Kabupaten</button> -->
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div></div>
                <form action="" method="get">
                    <div style="display: flex; align-items: center;align-content: center;">
                        <strong style="white-space: nowrap;">Pilih Desa : </strong>
                        <select name="desa" class="form-control form-control-sm">
                            <option value="">Pilih Desa</option>
                            <?php foreach ($desa as $d) : ?>
                                <option value="<?= $d['kode_desa'] ?>"><?= $d['nama_desa'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-info btn-sm" style="margin-left: 10px; margin-bottom: 0px;">Cari</button>
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
                        <th>Action</th>
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
                            <td>
                                <?= $value['status_kirim'] == "send-bapeda" ? "MENUNGGU RESPON BAPEDA" : $value['status_kirim'] ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url("usulan/detailUsulan/" . $value['id_usulan']) ?>" class="btn btn-primary btn-sm edits">
                                    Lihat Detail
                                </a>
                                <button class="btn btn-danger btn-sm tolak" data-id="<?= $value["id_usulan"] ?>">
                                    Batal Pengiriman
                                </button>
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
                                <input type="text" name="prioritas" class="form-control form-control-sm" required>
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