<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container-fluid">

   <!-- Page Heading -->
   <!-- <h1 class="h3 mb-2 text-gray-800">Data Jadwal</h1> -->

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tabel Data Jadwal Sidang</h6>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm btn-sm" data-toggle="modal"
            data-target="#tambahJadwalModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Jadwal</a>
      </div>
      <?php if (session()->has('notif')) { ?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
         <strong><?php echo session('notif'); ?>.</strong>
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
      <?php if (session()->has('success')) { ?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Jadwal Sidang berhasil <?php echo session('success'); ?>.</strong>
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
                        echo "<div class='alert alert-danger' role='alert'>".session()->get('err').'</div>'
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
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr class="text-center">
                     <th class="col-1">Nama Sidang</th>
                     <th class="col-1">Hari/Tanggal</th>
                     <th class="col-1">Waktu</th>
                     <th class="col-1">Tempat</th>
                     <th class="col-1">Keterangan</th>
                     <th class="col-1">Status</th>
                     <th class="col-3">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center">
                     <th class="col-1">Nama Sidang</th>
                     <th class="col-1">Hari/Tanggal</th>
                     <th class="col-1">Waktu</th>
                     <th class="col-1">Tempat</th>
                     <th class="col-1">Keterangan</th>
                     <th class="col-1">Status</th>
                     <th class="col-3">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($jadwal)) { ?>
                  <tr>
                     <td colspan="7" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data Jadwal Sidang belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php $i = 1;
                      foreach ($jadwal as $key => $jdwl) { ?>
                  <tr>
                     <?php if ($key === 0) { ?>
                     <td rowspan="<?php echo count($jadwal); ?>"><?php echo $jdwl['nama']; ?></td>
                     <?php } ?>
                     <td><?php echo \App\Helpers\MyHelper::formatTanggalIndonesia($jdwl['tanggal']); ?></td>
                     <td><?php echo $jdwl['waktu']; ?></td>
                     <td><?php echo $jdwl['tempat']; ?></td>
                     <td><?php echo $jdwl['keterangan']; ?></td>
                     <td class="text-center"><span
                           class="badge badge-pill <?php echo $jdwl['status'] == 1 ? 'badge-success' : ($jdwl['status'] == 2 ? 'badge-warning' : 'badge-primary'); ?> px-1"><?php echo $jdwl['status'] == 1 ? 'Baru' : ($jdwl['status'] == 2 ? 'Tindak Lanjut' : 'Selesai'); ?></span>
                     </td>
                     <td>
                        <div class="d-flex justify-content-around row ">

                           <a class="btn btn-warning btnEditJadwal btn-sm"
                              href="<?php echo base_url(); ?>admin/peserta/<?php echo $jdwl['id_jadwal']; ?>">Peserta</a>
                           <a class="btn btn-info btn-sm"
                              href="<?php echo base_url(); ?>admin/notulensi/<?php echo $jdwl['id_jadwal']; ?>">Notulensi</a>

                           <?php if ($jdwl['status'] == 3) { ?>
                           <!-- Sudah tidak bisa mengirim notif ke peserta -->
                           <?php } else { ?>
                           <form action="<?php echo base_url(); ?>admin/notifikasi" method="post">
                              <input type="hidden" name="id_jadwal" value="<?php echo $jdwl['id_jadwal']; ?>">
                              <button class="btn btn-success btn-sm" type="submit">Kirim Notifikasi</button>
                           </form>
                           <?php } ?>


                           <a class="btn btn-primary btnEditJadwal btn-sm" data-toggle="modal"
                              data-target="#modalUbahJadwal" data-id_jadwal="<?php echo $jdwl['id_jadwal']; ?>"
                              data-tanggal="<?php echo $jdwl['tanggal']; ?>"
                              data-tempat="<?php echo $jdwl['tempat']; ?>" data-waktu="<?php echo $jdwl['waktu']; ?>"
                              data-status="<?php echo $jdwl['status']; ?>" id="btnEditJadwal" type="button">Edit</a>

                           <form action="<?php echo base_url(); ?>admin/jadwal/<?php echo $jdwl['id_jadwal']; ?>"
                              method="post" class="d-inline">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="id_jadwal" value="<?php echo $jdwl['id_jadwal']; ?>">
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-hapus-jadwal btn-sm">Hapus</button>
                           </form>
                        </div>
                     </td>
                  </tr>
                  <?php } ?>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<?php echo $this->include('admin/modals/modal_add_jadwal'); ?>
<?php echo $this->include('admin/modals/modal_update_jadwal'); ?>
<?php echo $this->endSection('content'); ?>