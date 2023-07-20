<?php echo $this->extend('admin/templates/template'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
         <h6 class="m-0 font-weight-bold text-dark">Tabel SK</h6>
      </div>

      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr class="text-center">
                     <th class="col-1">Nomor</th>
                     <th class="col-7">Judul SK</th>
                     <th class="col-1">Tahun</th>
                     <th class="col-1">Tanggal</th>
                     <th class="col-1">Status</th>
                     <th class="col-1">Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr class="text-center">
                     <th class="col-1">Nomor</th>
                     <th class="col-7">Judul SK</th>
                     <th class="col-1">Tahun</th>
                     <th class="col-1">Tanggal</th>
                     <th class="col-1">Status</th>
                     <th class="col-1">Aksi</th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if (empty($draft_sk)) { ?>
                  <tr>
                     <td colspan="6" class="text-center">
                        <div class="alert alert-info" role="alert">
                           Data SK belum ada!
                        </div>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php $i = 1;
                      foreach ($draft_sk as $dsk) { ?>
                  <tr>
                     <td class="text-center"><?php echo $i++; ?>.</td>
                     <td><?php echo $dsk['judul']; ?></td>
                     <td><?php echo $dsk['tahun']; ?></td>
                     <td><?php echo $dsk['tanggal']; ?></td>
                     <td class="text-center"><span
                           class="badge badge-pill px-1
                           <?php echo $dsk['status'] == 1 ? 'badge-danger' : ($dsk['status'] == 2 ? 'badge-warning' : 'badge-success'); ?>">
                           <?php echo $dsk['status'] == 1 ? 'Belum selesai' : ($dsk['status'] == 2 ? 'Pending' : 'Selesai'); ?></span>
                     </td>
                     <td>
                        <?php if ($dsk['status'] == 2) { ?>
                        <a class="btn btn-outline-primary btn-sm"
                           href="<?php echo base_url(); ?>admin/isi_sk/<?php echo $dsk['kd_draft_sk']; ?>">Edit
                        </a>
                        <?php } elseif ($dsk['status'] == 1) { ?>
                        <a class="btn btn-outline-primary btn-sm"
                           href="<?php echo base_url(); ?>admin/isi_sk/<?php echo $dsk['kd_draft_sk']; ?>">Lengkapi
                        </a>
                        <?php } else {?>
                        <a class="btn btn-outline-primary btn-sm"
                           href="<?php echo base_url(); ?>admin/isi_sk/<?php echo $dsk['kd_draft_sk']; ?>">Detail
                           <?php } ?>
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