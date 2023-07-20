<div class="modal fade" id="tambahPeraturanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="exampleModalLabel">Peraturan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <form action="<?php echo base_url(); ?>admin/peraturan" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="hidden" name="kd_sk" value="">
                  <table id="dynamicTablePeraturan" class="table table-bordered">
                     <tr>
                        <th class="col-10">Isi</th>
                        <th class="col-1">Aksi</th>
                     </tr>
                     <tr>
                        <td><input type="text" name="isi[]" class="form-control" /></td>
                        <td><button type="button" name="remove" class="btn btn-danger btn_remove">Hapus</button></td>
                     </tr>
                  </table>
                  <button type="button" name="add" id="addPeraturan" class="btn btn-success">Tambah
                     Baris</button>
                  <br><br>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                  <input type="submit" name="submit" class="btn btn-primary" value="Simpan" />
               </div>
         </form>
      </div>
   </div>
</div>
</div>