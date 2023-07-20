    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="ubahDewanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Dewan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>admin/dewan/update" method="post">
                  <div class="modal-body modal-edit-dewan">
                     <input type="hidden" name="id_dewan" id="id_dewan">
                    <div class="form-group">
                      <label for="nama">Nama Anggota Dewan</label>
                      <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?php echo old('nama'); ?>">
                    </div>
                    <div class="row">
                       <div class="form-group col-6">
                         <label for="tempat_lahir">Tempat Lahir</label>
                         <input type="text" class="form-control" id="tempat_lahir" placeholder="" name="tempat_lahir" value="<?php echo old('tempat_lahir'); ?>">
                       </div>
                       <div class="form-group col-6">
                         <label for="tanggal_lahir">Tanggal Lahir</label>
                         <input type="date" class="form-control" id="tanggal_lahir" placeholder="" name="tanggal_lahir" value="<?php echo old('tanggal_lahir'); ?>">
                       </div>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" id="alamat" placeholder="" name="alamat" value="<?php echo old('alamat'); ?>">
                    </div>
                    <div class="row">
                       <div class="form-group col-6">
                         <label for="email">Email</label>
                         <input type="email" class="form-control" id="email" placeholder="" name="email" value="<?php echo old('email'); ?>">
                       </div>
                       <div class="form-group col-6">
                         <label for="no_hp">No. Hp</label>
                         <input type="text" class="form-control" id="no_hp" placeholder="" name="no_hp" value="<?php echo old('no_hp'); ?>">
                       </div>
                    </div>
                    <div class="row">
                       <div class="form-group col-6">
                         <label for="kd_fraksi">Fraksi</label>
                           <select class="form-control" name="kd_fraksi" value="<?php echo old('kd_fraksi'); ?>">
                                 <?php foreach ($fraksi as $frks) { ?>
                                    <option value="<?php echo $frks['kd_fraksi']; ?>" name="kd_fraksi"><?php echo $frks['fraksi']; ?></option>
                                  <?php }?>
                           </select>
                       </div>
                       <div class="form-group col-6">
                         <label for="kd_jabatan">Jabatan</label>
                           <select class="form-control" name="kd_jabatan" value="<?php echo old('kd_jabatan'); ?>">
                              <?php foreach ($jabatan as $jbtn) { ?>
                                 <option value="<?php echo $jbtn['kd_jabatan']; ?>" name="kd_jabatan"><?php echo $jbtn['jabatan']; ?></option>
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