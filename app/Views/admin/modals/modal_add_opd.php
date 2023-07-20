    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="tambahOPDModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data OPD</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                </button>
             </div>
             <form action="<?php echo base_url(); ?>admin/kategori_opd" method="post">
                <div class="modal-body">
                   <div class="form-group">
                      <label for="opd">Nama OPD</label>
                      <input type="text" class="form-control" id="opd" placeholder="" name="opd">
                   </div>
                   <div class="form-group">
                      <label for="akronim">Akrnonim</label>
                      <input type="text" class="form-control" id="akronim" placeholder="" name="akronim">
                   </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                   <button class="btn btn-dark btn-sm" name="tambahOPD">Submit</button>
                </div>
             </form>
          </div>
       </div>
    </div>