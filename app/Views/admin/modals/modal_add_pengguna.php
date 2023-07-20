    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="tambahAnggotaOPDModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Anggota OPD</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                </button>
             </div>
             <form action="<?php echo base_url(); ?>admin/guest" method="post">
                <div class="modal-body">
                   <input type="hidden" name="kd_opd" value="<?php echo $kd_opd; ?>">
                   <div class="row">
                      <div class="form-group col-6">
                         <label for="nama_guest">Nama</label>
                         <input type="text" class="form-control" id="nama_guest" placeholder="" name="nama_guest">
                      </div>
                      <div class="form-group col-6">
                         <label for="no_hp">No. Hp</label>
                         <input type="text" class="form-control" id="no_hp" placeholder="" name="no_hp">
                      </div>
                   </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                   <button class="btn btn-dark" name="tambahGuest">Submit</button>
                </div>
             </form>
          </div>
       </div>
    </div>