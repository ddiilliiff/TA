    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="tambahJabatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Jabatan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                </button>
             </div>
             <form action="<?php echo base_url(); ?>admin/kategori_jabatan" method="post">
                <div class="modal-body">
                   <div class="form-group">
                      <label for="nama_fraksi">Nama Jabatan</label>
                      <input type="text" class="form-control" id="jabatan" placeholder="" name="jabatan">
                   </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                   <button class="btn btn-dark" name="submit">Submit</button>
                </div>
             </form>
          </div>
       </div>
    </div>