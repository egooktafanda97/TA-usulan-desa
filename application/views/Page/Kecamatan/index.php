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
                <h4>Data Akun Kecamatan</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Data</button>
            </div>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kecamatan</th>
                        <th>Nama Kepala Camat</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($data_kecamatan as  $value) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $value['nama_kecamatan'] ?></td>
                            <td><?= $value['nama_camat'] ?></td>
                            <td><?= $value['username'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-success btn-sm btn-edit" data-toggle="modal" data-target=".bs-example-modal-lg" data-unit="<?= implode(',', array_map_assoc(function ($k, $v) {
                                                                                                                                                        return "$k:$v";
                                                                                                                                                    }, $value)) ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm delete" data-id="<?= $value['id_user'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
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
            <form action="<?= base_url("p/UserKecamatanAction") ?>" method="post" novalidate>
                <input type="hidden" name="kode_kecamatan" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <select name="nama_kecamatan" class="form-control form-control-sm" required>
                                    <?php foreach ($kecamatan as $value) : ?>
                                        <option value="<?= $value['nama_kecamatan'] ?>"><?= $value['nama_kecamatan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Kepala Kecamatan</label>
                                <input type="text" name="nama_camat" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>