<style>
    .cards {
        width: 100%;
        padding: 5px;
        border-radius: 5px;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        /* box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; */
    }

    .cardsItem {
        width: 100%;
        padding: 5px;
        border-radius: 5px;
        /* box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px; */
        box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
    }

    .card-body-main {
        padding: 30px;
    }

    .continers-main {
        margin-top: 100px;
    }

    .container-desc {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
</style>
<link href="<?= base_url('assets/admin/'); ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/admin/'); ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/admin/'); ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/admin/'); ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/admin/'); ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<div class="continers-main">
    <div class="cards">
        <div class="card-body-main">
            <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;border-bottom: 2px solid gray;">
                <h4>DETAIL USULAN</h4>
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Usulan</button> -->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div style="width: 100%; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; padding: 20px;">
                            <div class="container-desc">
                                <strong style="color: #000;">Nama Kelurahan / Desa</strong>
                                <label for=""><?= $usulan['nama_desa'] ?></label>
                            </div>
                            <div class="container-desc">
                                <strong style="color: #000;">Nama Kepala Kelurahan / Desa</strong>
                                <label for=""><?= $usulan['nama_kepala_desa'] ?></label>
                            </div>
                            <div class="container-desc">
                                <strong style="color: #000;">Kecamatan</strong>
                                <label for=""><?= $usulan['nama_kecamatan'] ?></label>
                            </div>
                            <div class="container-desc">
                                <strong style="color: #000;">Usulan Tahun</strong>
                                <label for=""><?= $usulan['tahun_usulan'] ?></label>
                            </div>
                            <div class="container-desc">
                                <strong style="color: #000;">Tanggal usulan</strong>
                                <label for=""><?= tgl_i($usulan['tanggal']) ?></label>
                            </div>
                            <div class="container-desc">
                                <strong style="color: #000;">Sumber Usulan</strong>
                                <label for=""><?= !empty($usulan['id_pengusul']) ? '<button class="btn btn-info btn-sm" data-toggle="modal" data-target=".sumber-usulan">MASYARAKAT</button>' : "DESA / KELURAHAN" ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="cards" style="padding: 20px;">
                            <h4>Usulan</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                        <label style="color:#000;">PRIORITAS</label>
                                        <p><?= $usulan['prioritas'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                        <label style="color:#000;">ARAH KEBIJAKAN</label>
                                        <p><?= $usulan['arah_kebijakan'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                        <label style="color:#000;">KAMUS USULAN</label>
                                        <p><?= $usulan['kamus_usulan'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                        <label style="color:#000;">PERMASALAHAN</label>
                                        <p><?= $usulan['permasalahan'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                        <label style="color:#000;">VOLUME</label>
                                        <p><?= $usulan['volume'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                        <label style="color:#000;">LOKASI</label>
                                        <p><?= $usulan['lokasi'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                        <label style="color:#000;">FOTO PENDUKUNG</label><br>
                                        <a href="<?= base_url("assets/foto_lokasi/" . $usulan['foto_lokasi']) ?>">
                                            <img src="<?= base_url("assets/foto_lokasi/" . $usulan['foto_lokasi']) ?>" style="width: 400px;" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                        <label style="color:#000;">DOKUMEN PENDUKUNG</label>
                                        <br>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url('assets/dokumen_pendukung/' . $usulan['dokumen_pendukung']) ?>" target="_blank" style="width: 150px;"><i class="fa fa-eye"></i> Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php if (!empty($usulan_masyarakat)) : ?>
    <div class="modal fade sumber-usulan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="cards" style="padding: 20px;">
                    <h4>Sumber Usulan</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                <label style="color:#000;">Usulan</label>
                                <p><?= $usulan_masyarakat['usulan_masyarakat'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                <label style="color:#000;">Masalah</label>
                                <p><?= $usulan_masyarakat['masalah'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                <label style="color:#000;">Lokasi</label>
                                <p><?= $usulan_masyarakat['lokasi'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                <label style="color:#000;">Tanggal</label>
                                <p><?= tgl_i($usulan_masyarakat['tanggal']) ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cardsItem" style="padding: 10px; margin-bottom: 10px;">
                                <label style="color:#000;">Dokumet Pendukung</label>
                                <br>
                                <a class="btn btn-primary btn-sm" href="<?= base_url('assets/dokumen_pendukung/' . $usulan_masyarakat['documet']) ?>" target="_blank" style="width: 150px;"><i class="fa fa-eye"></i> Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>