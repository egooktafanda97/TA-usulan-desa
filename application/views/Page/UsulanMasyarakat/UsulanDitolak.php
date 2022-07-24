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

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="continers-main">
    <div class="cards">
        <div class="card-body-main">
            <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;border-bottom: 2px solid gray;">
                <h4>USULAN MASYARAKAT YANG DITOLAK</h4>
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Usulan</button> -->
            </div>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nik Pengusul</th>
                        <th>Nama Pengusul</th>
                        <th>Alamat</th>
                        <th>Dusun</th>
                        <th>RT/RW</th>
                        <th>Usulan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($usulan as  $value) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $value['nik'] ?></td>
                            <td><?= $value['nama_pengusul'] ?></td>
                            <td><?= $value['alamat_lengap'] ?></td>
                            <td><?= $value['dusun'] ?></td>
                            <td><?= $value['rt_rw'] ?></td>
                            <td>
                                <a href="<?= base_url("Usulan/detail_usulan/" . $value["id_usulan_masyarakat"]) ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i> Usulan
                                </a>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm deletes" data-id="<?= $value["id_usulan_masyarakat"] ?>">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>