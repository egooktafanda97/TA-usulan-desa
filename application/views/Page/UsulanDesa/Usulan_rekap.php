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
        <li class="active"><a href="<?= base_url("Usulan/usulan_desa") ?>">Usulan</a></li>
        <li><a href="<?= base_url("Usulan/getUsulanDiterima") ?>">Usulan Selesai Diproses</a></li>
        <li><a href="<?= base_url("Usulan/usulanDesa") ?>">Laporan Usulan</a></li>
    </ol>
    <div class="cards">

        <div class="card-body-main">

            <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;border-bottom: 2px solid gray;">
                <h4>Usulan Selesai Diproses</h4>
                <!-- <button type="button" class="btn btn-primary btn-sm cetak"><b><i class="fa fa-print"></i> Print Laporan</b></button> -->
            </div>
            <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h4></h4>
            </div>

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width: 30px;">NO</th>
                        <th style="width: 100px;">Tanggal Usulan</th>
                        <th style="width: 100px;">Kode Desa</th>
                        <th style="width: 100px;">Tahun Usulan</th>
                        <th style="width: 100px;">Status Download</th>
                        <th style="width: 100px;">Lihat Usulan</th>
                        <th style="width: 100px;">Buat Laporan</th>
                        <th style="width: 100px;">Kirim</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($usulan as  $value) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= tgl_i($value['tanggal']) ?></td>
                            <td><?= $value['kode_report'] ?></td>
                            <td><?= $value['tahun_usulan'] ?></td>
                            <td><?= $value['status_download'] == '1' ? "Sudah Pernah Diprint" : "Belum Pernah Diprint" ?></td>
                            <td><a href="<?= base_url("Usulan/UsulanList/" . $value['kode_report']) ?>" class="btn btn-info btn-sm"><b><i class="fa fa-eye"></i> Lihat Usulan</b></a></td>
                            <td>
                                <a href="<?= base_url("Usulan/UsulanListCetak/" . $value['kode_report']) ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</a>
                            </td>
                            <td>
                                <a href="<?= base_url("Usulan/UsulanListCetak/" . $value['kode_report']) ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>