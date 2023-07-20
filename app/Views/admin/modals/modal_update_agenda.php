    <!-- Modal Tambah Fraksi-->
    <div class="modal fade " id="modalUbahAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Form Ubah Data Nama Sidang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                </button>
             </div>
             <form action="<?php echo base_url(); ?>admin/sidang/update" method="post">
                <div class="modal-body modal-edit-agenda">
                   <div class="form-group">
                      <input type="hidden" name="id_sidang" id="id_sidang" value="">
                      <label for="nama">Nama Sidang</label>
                      <input class="form-control" type="text" name="nama" id="nama" value="">
                   </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                   <button class="btn btn-dark btn-sm" name="tambahAgenda">Ubah</button>
                </div>
             </form>
          </div>
       </div>
    </div>