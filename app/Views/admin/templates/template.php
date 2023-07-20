<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title><?php echo $title; ?></title>

   <!-- Custom fonts for this template-->
   <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
      type="text/css">
   <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">



   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">

   <!-- Autocomplete -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" type="text/css">
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

   <script>
   $(function() {
      $(document).on("focus", "#menimbang", function() {
         $("#menimbang").autocomplete({
            source: "<?php echo site_url('sk/ajax'); ?>"
         });
      });
   });
   </script>
   <!-- Boostrap 5 -->
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>

<body id="page-top">

   <!-- Page Wrapper -->
   <div id="wrapper">

      <!-- Sidebar -->
      <?php echo $this->include('admin/templates/sidebar'); ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

               <!-- Sidebar Toggle (Topbar) -->
               <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
               </button>

               <div class="">
                  <strong>
                     SEKRETARIAT DPRD KABUPATEN KEEROM
                  </strong>
               </div>

               <!-- Topbar Navbar -->
               <ul class="navbar-nav ml-auto">

                  <div class="topbar-divider d-none d-sm-block"></div>

                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                        <img class="img-profile rounded-circle"
                           src="<?php echo base_url(); ?>/assets/img/undraw_profile.svg">
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                           <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                           Logout
                        </a>
                     </div>
                  </li>
               </ul>
            </nav>
            <!-- End of Topbar -->


            <!-- Begin Page Content -->
            <?php echo $this->renderSection('content'); ?>

            <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->

         <!-- Footer -->
         <footer class="sticky-footer bg-white">
            <div class="container my-auto">
               <div class="copyright text-center my-auto">
                  <span>Copyright &copy; SEKRETARIAT DPRD KABUPATEN KEEROM <?php echo date('Y'); ?></span>
               </div>
            </div>
         </footer>
         <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
   </a>



   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header bg-danger text-white">
               <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin logout?</div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
               <a class="btn btn-danger" href="<?php echo base_url(); ?>/auth/logout">Logout</a>
            </div>
         </div>
      </div>
   </div>

   <!-- Bootstrap core JavaScript-->
   <!-- <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script> -->
   <!-- <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous"></script> -->
   <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

   <!-- Page level plugins -->
   <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>

   <!-- Script -->
   <?php echo $this->include('admin/templates/script'); ?>

   <!-- Sweetalert2 -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>




</body>

</html>