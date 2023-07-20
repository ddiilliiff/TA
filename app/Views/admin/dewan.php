<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">

   <!-- Page Heading -->
   <!-- <h1 class="h3 mb-2 text-gray-800">Data Anggota Dewan</h1> -->

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tabel Data Anggota Dewan</h6>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm" data-toggle="modal"
            data-target="#tambahDewanModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
      </div>
      <?php if (session()->has('success')) { ?>
      <div class="container col-6 alert alert-success alert-dismissible fade show text-center" role="alert">
         <strong>Data Anggota Dewan berhasil <?php echo session('success'); ?>.</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <script>
      // Menghilangkan flash data setelah 3 detik (3000 ms)
      setTimeout(function() {
         $('.alert').fadeOut();
      }, 1000);
      </script>
      <?php } ?>
      <?php if (session()->has('error')) { ?>
      <div class="container col-6 alert alert-warning alert-dismissible fade show text-center" role="alert">
         <strong><?php echo session('error'); ?></strong>
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
                     <th class="col-1 text-center">No.</th>
                     <th class="col-2">Nama Anggota Dewan</th>
                     <th class="col-2">Fraksi</th>
                     <th class="col-2">Jabatan</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center text-bold">
                     <th class="col-1">No.</th>
                     <th class="col-2">Nama Anggota Dewan</th>
                     <th class="col-2">Fraksi</th>
                     <th class="col-2">Jabatan</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($dewan)) { ?>
                  <tr>
                     <td colspan="6" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data Anggota Dewan belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php $i = 1;
                      foreach ($dewan as $dwn) { ?>
                  <tr>
                     <td class="text-center"><?php echo $i++; ?></td>
                     <td><?php echo $dwn['nama']; ?></td>
                     <td><?php echo $dwn['fraksi']; ?> (<?php echo $dwn['akronim']; ?>)</td>
                     <td><?php echo $dwn['jabatan']; ?></td>
                     <td>
                        <div class="d-flex justify-content-around row">

                           <a class="btn btn-primary btnEditDewan" data-toggle="modal" data-target="#ubahDewanModal"
                              data-id_dewan="<?php echo $dwn['id_dewan']; ?>" data-nama="<?php echo $dwn['nama']; ?>"
                              data-tempat_lahir="<?php echo $dwn['tempat_lahir']; ?>"
                              data-tanggal_lahir="<?php echo $dwn['tanggal_lahir']; ?>"
                              data-alamat="<?php echo $dwn['alamat']; ?>" data-no_hp="<?php echo $dwn['no_hp']; ?>"
                              data-fraksi="<?php echo $dwn['kd_fraksi']; ?>"
                              data-jabatan="<?php echo $dwn['kd_jabatan']; ?>" id="btnEditDewan" type="button">Edit</a>

                           <a class="btn btn-danger btn-hapus-dewan"
                              href="<?php echo base_url(); ?>admin/dewan/<?php echo $dwn['id_dewan']; ?>"
                              id="btn-hapus-dewan">Hapus</a>

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

<?php echo $this->include('admin/modals/modal_add_dewan'); ?>
<?php echo $this->include('admin/modals/modal_update_dewan'); ?>
<?php echo $this->endSection('content'); ?>