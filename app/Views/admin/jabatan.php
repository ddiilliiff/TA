<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container-fluid">

   <!-- Page Heading -->
   <!-- <h1 class="h3 mb-2 text-gray-800">Data Jabatan</h1> -->

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tabel Data Jabatan</h6>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm btn-sm" data-toggle="modal"
            data-target="#tambahJabatanModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
      </div>
      <?php if (session()->has('success')) { ?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Jabatan berhasil <?php echo session('success'); ?></strong>
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
                                        ."<script> 
                                                setTimeout(function() {
                                                    $('.alert').fadeOut();
                                                }, 10000);
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
                     <th class="col-1">Nomor</th>
                     <th class="col-9">Nama Jabatan</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center">
                     <th class="col-1">Nomor</th>
                     <th class="col-9">Nama Jabatan</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($jabatan)) { ?>
                  <tr>
                     <td colspan="6" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data Jabatan belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php $i = 1;
                      foreach ($jabatan as $jbtn) { ?>
                  <tr>
                     <td><?php echo $i++; ?></td>
                     <td><?php echo $jbtn['jabatan']; ?></td>
                     <td>
                        <div class="d-flex justify-content-around row">
                           <a class="btn btn-primary btnEditFraksi btn-sm" data-toggle="modal"
                              data-target="#modalUbahJabatan" data-kd_jabatan="<?php echo $jbtn['kd_jabatan']; ?>"
                              data-jabatan="<?php echo $jbtn['jabatan']; ?>" id="btnEditJabatan" type="button">Edit</a>
                           <a class="btn btn-danger btn-hapus-jabatan btn-sm"
                              href="<?php echo base_url(); ?>admin/kategori_jabatan/<?php echo $jbtn['kd_jabatan']; ?> "
                              id="btn-hapus-jabatan">Hapus</a>
                        </div>
                     </td>
                  </tr>
                  <?php }?>
                  <?php }?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<?php echo $this->include('admin/modals/modal_add_jabatan'); ?>

<?php echo $this->include('admin/modals/modal_update_jabatan'); ?>

<?php echo $this->endSection('content'); ?>