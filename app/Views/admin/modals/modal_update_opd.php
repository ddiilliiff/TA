    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="ubahOPDModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content modal-edit-opd">
             <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data OPD</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                </button>
             </div>
             <form action="<?php echo base_url(); ?>admin/kategori_opd/update" method="post">
                <div class="modal-body modal-edit-opd">
                   <input type="hidden" name="kd_opd" id="kd_opd" value="">
                   <div class="form-group">
                      <label for="opd">Nama OPD</label>
                      <input type="text" class="form-control" id="opd" value="" name="opd">
                   </div>
                   <div class="form-group">
                      <label for="akronim">Akrnonim</label>
                      <input type="text" class="form-control" id="akronim" value="" name="akronim">
                   </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                   <button class="btn btn-dark btn-sm" name="ubahOPD">Ubah</button>
                </div>
             </form>
          </div>
       </div>
    </div>