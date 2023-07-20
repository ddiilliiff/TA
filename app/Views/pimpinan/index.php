<?php echo $this->extend('pimpinan/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tabel SK</h6>
      </div>
      <div class="flash-data-fraksi" id="flash-data-fraksi" data-flashdata="<?php echo session('success'); ?>"></div>
      <?php if (session()->has('success')) { ?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
         <strong>Berhasil <?php echo session('success'); ?></strong>
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
                     <th class="col-1">No.</th>
                     <th class="col-6">Judul SK</th>
                     <th class="col-1">Tahun</th>
                     <th class="col-1">Tanggal</th>
                     <th class="col-1">Status</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center">
                     <th class="col-1">No.</th>
                     <th class="col-6">Judul SK</th>
                     <th class="col-1">Tahun</th>
                     <th class="col-1">Tanggal</th>
                     <th class="col-1">Status</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($sk_pending)) { ?>
                  <tr>
                     <td colspan="6" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data Draft SK belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php $i = 1;
                      foreach ($sk_pending as $sk_pending) { ?>
                  <tr>
                     <td class="text-center"><?php echo $i++; ?></td>
                     <td><?php echo $sk_pending['judul']; ?></td>
                     <td><?php echo $sk_pending['tahun']; ?></td>
                     <td><?php echo $sk_pending['tanggal']; ?></td>
                     <td class="text-center"><span
                           class="badge badge-pill px-1
                           <?php echo ($sk_pending['status'] == 3) ? 'badge-success' : (($sk_pending['status'] == 2) ? 'badge-warning' : 'badge-danger'); ?>">
                           <?php echo ($sk_pending['status'] == 3) ? 'ACC' : (($sk_pending['status'] == 2) ? 'Belum di ACC' : 'Belum di lengkapi'); ?></span>
                     </td>
                     <td>
                        <div class="d-flex justify-content-around row">
                           <a class="btn btn-info btn-sm"
                              href="<?php echo base_url(); ?>pimpinan/sk/<?php echo $sk_pending['kd_sk']; ?>">Lihat</a>
                           <!-- <a class="btn btn-success btn-sm"
                              href="<?php echo base_url(); ?>pimpinan/acc/<?php echo $sk_pending['kd_sk']; ?>">ACC</a> -->

                           <form action="<?php echo base_url(); ?>pimpinan/acc" method="post" class="d-inline">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="kd_sk" value="<?php echo $sk_pending['kd_sk']; ?>">
                              <button type="submit" class="btn btn-success btn-sm btn-acc">ACC</button>
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

<?php echo $this->endSection('content'); ?>