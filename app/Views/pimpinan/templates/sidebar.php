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
   <!-- <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url(); ?>pimpinan">
         <i class="fas fa-fw fa-tachometer-alt"></i>
         <span>Dashboard</span></a>
   </li> -->

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
         aria-controls="collapseTwo">
         <i class="fas fa-fw fa-folder"></i>
         <span>SK</span>
      </a>
      <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url(); ?>pimpinan">Daftar SK</a>
            <!-- <a class="collapse-item" href="<?php echo base_url(); ?>pimpinan/finnal_sk">SK Final</a> -->
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