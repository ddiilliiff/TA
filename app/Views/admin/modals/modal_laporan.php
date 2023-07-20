!
<!-- Modal Tambah Fraksi-->
<div class="modal fade" id="laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="exampleModalLabel">Form Filter Laporan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>

         <form id="formTambahFraksi" action="<?php echo base_url(); ?>admin/laporan" method="get">
            <?php csrf_field(); ?>
            <div class="modal-body">
               <div class="row">
                  <div class="form-group col-6">
                     <label for="tanggal_awal">Tanggal Awal</label>
                     <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                  </div>
                  <div class="form-group col-6">
                     <label for="tanggal_akhir">Tanggal Akhir</label>
                     <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
               <button class="btn btn-dark btn-sm">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>