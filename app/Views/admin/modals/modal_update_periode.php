    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="editPeriodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data Periode</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                </button>
             </div>

             <form id="formTambahFraksi" action="<?php echo base_url(); ?>admin/kategori_periode" method="post">
                <?php csrf_field(); ?>
                <div class="modal-body">
                   <div class="row">
                      <div class="form-group col-6">
                         <label for="periode_awal">Periode Awal</label>
                         <input type="year" class="form-control" id="periode_awal" placeholder="" name="periode_awal">
                      </div>
                      <div class="form-group col-6">
                         <label for="periode_akhir">Periode Akhir</label>
                         <input type="year" class="form-control" id="periode_akhir" placeholder="" name="periode_akhir">
                      </div>

                   </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                   <button class="btn btn-dark btn-sm" name="tambahPeriode">Submit</button>
                </div>
             </form>
          </div>
       </div>
    </div>