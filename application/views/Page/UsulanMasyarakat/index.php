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
                <h4>USULAN MASYARAKAT BARU</h4>
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
                                <button class="btn btn-success btn-sm proses" data-id="<?= $value["id_usulan_masyarakat"] ?>" data-toggle="modal" data-target=".bs-example-modal-lg">
                                    Di Proses
                                </button>
                                <button class="btn btn-danger btn-sm tolak" data-id="<?= $value["id_usulan_masyarakat"] ?>">
                                    Tolak
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
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
            </div>
            <form action="<?= base_url("Usulan/terima_usulan") ?>" method="post" novalidate enctype="multipart/form-data">
                <input type="hidden" name="id_usulan_masyarakat" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">PRIORITAS</label>
                                <select name="prioritas" class="form-control" require>
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
                                <input type="file" name="foto_lokasi" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                    <label class="form-check-label" for="defaultCheck1">
                                        DOKUMEN SEBELUM NYA DARI MASYARAKAT?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 docPen">

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