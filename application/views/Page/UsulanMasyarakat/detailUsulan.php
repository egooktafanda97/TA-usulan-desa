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
                <h4>USULAN</h4>
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Usulan</button> -->
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="cards" style="padding: 10px; margin-bottom: 10px;">
                            <label style="color:#000;">Usulan</label>
                            <p><?= $usulan['usulan_masyarakat'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="cards" style="padding: 10px; margin-bottom: 10px;">
                            <label style="color:#000;">Masalah</label>
                            <p><?= $usulan['masalah'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="cards" style="padding: 10px; margin-bottom: 10px;">
                            <label style="color:#000;">Lokasi</label>
                            <p><?= $usulan['lokasi'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="cards" style="padding: 10px; margin-bottom: 10px;">
                            <label style="color:#000;">Tanggal</label>
                            <p><?= tgl_i($usulan['tanggal']) ?></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="cards" style="padding: 10px; margin-bottom: 10px;">
                            <label style="color:#000;">Dokumet Pendukung</label>
                            <br>
                            <a class="btn btn-primary btn-sm" href="<?= base_url('assets/dokumen_pendukung/' . $usulan['documet']) ?>" target="_blank" style="width: 150px;"><i class="fa fa-eye"></i> Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>