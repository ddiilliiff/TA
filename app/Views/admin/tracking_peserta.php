<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tracking SK</h6>
      </div>
      <div class="card-body">
         <h3>Daftar Peserta Sidang</h3>
         <table class="table">
            <thead class="thead-light">
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Presensi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1;
foreach ($data as $d) { ?>
               <tr>
                  <th scope="row"><?php echo $i++; ?></th>
                  <td><?php echo $d['nama']; ?></td>
                  <td><?php echo $d['presensi'] == '' ? 'Tidak Hadir' : 'Hadir'; ?></td>
               </tr>
               <?php }?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<?php echo $this->endSection('content'); ?>