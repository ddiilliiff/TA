<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container-fluid col-8">
   <div class="card sahdow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Form Isian SK (Konsideran dan Diktum)</h6>
         <?php if ($sk == null) { ?>

         <?php } else { ?>
         <a href="<?php echo base_url(); ?>admin/pdf/<?php echo $sk['kd_sk']; ?>"
            class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm"><i
               class="fas fa-download fa-sm text-white-50"></i> Cetak
            SK</a>
         <?php } ?>

      </div>

      <div class="col-12">
         <?php if (session()->has('success')) { ?>
         <div class="container alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo session('success'); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <!-- <script>
         // Menghilangkan flash data setelah 3 detik (3000 ms)
         setTimeout(function() {
            $('.alert').fadeOut();
         }, 3000);
         </script> -->
         <?php } ?>
      </div>

      <!-- Form Yang Belum Ada Data -->
      <?php if (empty($sk)) { ?>
      <form action="<?php echo base_url(); ?>admin/save_sk" method="post">
         <input type="hidden" name="kd_draft_sk" value="<?php echo $draft_sk['kd_draft_sk']; ?>">
         <div class="modal-body">
         </div>
         <div class="modal-footer justify-content-center">
            <button class="btn btn-primary" name="submitSK" type="submit">Isi SK</button>
         </div>
      </form>
      <?php } else { ?>
      <form action="<?php echo base_url(); ?>admin/update_status_sk" method="post">
         <input type="hidden" name="kd_draft_sk" value="<?php echo $draft_sk['kd_draft_sk']; ?>">
         <div class="modal-body">
            <div class="row">

               <div class="col-3 form-group container-fluid">
                  <a href="#" class="d-sm-inline-block btn btn-md btn-primary shadow-sm" data-toggle="modal"
                     data-target="#konsideranMenimbangModal"><i class="fas fa-plus fa-sm text-white-50"></i> Konsideran
                     Menimbang</a>
               </div>

               <div class="col-3 form-group container-fluid">
                  <a href="#" class="d-sm-inline-block btn btn-md btn-info shadow-sm" data-toggle="modal"
                     data-target="#konsideranMengingatModal"><i class="fas fa-plus fa-sm text-white-50"></i> Konsideran
                     Mengingat</a>
               </div>


               <div class="col-3 form-group container-fluid">
                  <a href="#" class="d-sm-inline-block btn btn-md btn-warning shadow-sm text-dark" data-toggle="modal"
                     data-target="#konsideranMemperhatikanModal"><i class="fas fa-plus fa-sm text-white-50"></i>
                     Konsideran
                     Memperhatikan</a>
               </div>


               <div class="col-3 form-group container-fluid">
                  <a class="d-sm-inline-block btn btn-md btn-success shadow-sm" data-toggle="modal"
                     data-target="#diktumMemutuskanModal"><i class="fas fa-plus fa-sm text-white-50"></i> Diktum
                     Memutuskan</a>
               </div>
            </div>
         </div>
         <div class="modal-footer justify-content-center">
            <button class="btn btn-primary" name="submit" type="submit">Selesai</button>
         </div>
      </form>
      <?php } ?>
   </div>
</div>

<?php if (empty($sk)) { ?>
<!-- Kosong -->
<?php } else { ?>
<?php echo $this->include('admin/modals/modal_sk/modal_diktum_memutuskan'); ?>
<?php echo $this->include('admin/modals/modal_sk/modal_konsideran_mengingat'); ?>
<?php echo $this->include('admin/modals/modal_sk/modal_konsideran_menimbang'); ?>
<?php echo $this->include('admin/modals/modal_sk/modal_konsideran_memperhatikan'); ?>
<?php } ?>


<?php echo $this->endSection('content'); ?>