<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tabel Users</h6>
         <a href="#" class="d-none d-sm-inline-block btn btn-md btn-dark shadow-sm" data-toggle="modal"
            data-target="#createUserModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
      </div>
      <?php if (session()->has('success')) { ?>
      <div class="container col-6 alert alert-success alert-dismissible fade show text-center" role="alert">
         <strong>Data User <?php echo session('success'); ?></strong>
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
                     <th class="col-2">Email</th>
                     <th class="col-2">Password</th>
                     <th class="col-2">Role</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center text-bold">
                     <th class="col-1 text-center">#</th>
                     <th class="col-2">Email</th>
                     <th class="col-2">Password</th>
                     <th class="col-2">Role</th>
                     <th class="col-2">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($user)) { ?>
                  <tr>
                     <td colspan="6" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data User belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php $i = 1;
                      foreach ($user as $u) { ?>
                  <tr>
                     <td class="text-center"><?php echo $i++; ?></td>
                     <td><?php echo $u['email']; ?></td>
                     <td><?php echo $u['password']; ?></td>
                     <td class="text-center"><span
                           class="badge badge-pill <?php echo $u['role'] == 'admin' ? 'badge-success' : ($u['role'] == 'anggota' ? 'badge-warning' : 'badge-primary'); ?> px-1"><?php echo $u['role'] == 'admin' ? 'Admin' : ($u['role'] == 'anggota' ? 'Anggota' : 'Pimpinan'); ?></span>
                     </td>
                     <td>
                        <div class="d-flex justify-content-around row">

                           <a class="btn btn-danger btn-hapus-user"
                              href="<?php echo base_url(); ?>admin/user/<?php echo $u['id_user']; ?>"
                              id="btn-hapus-user">Hapus</a>

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

<?php echo $this->include('admin/modals/modal_add_user'); ?>
<?php echo $this->endSection('conten'); ?>