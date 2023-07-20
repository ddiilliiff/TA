<div class="modal fade " id="tambahPesertaInModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Form Tambah Data Peserta Sidang (Internal)</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>admin/peserta" method="post" id="formPeserta">
                  <div class="modal-body">
                    <div class="form-group">
                    
                      <input type="hidden" name="id_jadwal" id="id_jadwal" value="<?php echo $id_jadwal; ?>">
                      <label for="id_dewan">Nama Peserta</label>
                        <input type="hidden" name="id_dewan" id="id_dewan" value="">
                        <input type="hidden" name="nama_peserta" id="nama_peserta" value="">
                        <input type="hidden" name="no_hp" id="no_hp" value="">
                        <select class="form-control" name="data_dewan" id="data-dewan">
                           <option value="" name="data_dewan" id="">Pilih Peserta Sidang</option>
                              <?php foreach ($dewan as $dwn) { ?>
                                 <option value="<?php echo $dwn['id_dewan'].'-'.$dwn['nama'].'-'.$dwn['no_hp']; ?>" name="data_dewan" data-id_dewan="<?php echo $dwn['id_dewan']; ?>" data-nama_peserta="<?php echo $dwn['nama']; ?>" data-no_hp="<?php echo $dwn['no_hp']; ?>"><?php echo $dwn['nama']; ?> - <strong>(<?php echo $dwn['fraksi']; ?>)</strong> - <?php echo $dwn['jabatan']; ?></option>
                              <?php }?>
                        </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-dark" name="tambahPeserta" type="submit">Submit</button>
                  </div>
                </form>
            </div>
        </div>
</div>

<div class="modal fade " id="tambahPesertaEksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Form Tambah Data Peserta Sidang (Eksternal)</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>admin/peserta_guest" method="post" id="formGuest">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="nama_peserta">Nama Peserta (Guest)</label>
                        <div class="form-group">
                            <input type="hidden" name="id_jadwal" id="id_jadwal" value="<?php echo $id_jadwal; ?>">
                            <input type="hidden" name="id_guest" id="id_guest" value="">
                            <input type="hidden" name="nama_peserta" id="nama_guest" value="">
                            <input type="hidden" name="no_hp" id="no_hp_guest" value="">
                            <select class="form-control" name="data_guest" id="data-guest">
                              <option value="" name="data_guest" id="">Pilih Guest</option>
                                  <?php foreach ($guest as $gst) { ?>
                                    <option value="<?php echo $gst['id_guest'].'-'.$gst['nama_guest'].'-'.$gst['no_hp']; ?>" name="data_guest" data-id_guest="<?php echo $gst['id_guest']; ?>" data-nama_guest="<?php echo $gst['nama_guest']; ?>" data-no_hp="<?php echo $gst['no_hp']; ?>"><?php echo $gst['nama_guest']; ?> - <strong>(<?php echo $gst['opd']; ?>)</option>
                                  <?php }?>
                            </select>
                      </div>
                    </div>  
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <button class="btn btn-dark" name="tambahGuest" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
</div>