<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container-fluid">

   <!-- Page Heading -->
   <!-- <h1 class="h3 mb-2 text-gray-800">Data Fraksi (PARTAI POLITIK)</h1> -->

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tabel Data Fraksi / Partai Politik</h6>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm btn-sm" data-toggle="modal"
            data-target="#tambahFraksiModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Fraksi</a>
      </div>
      <div class="flash-data-fraksi" id="flash-data-fraksi" data-flashdata="<?php echo session('success'); ?>"></div>
      <?php if (session()->has('success')) { ?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Fraksi berhasil <?php echo session('success'); ?>!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <!-- <script>
      // Menghilangkan flash data setelah 3 detik (3000 ms)
      setTimeout(function() {
         $('.alert').fadeOut();
      }, 5000);
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
                                                        }, 5000);
                                                        </script>";
                                    } ?>
            </div>
         </div>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr class="text-center">
                     <th class="col-1">No.</th>
                     <th class="col-5">Name Fraksi</th>
                     <th class="col-3">Akronim</th>
                     <th class="col-3">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center">
                     <th class="col-1">No.</th>
                     <th class="col-5">Nama Fraksi</th>
                     <th class="col-3">Akronim</th>
                     <th class="col-3">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($fraksi)) { ?>
                  <tr>
                     <td colspan="6" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data Fraksi belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php $i = 1;
                      foreach ($fraksi as $frks) { ?>
                  <tr>
                     <td class="text-center"><?php echo $i++; ?></td>
                     <td><?php echo $frks['fraksi']; ?></td>
                     <td class="text-center"><?php echo $frks['akronim']; ?></td>
                     <td>
                        <div class="d-flex justify-content-around row">

                           <a class="btn btn-info btn-sm"
                              href="<?php echo base_url(); ?>admin/anggota_fraksi/<?php echo $frks['kd_fraksi']; ?>">Anggota</a>

                           <a class="btn btn-primary btnEditFraksi btn-sm" data-toggle="modal"
                              data-target="#modalUbahFraksi" data-kd_fraksi="<?php echo $frks['kd_fraksi']; ?>"
                              data-fraksi="<?php echo $frks['fraksi']; ?>"
                              data-akronim="<?php echo $frks['akronim']; ?>" id="btnEditFraksi" type="button">Edit</a>


                           <form
                              action="<?php echo base_url(); ?>admin/kategori_fraksi/<?php echo $frks['kd_fraksi']; ?>"
                              method="post" class="d-inline">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="kd_fraksi" value="<?php echo $frks['kd_fraksi']; ?>">
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-hapus-fraksi btn-sm">Hapus</button>
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

<?php echo $this->include('admin/modals/modal_add_fraksi'); ?>

<?php echo $this->include('admin/modals/modal_view_dewan_by_fraksi'); ?>

<?php echo $this->include('admin/modals/modal_update_fraksi'); ?>

<?php echo $this->endSection('content'); ?>