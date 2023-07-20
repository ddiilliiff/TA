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
                  Form Draft SK
               </h2>
               <div class="page-pretitle">
                  Form Konsideran - Menimbang
               </div>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                     data-bs-target="#modal-report">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                     </svg>
                     Tambah Data
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                     data-bs-target="#modal-report" aria-label="Tambah Data">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                     </svg>
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
                     <h3 class="card-title">FORM DRAFT SK - MENIMBANG</h3>
                  </div>

                  <div class="table-responsive">
                     <table class="table card-table table-vcenter text-nowrap datatable justify-between">
                        <thead>
                           <tr>
                              <th class="col-1">Nomor</th>
                              <th class="col-10">Isi Konsideran</th>
                              <th class="col-1">Aksi</th>
                           </tr>
                        </thead>
                        <tbody id="table-body">
                           <!-- Baris-baris tabel akan ditambahkan melalui JavaScript -->
                        </tbody>
                     </table>
                  </div>

                  <div class="text-right mt-3 px-3 py-3 gap-3">
                     <button class="btn btn-primary" onclick="addRow()">Tambah Baris</button>
                     <button class="btn btn-success" onclick="saveData()">Simpan Data</button>
                  </div>
               </div>

            </div>
            <!-- Akhir Tabel -->


            <?php echo $this->include('admin/template/modals/modal_jadwal'); ?>

            <?php echo $this->endSection('content'); ?>