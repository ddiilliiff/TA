    <!-- Modal Tambah Fraksi-->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>admin/user" method="post">
                  <div class="modal-body">
                     <p>Email yang ada di list opsi sesuai dengan data email dari Anggota Dewan.</p>
                     <input type="hidden" name="id_dewan" id="id_dewan" value="">
                    <div class="form-group">
                      <label for="nama">Email</label>
                      <select class="form-control" name="email" id="data-user" value="data-user">
                           <option value="">Pilih Email Dewan</option>
                              <?php foreach ($dewan as $dewan) { ?>
                                    <option value="<?php echo $dewan['email']; ?>" name="email" data-id_dewan="<?php echo $dewan['id_dewan']; ?>"><?php echo $dewan['email']; ?></option>
                              <?php }?>
                        </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-dark" name="tambahUser">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>