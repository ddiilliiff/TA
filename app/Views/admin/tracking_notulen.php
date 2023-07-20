<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tracking SK</h6>
      </div>
      <div class="card-body">
         <h5>Judul Notulensi : <?php echo $data['judul']; ?></h5> <br>
         <h5>Hasil : </h5> <br>
         <textarea name="" id="" cols="185" rows="10" disabled><?php echo $data['hasil_sidang']; ?>
         </textarea>
      </div>
   </div>
</div>

<?php echo $this->endSection('content'); ?>