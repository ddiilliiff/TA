<!-- <form action="<?php echo base_url('peserta/update'); ?>" method="post">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peserta as $row) { ?>
                <tr>
                    <td>
                        <input type="checkbox" name="ids[]" value="<?php echo $row['id_peserta']; ?>">
                    </td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" id="status" class="form-control">
            <option value="Presensi">Presensi</option>
            <option value="Absensi">Absensi</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form> -->
<!-- Modal Tambah Fraksi-->
<div class="modal fade" id="presensiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="exampleModalLabel">PRESENSI</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <form action="<?php echo base_url(); ?>admin/presensi" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Nama</th>
                           <th>Presensi</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($peserta as $row) { ?>
                        <tr>
                           <td><?php echo $row['nama']; ?></td>
                           <td>
                              <input class="form-control" type="checkbox" name="ids[]"
                                 value="<?php echo $row['id_peserta']; ?>"
                                 <?php echo $row['presensi'] != '' ? 'checked' : ''; ?>>
                           </td>
                           <td><?php echo $row['presensi'] == '' ? 'Absen' : 'Hadir'; ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="modal-footer">
               <?php if (!empty($notulensi)) { ?>
               <?php if ($notulensi[0]['status'] == '3') { ?>
               <p class="text-danger">Sudah tidak bisa melakukan presensi karena sidang sudah selesai dilakukan!</p>
               <?php } else { ?>
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
               <button class="btn btn-dark" name="btnPresensi">Simpan</button>
               <?php } ?>
               <?php } else { ?>
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
               <button class="btn btn-dark" name="btnPresensi">Simpan</button>
               <?php } ?>
            </div>
         </form>
      </div>
   </div>
</div>