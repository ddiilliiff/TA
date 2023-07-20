<?php echo $this->extend('admin/template/template'); ?>

<?php echo $this->section('content'); ?>

<div class="page-wrapper">
   <!-- Page header -->
   <div class="page-header d-print-none">
      <div class="container-xl">
         <div class="row g-2 align-items-center">
            <div class="col">
               <!-- Page pre-title -->
               <h2 class="page-title">
                  <div class="row align-items-center">
                     Daftar Peserta Sidang
                     <div class="col">
                        <button type="button" class="btn btn-outline-info " data-bs-toggle="popover"
                           title="Informasi Jadwal Sidang" data-bs-content="ID      Jadwal : <?php echo $info_jadwal[0]['id_jadwal']; ?>.
                      
                                         Agenda : <?php echo $info_jadwal[0]['agenda']; ?>.
                      
                                         Hari/Tanggal: <?php echo $info_jadwal[0]['hari']; ?>, <?php echo $info_jadwal[0]['tanggal_mulai']; ?>.
                      
                                         Jam : <?php echo $info_jadwal[0]['jam']; ?>.
                      
                                         Tempat : <?php echo $info_jadwal[0]['tempat']; ?>..
                                        ">Informasi Sidang</button>
                        <span
                           class="badge badge-outline <?php echo $info_jadwal[0]['status'] == 1 ? 'text-green' : ($info_jadwal[0]['status'] == 2 ? 'text-orange' : 'text-blue'); ?> px-1"><?php echo $info_jadwal[0]['status'] == 1 ? 'Baru' : ($info_jadwal[0]['status'] == 2 ? 'Tindak Lanjut' : 'Selesai'); ?></span>
                        <div class="col">

                        </div>
                     </div>
                  </div>
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                     data-bs-target="#modal-guest">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                     </svg>
                     Tambah Peserta Tamu
                  </a>
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                     data-bs-target="#modal-dewan">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                     </svg>
                     Tambah Peserta Dewan
                  </a>

               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Page body -->
   <div class="page-body">
      <div class="container-xl">
         <div class="row row-deck row-cards">
            <!-- Awal Tabel -->
            <div class="col-12">
               <div class="card">

                  <div class="card-header">
                     <h3 class="card-title">Daftar Peserta</h3>
                  </div>

                  <div class="table-responsive">
                     <table class="table card-table table-vcenter text-nowrap datatable justify-between">
                        <thead>
                           <tr>
                              <th class="w-1 col-3">ID</th>
                              <th class="col-3">Nama</th>
                              <th class="col-3">Status Peserta</th>
                              <th class="col-3">Aksii</th>
                           </tr>
                        </thead>
                        <tbody>

                           <tr>
                              <td>PS01AD001F01J0JS23020201</td>
                              <td>DILIF</td>
                              <th>Anggota Dewan</th>
                              <td>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-ghost-secondary">Detail</a>
                                 <a href="#" class="btn btn-ghost-primary">Edit</a>
                                 <a href="#" class="btn btn-ghost-danger">Hapus</a>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <!-- Akhir Tabel -->

            <?php echo $this->include('admin/template/modals/modal_peserta'); ?>


            <?php echo $this->endSection('content'); ?>