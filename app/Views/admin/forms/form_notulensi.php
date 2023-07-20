<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container-fluid">
   <div class="card sahdow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Form Notulensi Sidang</h6>
         <?php if (empty($notulensi)) { ?>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-success shadow-sm btn-sm" data-toggle="modal"
            data-target="#presensiModal"><i class="fas fa-plus fa-sm text-white-50"></i>Presensi</a>
         <!-- Tombol Presensi Tidak tersedia -->
         <?php } else { ?>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-success shadow-sm btn-sm" data-toggle="modal"
            data-target="#presensiModal"><i class="fas fa-plus fa-sm text-white-50"></i>Presensi</a>
         <?php } ?>
      </div>
      <?php if (session()->has('success')) { ?>
      <div class="container col-6 alert alert-success alert-dismissible fade show text-center" role="alert">
         <strong>Data Notulensi berhasil <?php echo session('success'); ?>.</strong>
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
      <?php if (session()->has('presensi')) { ?>
      <div class="container col-6 alert alert-success alert-dismissible fade show text-center" role="alert">
         <strong><?php echo session('presensi'); ?>.</strong>
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

      <!-- Form Yang Belum Ada Data -->
      <?php if (empty($notulensi)) { ?>
      <form action="<?php echo base_url(); ?>admin/notulensi" method="post">
         <div class="form-group">
            <div class="row mx-3">
               <div class="col-8">
                  <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>">
                  <p class="">Hari/Tanggal :
                     <?php echo \App\Helpers\MyHelper::formatTanggalIndonesia($jadwal[0]['tanggal']); ?>.</p>
                  <p class="">Tempat : <?php echo $jadwal[0]['tempat']; ?>.</p>
                  <label for="">Judul Notulen :</label>
                  <input type="text" class="form-control" name="judul">
                  <label for="">Hasil Sidang :</label>
                  <textarea name="hasil_sidang" id="" cols="30" rows="10" class="form-control form-group"></textarea>
               </div>
               <div class="col-4 my-4">
                  <label for="status">Status Sidang</label>
                  <select class="form-control" name="status">
                     <option value="">Pilih Status Sidang</option>
                     <option value="2">Ditindak lanjuti</option>
                     <option value="3">Selesai</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary" name="submitNotulensi" type="submit">Submit</button>
         </div>
      </form>
      <?php } else { ?>
      <!-- Form Yang Sudah Ada Data -->
      <form action="<?php echo base_url(); ?>admin/notulensi/update" method="post">
         <div class="form-group">
            <div class="row mx-3">
               <div class="col-8">
                  <input type="hidden" name="id_notulensi" value="<?php echo $notulensi[0]['id_notulensi']; ?>">
                  <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>">

                  <p class="">Hari/Tanggal :
                     <?php echo \App\Helpers\MyHelper::formatTanggalIndonesia($jadwal[0]['tanggal']); ?>.</p>
                  <p class="">Tempat : <?php echo $jadwal[0]['tempat']; ?>.</p>

                  <hr class="sidebar-divider d-none d-md-block">
                  <div class="row">
                     <label for="judul">Judul Notulen :</label>
                     <input type="text" class="form-control" name="judul" value="<?php echo $notulensi[0]['judul']; ?>">
                  </div>
                  <div class="row mt-3">
                     <label for="">Hasil Sidang :</label>
                     <textarea name="hasil_sidang" id="" cols="30" rows="10"
                        class="form-control form-group"><?php echo $notulensi[0]['hasil_sidang']; ?></textarea>
                  </div>
               </div>
               <div class="col-4 my-4">
                  <label for="status">Status Sidang</label>
                  <?php if ($notulensi[0]['status'] == '3') {?>
                  <input type="hidden" name="status" value="3">
                  <input type="text" class="form-control" value="Selesai" readonly>
                  <?php } else { ?>
                  <select class="form-control" name="status"
                     <?php echo ($notulensi[0]['status'] === '3') ? 'disabled' : ''; ?>>
                     <option value="1">Pilih Status Sidang</option>
                     <option value="2" <?php echo ($notulensi[0]['status'] == '2') ? 'selected' : ''; ?>>Ditindak
                        lanjuti</option>
                     <option value="3" <?php echo ($notulensi[0]['status'] == '3') ? 'selected' : ''; ?>>Selesai
                     </option>
                  </select>
                  <?php } ?>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <?php if ($notulensi[0]['status'] == '3') {?>
            <button class="btn btn-outline-primary" name="updateNotulensi" type="submit">Edit</button>
            <?php } else { ?>
            <button class="btn btn-primary" name="updateNotulensi" type="submit">Simpan</button>
            <?php } ?>
         </div>
      </form>
      <?php } ?>
   </div>
</div>
<?php echo $this->include('admin/modals/modal_presensi'); ?>
<?php echo $this->endSection('content'); ?>