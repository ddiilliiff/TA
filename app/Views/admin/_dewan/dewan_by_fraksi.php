<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h5 class="m-0 font-weight-bold text-dark">Tabel Data Anggota Fraksi - <?php echo $fraksi['fraksi']; ?>
            (<?php echo $fraksi['akronim']; ?>)</h5>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm btn-sm" data-toggle="modal"
            data-target="#tambahAnggotaFraksiModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
      </div>
      <?php if (session()->has('success')) { ?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Anggota Fraksi berhasil <?php echo session('success'); ?></strong>
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
            <div class="col-4">
               <?php
                                    if (session()->get('err')) {
                                        echo "<div class='alert alert-warning alert-info' role='alert'>".session()->get('err').'</div>'
                                            ."<script> setTimeout(function() {
                                                            $('.alert-info').fadeOut();
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
                     <th class="col-2">Jabatan</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center text-bold">
                     <th class="col-1">No.</th>
                     <th class="col-2">Nama Anggota Dewan</th>
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
                     <td><?php echo $dwn['jabatan']; ?></td>
                     <td>
                        <div class="d-flex justify-content-around row">
                           <a class="btn btn-primary btn-edit-dewan btn-sm" id="btnEditDewan" data-toggle="modal"
                              data-target="#ubahAnggotaFraksiModal" data-id_dewan="<?php echo $dwn['id_dewan']; ?>"
                              data-kd_jabatan="<?php echo $dwn['kd_jabatan']; ?>"
                              data-id_periode="<?php echo $dwn['id_periode']; ?>"
                              data-kd_komisi="<?php echo $dwn['kd_komisi']; ?>" data-nama="<?php echo $dwn['nama']; ?>"
                              data-tempat_lahir="<?php echo $dwn['tempat_lahir']; ?>"
                              data-tanggal_lahir="<?php echo $dwn['tanggal_lahir']; ?>"
                              data-alamat="<?php echo $dwn['alamat']; ?>"
                              data-no_hp="<?php echo $dwn['no_hp']; ?>">Edit</a>

                           <!-- <a class="btn btn-info btn-edit-dewan btn-sm" id="btn-edit-dewan">Detail</a> -->

                           <div class="d-flex justify-content-around row">
                              <a class="btn btn-danger btn-hapus-dewan btn-sm"
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
<?php echo $this->include('admin/modals/modal_add_anggota_by_fraksi'); ?>
<?php echo $this->include('admin/modals/modal_update_anggota_by_fraksi'); ?>
<?php echo $this->endSection('content'); ?>