<div class="modal fade" id="konsideranMengingatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header bg-info text-white">
            <h5 class="modal-title" id="exampleModalLabel">Konsideran Mengingat</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>

         <?php if ($mengingat) { ?>
         <form action="<?php echo base_url(); ?>admin/update_konsideran_mengingat" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="hidden" name="kd_draft_sk" value="<?php echo $draft_sk['kd_draft_sk']; ?>">
                  <input type="hidden" name="kd_sk" value="<?php echo $sk['kd_sk']; ?>">
                  <table id="dynamicTableKonsideranMengingat" class="table table-bordered">
                     <tr>
                        <th class="col-1">Nomor</th>
                        <th class="col-10">Isi</th>
                        <th class="col-1">Aksi</th>
                     </tr>
                     <?php foreach ($mengingat as $mnggt) { ?>
                     <tr>
                        <input type="hidden" name="id[]" value="<?php echo $mnggt['id']; ?>">
                        <td><input type="text" name="nomor[]" class="form-control"
                              value="<?php echo $mnggt['nomor']; ?>" />
                        </td>
                        <td><input type="text" name="isi[]" class="form-control" value="<?php echo $mnggt['isi']; ?>" />
                        </td>
                        <td>
                           <button type="button" name="remove" class="btn btn-danger btn_remove">Hapus</button>
                        </td>
                     </tr>
                     <?php }?>
                     <!-- Baris akan langsung bertambah -->
                  </table>
                  <button type="button" name="add" id="addKonsideranMengingat" class="btn btn-success">Tambah
                     Baris</button>
               </div>
            </div>
            <div class="modal-footer">
               <input type="submit" name="submit" class="btn btn-primary" value="Simpan Perubahan" />
            </div>
         </form>
         <?php } else { ?>
         <form action="<?php echo base_url(); ?>admin/save_konsideran_mengingat" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="hidden" name="kd_draft_sk" value="<?php echo $draft_sk['kd_draft_sk']; ?>">
                  <input type="hidden" name="kd_sk" value="<?php echo $sk['kd_sk']; ?>">
                  <table id="dynamicTableKonsideranMengingat" class="table table-bordered">
                     <tr>
                        <th class="col-1">Nomor</th>
                        <th class="col-10">Isi</th>
                        <th class="col-1">Aksi</th>
                     </tr>
                     <tr>
                        <!-- Baris akan langsung bertambah -->
                     </tr>
                  </table>
                  <button type="button" name="add" id="addKonsideranMengingat" class="btn btn-success">Tambah
                     Baris</button>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
         <?php } ?>
      </div>
   </div>
</div>