     <div class="col-md-3 left_col">
       <div class="left_col scroll-view">
         <div class="navbar nav_title" style="border: 0;">
           <a href="index.html" class="site_title"><span>MUSREMBANG</span></a>
         </div>

         <div class="clearfix"></div>

         <!-- menu profile quick info -->
         <div class="profile clearfix">
           <div class="profile_pic">
             <img src="<?= base_url('assets/'); ?>img/default.jpg" alt="..." class="img-circle profile_img">
           </div>
           <div class="profile_info">
             <span><?= !empty(getUserLogin()) ? getUserLogin()["nama"] : "" ?></span>
             <h2><?= !empty(getUserLogin()) ? getUserLogin()["role"] : "" ?></h2>
           </div>
         </div>
         <!-- /menu profile quick info -->

         <br />

         <!-- sidebar menu -->
         <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
           <div class="menu_section">
             <h3>General</h3>
             <ul class="nav side-menu">
               <li>
                 <a href="<?= base_url("Admin/index") ?>">
                   <i class="fa fa-home"></i> Home
                 </a>

               </li>
               <?php if ($this->session->userdata()['user']->role == "SUPER-ADMIN") : ?>
                 <li>
                   <a href="<?= base_url("MUser/index") ?>">
                     <i class="fa fa-user"></i> User Kecamatan
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Bapeda/usulan_baru_kecamatan") ?>">
                     <i class="fa fa-folder"></i> Pengajuan Usulan Baru
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Bapeda/usulan_kecamatan_diterima") ?>">
                     <i class="fa fa-folder"></i> Usulan Diterima
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Bapeda/usulan_kecamatan_ditolak") ?>">
                     <i class="fa fa-folder"></i> Usulan Ditolak
                   </a>
                 </li>
               <?php endif ?>
               <?php if ($this->session->userdata()['user']->role == "KECAMATAN") : ?>
                 <li>
                   <a href="<?= base_url("MUser/user_desa") ?>">
                     <i class="fa fa-user"></i> User Desa
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Usulan/usulan_desa_by_kec") ?>">
                     <i class="fa fa-folder"></i> Usulan Baru Desa
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Usulan/detailUsulanDesaDikirimKecamatan") ?>">
                     <i class="fa fa-folder"></i> Usulan Diajukan
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Usulan/UsulanDesaDiTolak") ?>">
                     <i class="fa fa-folder"></i> Usulan Di Tolak
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Usulan/semua_usulan_desa_by_kec") ?>">
                     <i class="fa fa-folder"></i> Semua Usulan
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Usulan/usulan_diterima_bapeda") ?>">
                     <i class="fa fa-folder"></i> Usulan Diterima Bapeda
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Usulan/usulan_ditlak_bapeda") ?>">
                     <i class="fa fa-folder"></i> Usulan Ditolak Bapeda
                   </a>
                 </li>
               <?php endif ?>
               <?php if ($this->session->userdata()['user']->role == "DESA") : ?>
                 <li>
                   <a href="<?= base_url("MUser/user_masyarakat") ?>">
                     <i class="fa fa-user"></i> Permohonan Akun Baru
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("MUser/account_people") ?>">
                     <i class="fa fa-user"></i> Akun Masyarakat
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("MUser/account_people_block") ?>">
                     <i class="fa fa-user"></i> Akun Masyarakat Di Blikir
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Usulan/usulan_masyarakat") ?>">
                     <i class="fa fa-folder"></i> Usulan Baru Masyarakat
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Usulan/usulan_masyarakat_ditolak") ?>">
                     <i class="fa fa-folder"></i> Usulan Masyarakat Ditolak
                   </a>
                 </li>
                 <li>
                   <a href="<?= base_url("Usulan/usulan_desa") ?>">
                     <i class="fa fa-folder"></i> Usulan Desa
                   </a>
                 </li>
               <?php endif ?>
             </ul>
           </div>

         </div>
         <!-- /sidebar menu -->

         <!-- /menu footer buttons -->
       </div>
     </div>

     <!-- top navigation -->
     <div class="top_nav">
       <div class="nav_menu">
         <nav>
           <div class="nav toggle">
             <a id="menu_toggle"><i class="fa fa-bars"></i></a>
           </div>

           <ul class="nav navbar-nav navbar-right">
             <li class="">
               <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 <img src="<?= base_url('assets/'); ?>img/default.jpg" alt=""><?= !empty(getUserLogin()) ? getUserLogin()["nama"] : "" ?>
                 <span class=" fa fa-angle-down"></span>
               </a>
               <ul class="dropdown-menu dropdown-usermenu pull-right">
                 <li><a href="<?= base_url("Login/logout") ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
               </ul>
             </li>
           </ul>
         </nav>
       </div>
     </div>
     <!-- /top navigation -->
     <!-- page content -->
     <div class="right_col" role="main">
       <div class="">