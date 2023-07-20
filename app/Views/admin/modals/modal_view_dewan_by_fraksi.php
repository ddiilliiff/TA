    <!-- Modal Tambah Fraksi-->
    <div class="modal fade bd-example-modal-lg" id="modalViewDewanFraksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">DAFTAR ANGGOTA FRAKSI </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="col-1">Kode</th>
                                            <th class="col-5">Name Anggota Dewan</th>
                                            <th class="col-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-center">
                                            <th class="col-1">Kode</th>
                                            <th class="col-5">Name Anggota Dewan</th>
                                            <th class="col-3">Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php foreach ($fraksi as $frks) { ?>
                                        <tr>
                                            <td><?php echo $frks['kd_fraksi']; ?></td>
                                            <td><?php echo $frks['fraksi']; ?></td>
                                            <td>
                                                <div class="d-flex justify-content-around row">
                                                    
                                                    <a class="btn btn-primary btnEditFraksi" data-toggle="modal" data-target="#modalUbahFraksi" data-kd_fraksi="<?php echo $frks['kd_fraksi']; ?>" data-fraksi="<?php echo $frks['fraksi']; ?>" data-akronim="<?php echo $frks['akronim']; ?>" id="btnEditFraksi" type="button">Edit</a>

                                                    <a class="btn btn-danger btn-hapus-fraksi" href="<?php echo base_url(); ?>admin/fraksi/<?php echo $frks['kd_fraksi']; ?>" id="btn-hapus-fraksi">Hapus</a>
                                                   
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
        </div>
    </div>