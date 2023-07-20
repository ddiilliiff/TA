<?php echo $this->extend('admin/templates/template'); ?>
<?php echo $this->section('content'); ?>
<div class="card shadow mb-4 mx-5">
   <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="m-0 font-weight-bold text-dark">Tabel Pengguna</h6>
   </div>
   <div class="flash-data-fraksi" id="flash-data-fraksi" data-flashdata="<?php echo session('success'); ?>"></div>
   <?php if (session()->has('success')) { ?>
   <div class="container alert alert-success alert-dismissible fade show" role="alert">
      <strong>Data PEngguna berhasil <?php echo session('success'); ?>!</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <script>
   // Menghilangkan flash data setelah 3 detik (3000 ms)
   setTimeout(function() {
      $('.alert').fadeOut();
   }, 5000);
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
                                                        }, 5000);
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
                  <th class="col-3">Nomor Handphone</th>
                  <th class="col-8">Password</th>
               </tr>
            </thead>
            <tfoot>
               <tr class="text-center">
                  <th class="col-1">No.</th>
                  <th class="col-3">Nomor Handphone</th>
                  <th class="col-8">Password</th>
               </tr>
            </tfoot>
            <tbody>
               <?php if (empty($pengguna)) { ?>
               <tr>
                  <td colspan="6" class="text-center">
                     <div class="alert alert-info" role="alert">
                        Data Pengguna belum ada!
                     </div>
                  </td>
               </tr>
               <?php } else { ?>
               <?php $i = 1;
                   foreach ($pengguna as $p) { ?>
               <tr>
                  <td class="text-center"><?php echo $i++; ?></td>
                  <td>
                     <?php echo $p['no_hp']; ?>
                     <span
                        class="badge <?php echo ($p['role'] == '1') ? 'badge-primary' : (($p['role'] == '2') ? 'badge-warning' : 'badge-success'); ?>">
                        <?php echo ($p['role'] == '1') ? 'Admin' : (($p['role'] == '2') ? 'Pimpinan' : 'Anggota'); ?>
                     </span>
                  </td>
                  <td><?php echo $p['password']; ?></td>
               </tr>
               <?php }?>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>


<?php echo $this->endSection('content'); ?>