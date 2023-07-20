<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container-fluid">
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tabel Data Notulensi Sidang</h6>
         <!-- <a href="#" class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm" data-toggle="modal" data-target="#tambahJadwalModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Notulensi</a> -->
      </div>
      <?php if (session()->has('success')) { ?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Jadwal Sidang berhasil <?php echo session('success'); ?>.</strong>
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
                     <th class="col-1 text-center">No.</th>
                     <th class="col-3">AGENDA</th>
                     <th class="col-2">WAKTU</th>
                     <th class="col-2">TEMPAT</th>
                     <th class="col-1">STATUS</th>
                     <th class="col-3">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center">
                     <th class="col-1">No.</th>
                     <th class="col-3">AGENDA</th>
                     <th class="col-2">WAKTU</th>
                     <th class="col-2">TEMPAT</th>
                     <th class="col-1">STATUS</th>
                     <th class="col-3">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php $i = 1;
foreach ($jadwal as $jdwl) { ?>
                  <tr>
                     <td class="text-center"><strong><?php echo $i++; ?></strong></td>
                     <td><?php echo $jdwl['agenda']; ?></td>
                     <td><?php echo \App\Helpers\MyHelper::formatTanggalIndonesia($jdwl['tanggal']); ?></td>
                     <td><?php echo $jdwl['tempat']; ?></td>
                     <td class="text-center"><span
                           class="badge badge-pill <?php echo $jdwl['status'] == 1 ? 'badge-success' : ($jdwl['status'] == 2 ? 'badge-warning' : 'badge-primary'); ?> px-1"><?php echo $jdwl['status'] == 1 ? 'Baru' : ($jdwl['status'] == 2 ? 'Tindak Lanjut' : 'Selesai'); ?></span>
                     </td>
                     <td>
                        <div class="d-flex justify-content-around row">
                           <a class="btn btn-warning"
                              href="<?php echo base_url(); ?>admin/notulensi/<?php echo $jdwl['id_jadwal']; ?>">Form
                              Notulensi</a>
                        </div>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<?php echo $this->include('admin/modals/modal_add_jadwal'); ?>
<?php echo $this->endSection('content'); ?>