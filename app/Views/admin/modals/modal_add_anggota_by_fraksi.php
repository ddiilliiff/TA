    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="tambahAnggotaFraksiModal" tabindex="-1" role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Anggota Fraksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                </button>
             </div>
             <form action="<?php echo base_url(); ?>admin/dewan" method="post">
                <input type="hidden" name="kd_fraksi" value="<?php echo $fraksi['kd_fraksi']; ?>">
                <div class="modal-body">
                   <div class="form-group">
                      <label for="nama">Nama Anggota</label>
                      <input type="text" class="form-control" id="nama" placeholder="" name="nama"
                         value="<?php echo old('nama'); ?>">
                   </div>
                   <div class="row">
                      <div class="form-group col-6">
                         <label for="tempat_lahir">Tempat Lahir</label>
                         <input type="text" class="form-control" id="tempat_lahir" placeholder="" name="tempat_lahir"
                            value="<?php echo old('tempat_lahir'); ?>">
                      </div>
                      <div class="form-group col-6">
                         <label for="tanggal_lahir">Tanggal Lahir</label>
                         <input type="date" class="form-control" id="tanggal_lahir" placeholder="" name="tanggal_lahir"
                            value="<?php echo old('tanggal_lahir'); ?>">
                      </div>
                   </div>
                   <div class="row">
                      <div class="form-group col-6">
                         <label for="alamat">Alamat</label>
                         <input type="text" class="form-control" id="alamat" placeholder="" name="alamat"
                            value="<?php echo old('alamat'); ?>">
                      </div>
                      <div class="form-group col-6">
                         <label for="no_hp">No. Hp</label>
                         <input type="text" class="form-control" id="no_hp" placeholder="" name="no_hp"
                            value="<?php echo old('no_hp'); ?>">
                      </div>
                   </div>
                   <div class="row">
                      <div class="form-group col-4">
                         <label for="kd_jabatan">Jabatan</label>
                         <select class="form-control" name="kd_jabatan" value="<?php echo old('kd_jabatan'); ?>">
                            <option value="">Pilih Jabatan</option>
                            <?php foreach ($jabatan as $jbtn) { ?>
                            <option value="<?php echo $jbtn['kd_jabatan']; ?>" name="kd_jabatan">
                               <?php echo $jbtn['jabatan']; ?></option>
                            <?php }?>
                         </select>
                      </div>
                      <div class="form-group col-4">
                         <label for="kd_komisi">Komisi</label>
                         <select class="form-control" name="kd_komisi" value="<?php echo old('kd_komisi'); ?>">
                            <option value="">Pilih Komisi</option>
                            <?php foreach ($komisi as $kms) { ?>
                            <option value="<?php echo $kms['kd_komisi']; ?>" name="kd_komisi">
                               <?php echo $kms['komisi']; ?></option>
                            <?php }?>
                         </select>
                      </div>
                      <div class="form-group col-4">
                         <label for="id_periode">Pilih Periode</label>
                         <select class="form-control" name="id_periode" value="<?php echo old('id_periode'); ?>">
                            <option value="">Pilih Periode</option>
                            <?php foreach ($periode as $prd) { ?>
                            <option value="<?php echo $prd['id_periode']; ?>" name="id_periode">
                               <?php echo $prd['periode']; ?></option>
                            <?php }?>
                         </select>
                      </div>
                   </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                   <button class="btn btn-dark" name="tambahDewan">Submit</button>
                </div>
             </form>
          </div>
       </div>
    </div>