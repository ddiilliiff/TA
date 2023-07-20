    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="ubahAnggotaFraksiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content modal-edit-dewan">
             <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Form Ubah Anggota Fraksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                </button>
             </div>
             <?php if (empty($dewan)) {?>
             <?php } else { ?>


             <form action="<?php echo base_url(); ?>admin/dewan/ubah" method="post">
                <input type="hidden" name="kd_fraksi" value="">
                <div class="modal-body">
                   <input type="hidden" name="id_dewan" value="<?php echo $dewan[0]['id_dewan']; ?>">
                   <div class="form-group">
                      <label for="nama">Nama Anggota</label>
                      <input type="text" class="form-control" id="nama" name="nama" value="">
                   </div>
                   <div class="row">
                      <div class="form-group col-6">
                         <label for="tempat_lahir">Tempat Lahir</label>
                         <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="">
                      </div>
                      <div class="form-group col-6">
                         <label for="tanggal_lahir">Tanggal Lahir</label>
                         <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="">
                      </div>
                   </div>
                   <div class="row">
                      <div class="form-group col-6">
                         <label for="alamat">Alamat</label>
                         <input type="text" class="form-control" id="alamat" name="alamat" value="">
                      </div>
                      <div class="form-group col-6">
                         <label for="no_hp">No. Hp</label>
                         <input type="text" class="form-control" id="no_hp" name="no_hp" value="">
                      </div>
                   </div>
                   <div class="row">
                      <div class="form-group col-4">
                         <label for="kd_jabatan">Jabatan</label>
                         <select class="form-control" name="kd_jabatan">
                            <option value="">Pilih Jabatan</option>
                            <?php foreach ($jabatan as $jbtn) { ?>
                            <option value="<?php echo $jbtn['kd_jabatan']; ?>" name="kd_jabatan"
                               <?php echo ($jbtn['kd_jabatan'] == !null) ? 'selected' : ''; ?>>
                               <?php echo $jbtn['jabatan']; ?></option>
                            <?php }?>
                         </select>
                      </div>
                      <div class="form-group col-4">
                         <label for="kd_komisi">Komisi</label>
                         <select class="form-control" name="kd_komisi">
                            <option value="">Pilih Komisi</option>
                            <?php foreach ($komisi as $kms) { ?>
                            <option value="<?php echo $kms['kd_komisi']; ?>" name="kd_komisi"
                               <?php echo ($kms['kd_komisi'] == true) ? 'selected' : ''; ?>>
                               <?php echo $kms['komisi']; ?></option>
                            <?php }?>
                         </select>
                      </div>
                      <div class="form-group col-4">
                         <label for="id_periode">Pilih Periode</label>
                         <select class="form-control" name="id_periode">
                            <option value="">Pilih Periode</option>
                            <?php foreach ($periode as $prd) { ?>
                            <option value="<?php echo $prd['id_periode']; ?>" name="id_periode"
                               <?php echo ($prd['id_periode'] == true) ? 'selected' : ''; ?>>
                               <?php echo $prd['periode']; ?></option>
                            <?php }?>
                         </select>
                      </div>
                   </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                   <button class="btn btn-dark" name="ubahDewan">Submit</button>
                </div>
             </form>
             <?php } ?>
          </div>
       </div>
    </div>