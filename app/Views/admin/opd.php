<?php echo $this->extend('admin/templates/template'); ?>
<?php echo $this->section('content'); ?>

<div class="container-fluid">
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h5 class="m-0 font-weight-bold text-dark">Tabel Data Organisasi Perangkat Daerah (OPD)</h5>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm btn-sm" data-toggle="modal"
            data-target="#tambahOPDModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah OPD</a>
      </div>
      <div class="flash-data-fraksi" id="flash-data-fraksi" data-flashdata="<?php echo session('success'); ?>"></div>
      <?php if (session()->has('success')) { ?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data OPD berhasil <?php echo session('success'); ?>!</strong>
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
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr class="text-center">
                     <th class="col-1">Kode</th>
                     <th class="col-5">Name OPD</th>
                     <th class="col-3">Akronim</th>
                     <th class="col-3">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center">
                     <th class="col-1">Kode</th>
                     <th class="col-5">Nama OPD</th>
                     <th class="col-3">Akronim</th>
                     <th class="col-3">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($opd)) { ?>
                  <tr>
                     <td colspan="6" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data OPD belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php foreach ($opd as $o) { ?>
                  <tr>
                     <td class="text-center"><?php echo $o['kd_opd']; ?></td>
                     <td><?php echo $o['opd']; ?></td>
                     <td><?php echo $o['akronim']; ?></td>
                     <td>
                        <div class="d-flex justify-content-around row">
                           <a class="btn btn-success btn-sm"
                              href="<?php echo base_url(); ?>admin/anggota_opd/<?php echo $o['kd_opd']; ?>">Anggota</a>

                           <a class="btn btn-primary btnEditOPD btn-sm" data-toggle="modal" data-target="#ubahOPDModal"
                              data-kd_opd="<?php echo $o['kd_opd']; ?>" data-opd="<?php echo $o['opd']; ?>"
                              data-akronim="<?php echo $o['akronim']; ?>" id="btnEditOPD" type="button">Edit</a>

                           <form action="<?php echo base_url(); ?>admin/kategori_opd/<?php echo $o['kd_opd']; ?>"
                              method="post" class="d-inline">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="kd_opd" value="<?php echo $o['kd_opd']; ?>">
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-hapus-jadwal btn-sm">Hapus</button>
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

<?php echo $this->include('admin/modals/modal_add_opd'); ?>
<?php echo $this->include('admin/modals/modal_update_opd'); ?>
<?php echo $this->endSection('content'); ?>