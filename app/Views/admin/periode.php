<?php echo $this->extend('admin/templates/template'); ?>
<?php echo $this->section('content'); ?>

<div class="container-fluid">
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h5 class="m-0 font-weight-bold text-dark">Tabel Data Periode</h5>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm btn-sm" data-toggle="modal"
            data-target="#tambahPeriodeModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Periode</a>
      </div>
      <div class="flash-data-fraksi" id="flash-data-fraksi" data-flashdata="<?php echo session('success'); ?>"></div>
      <?php if (session()->has('success')) { ?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Periode berhasil <?php echo session('success'); ?>!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <!-- <script>
      setTimeout(function() {
         $('.alert').fadeOut();
      }, 3000);
      </script> -->
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
      <div class="card-body mx-3">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr class="text-center">
                     <th class="col-1">No.</th>
                     <th class="col-9">Periode</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center">
                     <th class="col-1">No.</th>
                     <th class="col-9">Periode</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($periode)) { ?>
                  <tr>
                     <td colspan="6" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data Periode belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php $i = 1;
                      foreach ($periode as $prd) { ?>
                  <tr>
                     <td class="text-center"><?php echo $i++; ?>.</td>
                     <td><?php echo $prd['periode']; ?></td>
                     <td>
                        <div class="d-flex justify-content-around row">
                           <!-- <a class="btn btn-primary btnEditPeraturan btn-sm" id="btnEditPeriode" type="button"
                              data-toggle="modal" data-target="#editPeriodeModal">Edit</a> -->
                           <form
                              action="<?php echo base_url(); ?>admin/kategori_periode/<?php echo $prd['id_periode']; ?>"
                              method="post" class="d-inline">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="id_periode" value="<?php echo $prd['id_periode']; ?>">
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                           </form>
                        </div>
                     </td>
                  </tr>
                  <?php }?>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<?php echo $this->include('admin/modals/modal_add_periode'); ?>
<?php echo $this->include('admin/modals/modal_update_periode'); ?>
<?php echo $this->endSection('content'); ?>