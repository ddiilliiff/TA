    <!-- Modal Tambah Fraksi-->
    <div class="modal fade " id="tambahJadwalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Form Tambah Data Jadwal Sidang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                </button>
             </div>
             <form action="<?php echo base_url(); ?>admin/jadwal" method="post">
                <div class="modal-body">
                   <div class="form-group">
                      <div class="row">
                         <input type="hidden" name="id_sidang" value="<?php echo $id_sidang; ?>">
                         <div class="col-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                         </div>
                         <div class="col-6">
                            <label for="waktu">Waktu</label>
                            <input type="time" class="form-control" id="waktu" name="waktu">
                         </div>
                      </div>
                      <div class="form-group mt-3">
                         <div class="row">
                            <div class="col-6">
                               <label for="tempat">Tempat</label>
                               <input type="text" class="form-control" id="tempat" name="tempat">
                            </div>
                            <div class="col-6 form-group">
                               <label for="agenda">Keterangan Sidang</label>
                               <select class="form-control" name="keterangan">
                                  <option>Pilih Keterangan Sidang</option>
                                  <option value="Pleno">Pleno</option>
                                  <option value="Paripurna">Paripurna</option>
                               </select>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                   <button class="btn btn-dark btn-sm" name="tambahJadwal">Submit</button>
                </div>
             </form>
          </div>
       </div>
    </div>