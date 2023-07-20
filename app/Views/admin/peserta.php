<?php echo $this->extend('admin/templates/template'); ?>
<?php echo $this->section('content'); ?>

<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tabel Data Peserta Sidang</h6>
         <div class="d-none d-sm-inline-block">
            <a href="#" class=" btn btn-md btn-dark shadow-sm" data-toggle="modal"
               data-target="#tambahPesertaEksModal"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Peserta
               Eksternal</a>
            <a href="#" class=" btn btn-md btn-dark shadow-sm" data-toggle="modal"
               data-target="#tambahPesertaInModal"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Peserta
               Internal</a>
         </div>
      </div>
      <div class="flash-data-fraksi" id="flash-data-fraksi" data-flashdata="<?php echo session('success'); ?>"></div>
      <?php if (session()->has('success')) { ?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Peserta Sidang <?php echo session('success'); ?>!</strong>
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
      <?php if (session()->has('error')) { ?>
      <div class="container alert alert-warning alert-dismissible fade show" role="alert">
         <strong><?php echo session('error'); ?></strong>
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
                     <td class="col-1">No.</td>
                     <th class="col-3">Nama</th>
                     <th class="col-2">No. Hp</th>
                     <th class="col-3">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center">
                     <td class="col-1">No.</td>
                     <th class="col-3">Nama</th>
                     <th class="col-2">No. Hp</th>
                     <th class="col-3">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($peserta)) { ?>
                  <tr>
                     <td colspan="6" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data Peserta Sidang belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php $i = 1;
                      foreach ($peserta as $psrt) { ?>
                  <tr>
                     <td class="text-center"><?php echo $i++; ?></td>
                     <td><?php echo $psrt['nama']; ?></td>
                     <td><?php echo $psrt['no_hp']; ?></td>
                     <td>
                        <!-- <div class="d-flex justify-content-around row">
                        <a href="<?php echo base_url(); ?>admin/peserta/<?php echo $psrt['id_peserta']; ?>" class="btn btn-danger btn-hapus-peserta">Hapus</a>
                     </div> -->
                        <div class="d-flex justify-content-around row">
                           <form action="<?php echo base_url(); ?>admin/peserta/<?php echo $psrt['id_peserta']; ?>"
                              method="post" class="d-inline">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="id_jadwal" value="<?php echo $psrt['id_jadwal']; ?>">
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-hapus-peserta">Hapus</button>
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

<?php echo $this->include('admin/modals/modal_add_peserta'); ?>
<?php echo $this->endSection('content'); ?>