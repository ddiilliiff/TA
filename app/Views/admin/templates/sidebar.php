<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>admin">
      <div class="sidebar-brand-icon rotate-n-45">
         <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" width="30px" height="40px">
      </div>
      <div class="sidebar-brand-text mx-3"><sup>SIMSISKA<br></sup></div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Nav Item - Dashboard -->
   <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url(); ?>admin">
         <i class="fas fa-fw fa-tachometer-alt"></i>
         <span>Dashboard</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
      Database
   </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
         aria-controls="collapseTwo">
         <i class="fas fa-fw fa-folder"></i>
         <span>Data Umum</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header"> Fraksi dan Jabatan</h6> -->
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/kategori_periode">Periode</a>
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/kategori_komisi">Komisi</a>
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/kategori_jabatan">Jabatan</a>
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/kategori_fraksi">Fraksi</a>
            <!-- <a class="collapse-item" href="<?php echo base_url(); ?>admin/anggota_dewan">Anggota Dewan</a> -->
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/kategori_opd">OPD</a>
         </div>
      </div>
   </li>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
         aria-controls="collapseTwo">
         <i class="fas fa-fw fa-folder"></i>
         <span>Agenda</span>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/sidang">Agenda Sidang</a>
         </div>
      </div>
   </li>


   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
         aria-controls="collapseTwo">
         <i class="fas fa-fw fa-folder"></i>
         <span>Pembuatan SK</span>
      </a>
      <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Data SK</h6> -->
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/draft_sk_notulensi">Draft SK</a>
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/sk">SK</a>
         </div>
      </div>
   </li>

   <!-- Nav Item - Utilities Collapse Menu -->
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess"
         aria-expanded="true" aria-controls="collapseUtilities">
         <i class="fas fa-fw fa-file"></i>
         <span>Tracking SK</span>
      </a>
      <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilitiess" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/tracking">SK</a>
         </div>
      </div>
   </li>

   <!-- Nav Item - Utilities Collapse Menu -->
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
         aria-expanded="true" aria-controls="collapseUtilities">
         <i class="fas fa-fw fa-wrench"></i>
         <span>Informasi Pengguna</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/pengguna">Pengguna</a>
         </div>
      </div>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

</ul>