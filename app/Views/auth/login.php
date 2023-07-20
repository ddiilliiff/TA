<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Login</title>

   <!-- Custom fonts for this template-->
   <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
      type="text/css">
   <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

   <div class="container">

      <!-- Outer Row -->
      <div class="row justify-content-center">

         <div class="col-xl-6 col-lg-6 col-md-6 mt-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
               <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="p-5">
                           <div class="text-center">
                              <h1 class="h6 text-dark mb-4">
                                 SISTEM INFORMASI PENJADWALAN SIDANG <br>
                                 DAN PEMBUATAN SURAT KEPUTUSAN <br>
                                 SEKRETARIAT DPRD KABUPATEN KEEROM
                              </h1>
                           </div>
                           <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4">Login</h1>
                           </div>
                           <?php if (session()->getFlashdata('error')) { ?>
                           <div class="container alert alert-danger alert-dismissible fade show" role="alert">
                              <strong><?php echo session()->getFlashdata('error'); ?></strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <?php } ?>
                           <?php if (session()->getFlashdata('logout')) { ?>
                           <div class="container alert alert-success alert-dismissible fade show" role="alert">
                              <strong><?php echo session()->getFlashdata('logout'); ?></strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <?php } ?>
                           <form class="user" action="<?php echo base_url(); ?>auth/authentication" method="post">
                              <?php csrf_field(); ?>
                              <div class="form-group">
                                 <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp"
                                    placeholder="Nomor Handphone">
                              </div>
                              <div class="form-group">
                                 <input type="password" class="form-control form-control-user" id="password"
                                    placeholder="Password" name="password">
                              </div>
                              <div class="form-group container">
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="admin" value="1"
                                       required>
                                    <label class="form-check-label" for="admin">
                                       Administrator
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="pimpinan" value="2"
                                       required>
                                    <label class="form-check-label" for="pimpinan">
                                       Pimpinan Dewan
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="dewan" value="3"
                                       required>
                                    <label class="form-check-label" for="dewan">
                                       Anggota Dewan
                                    </label>
                                 </div>
                              </div>
                              <input class="btn btn-primary btn-block" type="submit" name="POST" value="Masuk">
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>

      </div>

   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>