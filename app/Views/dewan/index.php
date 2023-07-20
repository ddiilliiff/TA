<?php echo $this->extend('dewan/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid d-flex">
   <?php foreach ($sk as $sk) { ?>
   <div class="card flex-column mr-3" style="width: 18rem;">
      <div class="card-body">
         <h5 class="card-title">SK NOMOR : <?php echo $sk['nomor']; ?></h5>
         <h6 class="card-subtitle mb-2 text-muted">TAHUN : <?php echo $sk['tahun']; ?></h6>
         <p class="card-text"><?php echo $sk['judul']; ?></p>
         <a href="<?php echo base_url(); ?>user/sk/<?php echo $sk['kd_sk']; ?>" class="card-link" download>Download</a>
      </div>
   </div>
   <?php }?>
</div>


<?php echo $this->endSection('content'); ?>