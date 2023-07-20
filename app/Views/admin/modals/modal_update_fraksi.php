    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="modalUbahFraksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Fraksi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>admin/kategori_fraksi/ubah" method="post">
                <?php csrf_field(); ?>
                  <div class="modal-body modal-edit-fraksi">
                     <input type="hidden" id="kd_fraksi" name="kd_fraksi">
                    <div class="form-group">
                      <label for="fraksi">Nama Fraksi</label>
                      <input type="text" class="form-control" id="fraksi" placeholder="" name="fraksi">
                    </div>
                    <div class="form-group">
                      <label for="akronim">Akrnonim</label>
                      <input type="text" class="form-control" id="akronim" placeholder="" name="akronim">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-dark" name="submit">Ubah</button>
                  </div>
                </form>
            </div>
        </div>
    </div>