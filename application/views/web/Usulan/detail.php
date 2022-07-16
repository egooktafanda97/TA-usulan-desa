<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Usulan</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="<?= base_url("assets/website/") ?>assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url("assets/website/") ?>assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
    <link rel="stylesheet" href="<?= base_url("assets/website/") ?>assets/css/ollie.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap');

        .cards {
            background-color: #fff;
            width: 100%;
            padding: 20px;
            border-radius: 5px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        label {
            font-family: 'Rubik', sans-serif;
        }

        .containers {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            /* align-items: center; */
            padding: 10px;


        }

        .content {
            border-left: 2px solid #ddd;
            padding-left: 30px;
            width: 300px;


        }

        .content .box:nth-child(2) {
            background: #45B4EC;
        }

        .content .box:nth-child(2):after {
            border-color: transparent #45B4EC transparent transparent;
        }

        .content .box:nth-child(3) {
            background: #CE45EC;
        }

        .content .box:nth-child(3):after {
            border-color: transparent #CE45EC transparent transparent;
        }





        .content .box {
            width: 100%;
            height: 100px;
            padding: 10px;
            border-radius: 8px;
            background: #ddd;
            margin-bottom: 10px;
            font-family: sans-serif;
            position: relative;

        }

        .box:before {
            content: '';
            display: block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #000;
            border: 3px solid #ddd;
            position: absolute;
            top: 10px;
            left: -39px;
        }

        .box:after {
            content: "";
            width: 0;
            height: 0;
            border-style: solid;

            border-color: transparent #ddd transparent transparent;
            border-width: 8px;

            position: absolute;
            left: -16px;
            top: 10px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.css">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar navbar-light bg-light navbar-expand-lg fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/imgs/brand.svg" alt="" class="brand-img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Buat Usulan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Usulan Anda</a>
                    </li>
                    <li class="nav-item ml-0 ml-lg-4">
                        <a class="nav-link btn btn-primary" href="<?= base_url("welcome/login/") ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header id="home" class="header" style="min-height: 150px !important; height: 150px;">
        <div class="overlay"></div>


    </header>

    <section class="section" id="about">

        <div class="container">

            <div class="row ">
                <div class="col-md-4">
                    <div class="containers">

                        <div class="content">

                            <div class="box">
                                <h4><?= tgl_i($usulan['tanggal']) ?></h4>
                                <p>MENUNGGU PROSES SELEKSI</p>
                            </div>

                            <!-- <div class="box">
                                <h1>Text</h1>
                                <p>Lorem ipsum text</p>
                            </div>

                            <div class="box">
                                <h1>Text</h1>
                                <p>Lorem ipsum text</p>
                            </div> -->

                        </div>


                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <div class="cards">
                        <div class="card-body">
                            <h5 class="card-title">Usulan Anda</h5>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Usulan</label>
                                    <p><?= $usulan['usulan_masyarakat'] ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label>Masalah</label>
                                    <p><?= $usulan['masalah'] ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label>Lokasi</label>
                                    <p><?= $usulan['lokasi'] ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label>Tanggal</label>
                                    <p><?= tgl_i($usulan['tanggal']) ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label>Dokumet Pendukung</label>
                                    <br>
                                    <a href="<?= base_url('assets/doc-usulan/' . $usulan['documet']) ?>" target="_blank">lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <section class="section bg-overlay">

        <div class="container">
            <div class="infos mb-4 mb-md-2">
                <div class="title">
                    <h6 class="subtitle font-weight-normal">Are locking for</h6>
                    <h5>Lorem inpsum</h5>
                    <p class="font-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="socials">
                    <div class="row justify-content-between">
                        <div class="col">
                            <a class="d-block subtitle"><i class="ti-microphone"></i> (123) 456-7890</a>
                            <a class="d-block subtitle"><i class="ti-email"></i> info@website.com</a>
                        </div>
                        <div class="col">
                            <h6 class="subtitle font-weight-normal mb-1">Social Media</h6>
                            <div class="social-links">
                                <a href="javascript:void(0)" class="link pr-1"><i class="ti-facebook"></i></a>
                                <a href="javascript:void(0)" class="link pr-1"><i class="ti-twitter-alt"></i></a>
                                <a href="javascript:void(0)" class="link pr-1"><i class="ti-google"></i></a>
                                <a href="javascript:void(0)" class="link pr-1"><i class="ti-pinterest-alt"></i></a>
                                <a href="javascript:void(0)" class="link pr-1"><i class="ti-instagram"></i></a>
                                <a href="javascript:void(0)" class="link pr-1"><i class="ti-rss"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- core  -->
    <script src="<?= base_url("assets/website/") ?>assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="<?= base_url("assets/website/") ?>assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="<?= base_url("assets/website/") ?>assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Owl carousel  -->
    <script src="<?= base_url("assets/website/") ?>assets/vendors/owl-carousel/js/owl.carousel.js"></script>


    <!-- Ollie js -->
    <script src="<?= base_url("assets/website/") ?>assets/js/Ollie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.js"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?= base_url("assets/js/axios/dist/axios.min.js") ?>"></script>
    <!-- include summernote css/js -->
    <?php if (!empty($this->session->flashdata("success"))) : ?>
        <script>
            swal({
                title: "Good job!",
                text: "<?= $this->session->flashdata("success") ?>",
                icon: "success",
                button: "ok",
            });
        </script>
    <?php endif ?>
    <?php if (!empty($this->session->flashdata("error"))) : ?>
        <script>
            swal({
                title: "Oops!",
                text: "<?= $this->session->flashdata("error") ?>",
                icon: "error",
                button: "ok",
            });
        </script>
    <?php endif ?>

    <script>
        $(function() {

            $(document).ready(function() {
                $('.summernote').summernote({
                    height: 200
                });
            });

        });
    </script>

</body>

</html>