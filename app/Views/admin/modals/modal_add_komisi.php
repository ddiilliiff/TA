    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="tambahKomisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Komisi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                </button>
             </div>

             <form id="formTambahFraksi" action="<?php echo base_url(); ?>admin/kategori_komisi" method="post">
                <?php csrf_field(); ?>
                <div class="modal-body">
                   <div class="form-group">
                      <label for="komisi">Komisi</label>
                      <input type="year" class="form-control" id="komisi" name="komisi">
                   </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                   <button class="btn btn-dark btn-sm" name="tambahKomisi">Submit</button>
                </div>
             </form>
          </div>
       </div>
    </div>