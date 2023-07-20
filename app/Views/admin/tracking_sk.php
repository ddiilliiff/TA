<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tracking SK</h6>
      </div>
      <div class="card-body">

         <div id="accordion">
            <?php foreach ($listSidang as $key => $d) { ?>
            <div class="card">
               <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                     <div class="row align-items-center">
                        <div class="col">
                           <button class="btn btn-white text-left" data-toggle="collapse"
                              data-target="#collapse<?php echo $d['id_jadwal']; ?>" aria-expanded="true"
                              aria-controls="collapseOne">
                              Hari/Tanggal : <?php echo \App\Helpers\MyHelper::formatTanggalIndonesia($d['tanggal']); ?>
                              <br>
                              Waktu : <?php echo \App\Helpers\MyHelper::formatWit($d['waktu']); ?> s.d Selesai<br>
                              Tahun : <?php echo $d['tempat']; ?> <br>
                           </button>
                        </div>
                     </div>
                  </h5>
               </div>
               <div id="collapse<?php echo $d['id_jadwal']; ?>" class="collapse show" aria-labelledby="headingOne"
                  data-parent="#accordion">
                  <div class="card-body">
                     <a class="btn btn-outline-primary btn-sm"
                        href="<?php echo base_url(); ?>admin/tracking_notulen/<?php echo $d['id_jadwal']; ?>">
                        Lihat Notulen Sidang
                     </a>
                     <a class="btn btn-outline-primary btn-sm"
                        href="<?php echo base_url(); ?>admin/tracking_peserta/<?php echo $d['id_jadwal']; ?>">
                        Lihat Peserta
                     </a>
                  </div>
               </div>
            </div>
            <?php }?>
         </div>
      </div>
   </div>
</div>

<?php echo $this->endSection('content'); ?>