<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tracking SK</h6>
         <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" data-toggle="modal"
            data-target="#search"><i class="fas fa-search fa-sm text-white-50"></i> Filter</a>
      </div>
      <div class="card-body">

         <?php if (!isset($data)) {?>
         <div class="alert alert-info" role="alert">
            Data belum ada!
         </div>
         <?php } else { ?>
         <div id="accordion">
            <h5 class="mb-5">Hasil : <?php echo count($data); ?> SK dari Tanggal
               <?php echo \App\Helpers\MyHelper::formatTanggal($tanggal_awal); ?>
               sampai <?php echo \App\Helpers\MyHelper::formatTanggal($tanggal_akhir); ?>
               <?php foreach ($data as $key => $d) { ?>
            </h5>
            <div class="card ">
               <div class="card-header" id="headingOne">
                  <div class="row align-items-center">
                     <div class="col">
                        <button class="btn btn-white text-bold text-left" data-toggle="collapse"
                           data-target="#collapse<?php echo $d['kd_sk']; ?>" aria-expanded="true"
                           aria-controls="collapseOne">
                           <p class="font-weight-bold">
                              Nomor SK: <?php echo $d['nomor']; ?> <br>
                              Tahun : <?php echo $d['tahun']; ?> <br>
                              Judul : <?php echo $d['judul']; ?> <br>
                           </p>
                        </button>
                     </div>
                     <div class="col-auto">
                        <a class="btn btn-outline-primary btn-sm "
                           href="<?php echo base_url(); ?>admin/pdf/<?php echo $d['kd_sk']; ?>">
                           Lihat SK
                        </a>
                     </div>
                  </div>
                  </h5>
               </div>
               <div id="collapse<?php echo $d['kd_sk']; ?>" class="collapse show" aria-labelledby="headingOne"
                  data-parent="#accordion">
                  <div class="card-body">
                     <a class="btn btn-outline-primary btn-sm"
                        href="<?php echo base_url(); ?>admin/tracking_sk/<?php echo $d['id_notulensi']; ?>">
                        Riwayat Sidang
                     </a>
                     <!-- <a class="btn btn-outline-primary btn-sm"
                        href="<?php echo base_url(); ?>admin/laporan_sk/<?php echo $d['id_notulensi']; ?>">
                        Cetak Laporan
                     </a> -->
                  </div>
               </div>
            </div>
            <?php }?>
         </div>
         <?php } ?>
      </div>
   </div>
</div>
<?php echo $this->include('admin/modals/modal_filter'); ?>
<?php echo $this->endSection('content'); ?>