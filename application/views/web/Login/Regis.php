<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .cards {
            width: 100%;
            padding: 50px;
            border-radius: 5px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
    </style>

</head>

<body>
    <div class="signin">
        <div class="group-head">

            <!-- <h2>Welcome Back,</h2>

            <p>Sign In To Continue</p> -->

        </div>

        <div class="container py-3">
            <div class="cards">
                <div class="w-100 text-center">
                    <h4>DAFTAR AKUN MASYARAKAT</h4>
                    <hr>
                </div>
                <form action="<?= base_url("login/registration") ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Nik</label><br>
                                <input type="text" name="nik" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username-field"> Nama</label><br>
                                <input type="text" name="nama_pengusul" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username-field"> Alamat</label><br>
                                <input type="text" name="alamat_lengap" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username-field"> Username</label><br>
                                <input type="text" name="username" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password-field">Password</label><br>
                                <input type="password" name="password" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username-field"> Kecamatan</label><br>
                                <select name="kecamatan" class="form-control form-control-sm">
                                    <?php foreach ($kecamatan as  $value) : ?>
                                        <option value="<?= $value['kode_kecamatan'] ?>"><?= $value['nama_kecamatan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username-field"> Desa</label><br>
                                <select name="desa" class="form-control form-control-sm">
                                    <option value="">PILIH KECAMATAN DULU</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username-field"> Dusun</label><br>
                                <input type="text" name="dusun" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username-field"> RT/RW</label><br>
                                <input type="text" name="rt_rw" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username-field">Foto</label><br>
                                <input type="file" name="foto" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username-field">Foto Ktp</label><br>
                                <input type="file" name="ktp" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-right">
                                <a href="<?= base_url("welcome/login/") ?>" class="btn btn-secondary btn-sm" style="width: 150px;"><span>Kembali Login</span></a>
                                <button type="submit" class="btn btn-primary btn-sm" style="width: 150px;"><span>Ajukan Pendaftar</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js"></script>
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");

            var input = $($(this).attr("toggle"));

            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        $("[name='kecamatan']").click(function() {
            var kecamatan = $(this).val();
            // axios get
            axios.get('<?= base_url("login/getDesa/") ?>' + kecamatan).then(function(response) {
                var opt = ``;
                response.data.map((mp, i) => {
                    opt += `<option value="${mp.kode_desa}">${mp.nama_desa}</option>`;
                });
                $("[name='desa']").html(opt);
            });
        });
    </script>
</body>

</html>