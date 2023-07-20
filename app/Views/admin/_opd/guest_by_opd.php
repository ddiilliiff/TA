<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h5 class="m-0 font-weight-bold text-dark">Tabel Data Anggota OPD - <?php echo $opd['opd']; ?> </h5>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm btn-sm" data-toggle="modal"
            data-target="#tambahAnggotaOPDModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
      </div>
      <?php if (session()->has('success')) { ?>
      <div class="container col-6 alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Anggota OPD berhasil <?php echo session('success'); ?></strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <!-- <script>
      // Menghilangkan flash data setelah 3 detik (3000 ms)
      setTimeout(function() {
         $('.alert').fadeOut();
      }, 5000); -->
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
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr class="text-center">
                     <th class="col-1 text-center">#</th>
                     <th class="col-2">Nama Anggota</th>
                     <th class="col-2">No. HP</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center text-bold">
                     <th class="col-1">#</th>
                     <th class="col-2">Nama Anggota</th>
                     <th class="col-2">No. HP</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($guest)) { ?>
                  <tr>
                     <td colspan="6" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data Anggota <?php echo $opd['opd']; ?> belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php $i = 1;
                      foreach ($guest as $o) { ?>
                  <tr>
                     <td class="text-center"><?php echo $i++; ?></td>
                     <td><?php echo $o['nama_guest']; ?></td>
                     <td><?php echo $o['no_hp']; ?></td>
                     <td>
                        <div class="d-flex justify-content-around row">
                           <!-- <a class="btn btn-danger btn-hapus-dewan btn-sm"
                              href="<?php echo base_url(); ?>admin/guest/<?php echo $o['id_guest']; ?>"
                              id="btn-hapus-dewan">Hapus</a> -->
                           <form action="<?php echo base_url(); ?>admin/guest/<?php echo $o['id_guest']; ?>"
                              method="post" class="d-inline">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="id_guest" value="<?php echo $o['id_guest']; ?>">
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-hapus-guest btn-sm">Hapus</button>
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
<?php echo $this->include('admin/modals/modal_add_guest_by_opd'); ?>
<?php echo $this->endSection('content'); ?>