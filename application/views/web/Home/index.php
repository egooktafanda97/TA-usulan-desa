<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Musrenbang</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="<?= base_url("assets/website/") ?>assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url("assets/website/") ?>assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
    <link rel="stylesheet" href="<?= base_url("assets/website/") ?>assets/css/ollie.css">

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
                        <a class="nav-link" href="<?= base_url("welcome/index") ?>">Home</a>
                    </li>
                    <?php if (!empty($this->session->userdata()['user']) && $this->session->userdata()['user']->role == "MASYARAKAT") : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("welcome/usulan") ?>">Buat Usulan</a>
                        </li>
                    <?php endif ?>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#about">Usulan Anda</a>
                    </li> -->
                    <?php if (!empty($this->session->userdata()['user']) && $this->session->userdata()['user']->role == "MASYARAKAT") : ?>
                        <li class="nav-item ml-0 ml-lg-4">
                            <a class="nav-link btn btn-primary" href="<?= base_url("welcome/logout/") ?>">logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item ml-0 ml-lg-4">
                            <a class="nav-link btn btn-primary" href="<?= base_url("welcome/login/") ?>">Login</a>
                        </li>
                    <?php endif ?>

                </ul>
            </div>
        </div>
    </nav>


    <header id="home" class="header">
        <div class="overlay"></div>

        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="container">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">Musrenbang<br> Usulan Masyarakat</h1>
                            <?php if (!empty($this->session->userdata()['user']) && $this->session->userdata()['user']->role == "MASYARAKAT") : ?>
                                <a class="btn btn-primary btn-rounded" href="<?= base_url("welcome/usulan") ?>">Buat Usulan</a>
                            <?php else : ?>
                                <a class="btn btn-primary btn-rounded" href="<?= base_url("welcome/regis/") ?>">Buat Akun Masyarakat</a>
                            <?php endif ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="section" id="about">

        <div class="container">

            <div class="row ">
                <div class="col-md-12">
                    <h6 class="xs-font mb-0">Musrenbang</h6>
                    <h3 class="section-title">TENTANG</h3>
                    <p>Selamat Datang Di Aplikasi E-Musrenbang. E-Musrenbang adalah sistem informasi perencanaan berbasis website yang dibangun untuk menselaraskan Aspirasi dan ide antara masyarakat, komunitas, Gampong /Desa, kecamatan, SKPK, DPRK dengan pemerintah dalam penyusunan Rencana pembangunan Pemerintah daerah secara efektif dan efisien serta transparan.</p>
                </div>
                <div class="col-sm-8 col-md-8">

                </div>
            </div>
        </div>
    </section>






    <!-- <section class="section" id="testmonial">
        <div class="container">
            <h6 class="xs-font mb-0">Culpa perferendis excepturi.</h6>
            <h3 class="section-title">Testmonials</h3>

            <div id="owl-testmonial" class="owl-carousel owl-theme mt-4">
                <div class="item">
                    <div class="textmonial-item">
                        <img src="assets/imgs/avatar1.jpg" class="avatar" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, ollie Landing page">
                        <div class="des">
                            <h5 class="ti-quote-left font-weight-bold"></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ea facere voluptatum corrupti doloremque odit sequi labore rerum maiores libero.adipisicing elit. Vitae quasi voluptatem sed quaerat dolorum architecto reiciendis magni laboriosam, illum, nobis, quae dolor, ducimus libero! Sapiente deleniti sit dolor, ex possimus.</p>
                            <h5 class="ti-quote-left text-right font-weight-bold"></h5>

                            <div class="line"></div>
                            <h6 class="name">Emma Re</h6>
                            <h6 class="xs-font">Full stack developer</h6>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="textmonial-item">
                        <img src="assets/imgs/avatar2.jpg" class="avatar" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, ollie Landing page">
                        <div class="des">
                            <h5 class="ti-quote-left font-weight-bold"></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ea facere voluptatum corrupti doloremque odit sequi labore rerum maiores libero.adipisicing elit. Vitae quasi voluptatem sed quaerat dolorum architecto reiciendis magni laboriosam, illum, nobis, quae dolor, ducimus libero! Sapiente deleniti sit dolor, ex possimus.</p>
                            <h5 class="ti-quote-left text-right font-weight-bold"></h5>

                            <div class="line"></div>
                            <h6 class="name">John Doe</h6>
                            <h6 class="xs-font">Graphic Designer</h6>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="textmonial-item">
                        <img src="assets/imgs/avatar3.jpg" class="avatar" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, ollie Landing page">
                        <div class="des">
                            <h5 class="ti-quote-left font-weight-bold"></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ea facere voluptatum corrupti doloremque odit sequi labore rerum maiores libero.adipisicing elit. Vitae quasi voluptatem sed quaerat dolorum architecto reiciendis magni laboriosam, illum, nobis, quae dolor, ducimus libero! Sapiente deleniti sit dolor, ex possimus.</p>
                            <h5 class="ti-quote-left text-right font-weight-bold"></h5>

                            <div class="line"></div>
                            <h6 class="name">Emily Roe</h6>
                            <h6 class="xs-font">Freelancer</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="section bg-overlay">

        <div class="container">
            <div class="infos mb-4 mb-md-2">
                <!-- <div class="title">
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
                </div> -->
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

</body>

</html>