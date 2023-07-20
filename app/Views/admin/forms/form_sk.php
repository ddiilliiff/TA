<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container-fluid">
   <div class="card sahdow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">FORM SK</h6>
         <div class="d-none d-sm-inline-block">
            <?php if (empty($sk)) { ?>

            <?php } else { ?>

            <a href="#" class="d-sm-inline-block btn btn-md btn-primary shadow-sm" data-toggle="modal"
               data-target="#konsideranMenimbangModal"><i class="fas fa-plus fa-sm text-white-50"></i> Konsideran
               Menimbang</a>

            <a href="#" class="d-sm-inline-block btn btn-md btn-info shadow-sm" data-toggle="modal"
               data-target="#konsideranMengingatModal"><i class="fas fa-plus fa-sm text-white-50"></i> Konsideran
               Mengingat</a>

            <a href="#" class="d-sm-inline-block btn btn-md btn-warning shadow-sm text-dark" data-toggle="modal"
               data-target="#konsideranMemperhatikanModal"><i class="fas fa-plus fa-sm text-white-50"></i> Konsideran
               Memperhatikan</a>


            <a href="#" class="d-sm-inline-block btn btn-md btn-success shadow-sm" data-toggle="modal"
               data-target="#diktumMemutuskanModal"><i class="fas fa-plus fa-sm text-white-50"></i> Diktum
               Memutuskan</a>
            <?php } ?>
         </div>

      </div>
      <?php if (session()->has('success')) { ?>
      <div class="container col-6 alert alert-success alert-dismissible fade show text-center" role="alert">
         <strong><?php echo session('success'); ?>.</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <script>
      // Menghilangkan flash data setelah 3 detik (3000 ms)
      setTimeout(function() {
         $('.alert').fadeOut();
      }, 3000);
      </script>
      <?php } ?>

      <div class="container">
         <div class="row justify-content-center">
            <div class="col-6">
               <?php
                                    if (session()->get('err')) {
                                        echo "<div class='alert alert-warning' role='alert'>".session()->get('err').'</div>'
                                            ."<script> setTimeout(function() {
                                                            $('.alert').fadeOut();
                                                        }, 10000);
                                                        </script>";
                                    } ?>
            </div>
         </div>
      </div>

      <!-- Form Yang Belum Ada Data -->
      <?php if (empty($recent_sk)) { ?>
      <form action="<?php echo base_url(); ?>admin/save_sk" method="post">
         <div class="form-group">
            <input type="hidden" name="id_notulensi" value="<?php echo $id_notulensi; ?>">
            <div class="row mx-3 my-3">
               <div class="col-2">
                  <label for="">NOMOR SK :</label>
               </div>
               <div class="col-10">
                  <input type="text" readonly class="form-control" value="<?php echo $no_sk; ?>" name="kd_sk">
               </div>
            </div>

            <div class="row mx-3 my-3">
               <div class="col-2">
                  <label for="">TAHUN :</label>
               </div>
               <div class="col-10">
                  <input type="text" readonly class="form-control" value="<?php echo date('Y'); ?>">
               </div>
            </div>

            <div class="row mx-3 my-3">
               <div class="col-2">
                  <label for="">JUDUL SK :</label>
               </div>
               <div class="col-10">
                  <textarea class="form-control" cols="30" rows="10" name="judul"></textarea>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary" name="submitSK" type="submit">Submit</button>
         </div>
      </form>
      <?php } else { ?>
      <form action="<?php echo base_url(); ?>admin/update_sk" method="post">
         <div class="form-group">
            <input type="hidden" name="id_notulensi" value="<?php echo $id_notulensi; ?>">
            <div class="row mx-3 my-3">
               <div class="col-2">
                  <label for="">NOMOR SK :</label>
               </div>
               <div class="col-10">
                  <input type="text" readonly class="form-control" value="<?php echo $recent_sk['kd_sk']; ?>"
                     name="kd_sk">
               </div>
            </div>

            <div class="row mx-3 my-3">
               <div class="col-2">
                  <label for="">TAHUN :</label>
               </div>
               <div class="col-10">
                  <input type="text" readonly class="form-control" value="<?php echo $recent_sk['tahun']; ?>">
               </div>
            </div>

            <div class="row mx-3 my-3">
               <div class="col-2">
                  <label for="">TENTANG :</label>
               </div>
               <div class="col-10">
                  <textarea class="form-control" cols="30" rows="10"
                     name="judul"><?php echo $recent_sk['judul']; ?></textarea>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary" name="updateSK" type="submit">Submit</button>
         </div>
      </form>
      <?php } ?>
   </div>
</div>
<?php echo $this->endSection('content'); ?>