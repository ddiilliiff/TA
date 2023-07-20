<script>
$(document).ready(function() {
   // Ambil elemen form option dan input terkait
   const dataSelect = $('#data-dewan');
   const idInput = $('#id_dewan');
   const namaInput = $('#nama_peserta');
   const noHpInput = $('#no_hp');

   // Tambahkan event listener pada form option
   dataSelect.on('change', function() {
      // Ambil data terpisah dari opsi yang dipilih
      const selectedOption = $(this).find(':selected');
      const id = selectedOption.data('id_dewan');
      const nama = selectedOption.data('nama_peserta');
      const no_hp = selectedOption.data('no_hp');

      // Isi nilai terpisah ke input yang sesuai
      idInput.val(id);
      namaInput.val(nama);
      noHpInput.val(no_hp);
   });
});

$(document).ready(function() {
   // Ambil elemen form option dan input terkait
   const dataSelect = $('#data-dewan');
   const idInput = $('#id_dewan');
   const namaInput = $('#nama_peserta');
   const noHpInput = $('#no_hp');

   // Tambahkan event listener pada form option
   dataSelect.on('change', function() {
      // Ambil data terpisah dari opsi yang dipilih
      const selectedOption = $(this).find(':selected');
      const id = selectedOption.data('id_dewan');
      const nama = selectedOption.data('nama_peserta');
      const no_hp = selectedOption.data('no_hp');

      // Isi nilai terpisah ke input yang sesuai
      idInput.val(id);
      namaInput.val(nama);
      noHpInput.val(no_hp);
   });
});

$(document).ready(function() {
   // Ambil elemen form option dan input terkait
   const dataSelect = $('#data-guest');
   const idInput = $('#id_guest');
   const namaInput = $('#nama_guest');
   const noHpGuestInput = $('#no_hp_guest');

   // Tambahkan event listener pada form option
   dataSelect.on('change', function() {
      // Ambil data terpisah dari opsi yang dipilih
      const selectedOption = $(this).find(':selected');
      const id = selectedOption.data('id_guest');
      const nama = selectedOption.data('nama_guest');
      const no_hp_guest = selectedOption.data('no_hp');

      // Isi nilai terpisah ke input yang sesuai
      idInput.val(id);
      namaInput.val(nama);
      noHpGuestInput.val(no_hp_guest);
   });
});

$(document).ready(function() {
   // Ambil elemen form option dan input terkait
   const dataSelect = $('#data-user');
   const idInput = $('#id_dewan');

   // Tambahkan event listener pada form option
   dataSelect.on('change', function() {
      // Ambil data terpisah dari opsi yang dipilih
      const selectedOption = $(this).find(':selected');
      const id = selectedOption.data('id_dewan');

      // Isi nilai terpisah ke input yang sesuai
      idInput.val(id);
   });
});

$(document).on('click', '#btnEditFraksi', function() {
   $('.modal-edit-fraksi #kd_fraksi').val($(this).data('kd_fraksi'));
   $('.modal-edit-fraksi #fraksi').val($(this).data('fraksi'));
   $('.modal-edit-fraksi #akronim').val($(this).data('akronim'));
});

$(document).on('click', '#btnEditOPD', function() {
   $('.modal-edit-opd #kd_opd').val($(this).data('kd_opd'));
   $('.modal-edit-opd #opd').val($(this).data('opd'));
   $('.modal-edit-opd #akronim').val($(this).data('akronim'));
});

$(document).on('click', '#btnEditAgenda', function() {
   $('.modal-edit-agenda #id_sidang').val($(this).data('id_sidang'));
   $('.modal-edit-agenda #agenda').val($(this).data('agenda'));
});

$(document).on('click', '#btnEditJabatan', function() {
   $('.modal-edit-jabatan #kd_jabatan').val($(this).data('kd_jabatan'));
   $('.modal-edit-jabatan #jabatan').val($(this).data('jabatan'));
});

$(document).on('click', '#btnEditDewan', function() {
   $('.modal-edit-dewan #id_dewan').val($(this).data('id_dewan'));
   $('.modal-edit-dewan #nama').val($(this).data('nama'));
   $('.modal-edit-dewan #tempat_lahir').val($(this).data('tempat_lahir'));
   $('.modal-edit-dewan #tanggal_lahir').val($(this).data('tanggal_lahir'));
   $('.modal-edit-dewan #alamat').val($(this).data('alamat'));
   $('.modal-edit-dewan #email').val($(this).data('email'));
   $('.modal-edit-dewan #no_hp').val($(this).data('no_hp'));
   $('.modal-edit-dewan #kd_fraksi').val($(this).data('kd_fraksi'));
   $('.modal-edit-dewan #kd_jabatan').val($(this).data('kd_jabatan'));
});

$(document).on('click', '#btnEditJadwal', function() {
   $('.modal-edit-jadwal #id_jadwal').val($(this).data('id_jadwal'));
   $('.modal-edit-jadwal #tanggal').val($(this).data('tanggal'));
   $('.modal-edit-jadwal #waktu').val($(this).data('waktu'));
   $('.modal-edit-jadwal #tempat').val($(this).data('tempat'));
   $('.modal-edit-jadwal #status').val($(this).data('status'));
});

// Tombol hapus
$('.btn-hapus-fraksi').on('click', function(e) {
   e.preventDefault();
   const href = $(this).attr('href');

   Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Semua data anggota Fraksi akan ikut terhapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus data',
      cancelButtonText: 'Batal'
   }).then((result) => {
      if (result.isConfirmed) {
         Swal.fire(
            'Terhapus!',
            'Data Fraksi berhasil terhapus.',
            'success'
         ).then(() => {
            document.location.href = href;
         });
      }
   });
});

$('.btn-hapus-peserta').on('click', function(e) {
   e.preventDefault();

   const form = $(this).closest('form');

   Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data peserta akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
   }).then((result) => {
      if (result.isConfirmed) {
         form.submit();
      }
   });
});

$('.btn-hapus-fraksi').on('click', function(e) {
   e.preventDefault();

   const form = $(this).closest('form');

   Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data Fraksi akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
   }).then((result) => {
      if (result.isConfirmed) {
         form.submit();
      }
   });
});

$('.btn-hapus-jadwal').on('click', function(e) {
   e.preventDefault();

   const form = $(this).closest('form');

   Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data Jadwal akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
   }).then((result) => {
      if (result.isConfirmed) {
         form.submit();
      }
   });
});

$('.btn-hapus-dewan').on('click', function(e) {
   e.preventDefault();
   const href = $(this).attr('href');

   Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data Anggota Dewan akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus data',
      cancelButtonText: 'Batal'
   }).then((result) => {
      if (result.isConfirmed) {
         Swal.fire({
            title: 'Terhapus!',
            text: 'Data Dewan berhasil terhapus.',
            icon: 'success',
            timer: 3000, // Delay selama 3 detik (3000 milidetik)
            timerProgressBar: true,
            showConfirmButton: false
         }).then(() => {
            document.location.href = href;
         });
      }
   });
});


$('.btn-hapus-user').on('click', function(e) {

   e.preventDefault();
   const href = $(this).attr('href');

   Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data User akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus data',
      cancelButtonText: 'Batal'
   }).then((result) => {
      if (result.isConfirmed) {
         Swal.fire(
            'Terhapus!',
            'Data User berhasil terhapus.',
            'success'
         )
         document.location.href = href;
      }
   })
});

$('.btn-hapus-jabatan').on('click', function(e) {
   e.preventDefault();
   const href = $(this).attr('href');

   Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data Jabatan akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus data',
      cancelButtonText: 'Batal'
   }).then((result) => {
      if (result.isConfirmed) {
         Swal.fire({
            title: 'Terhapus!',
            text: 'Data Jabatan berhasil terhapus.',
            icon: 'success',
            timer: 3000, // Delay selama 3 detik (3000 milidetik)
            timerProgressBar: true,
            showConfirmButton: false
         }).then(() => {
            document.location.href = href;
         });
      }
   });
});

$('.btn-acc').on('click', function(e) {
   e.preventDefault();

   const form = $(this).closest('form');

   Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Dokumen SK akan di absahkan!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: 'green',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Accord',
      cancelButtonText: 'Batal'
   }).then((result) => {
      if (result.isConfirmed) {
         form.submit();
      }
   });
});

// Memutuskan
$(document).ready(function() {
   var i = 1;

   // Tambah baris pada tombol Tambah Baris
   $("#addDiktumMemutuskan").click(function() {
      var html = '<tr id="row' + i + '">';
      html += '<input type="hidden" name="id[]" value="">';
      html += '<td><input type="text" name="nomor[]" class="form-control" value="" /></td>';
      html += '<td><input type="text" name="isi[]" class="form-control" value="" /></td>';
      html += '<td><button type="button" class="btn btn-danger btn_remove">Hapus</button></td>';
      html += '</tr>';
      $('#dynamicTableDiktumMemutuskan').append(html);
      i++;
   });

   // Hapus baris pada tombol Hapus
   $(document).on('click', '.btn_remove', function() {
      $(this).closest('tr').remove();
   });
});

// Memperhatikan
$(document).ready(function() {
   var i = 1;

   // Tambah baris pada tombol Tambah Baris
   $("#addKonsideranMemperhatikan").click(function() {
      var html = '<tr id="row' + i + '">';
      html += '<input type="hidden" name="id[]" value="">';
      html += '<td><input type="text" name="nomor[]" class="form-control" value="" /></td>';
      html += '<td><input type="text" name="isi[]" class="form-control" value="" /></td>';
      html += '<td><button type="button" class="btn btn-danger btn_remove">Hapus</button></td>';
      html += '</tr>';
      $('#dynamicTableKonsideranMemperhatikan').append(html);
      i++;
   });

   // Hapus baris pada tombol Hapus
   $(document).on('click', '.btn_remove', function() {
      $(this).closest('tr').remove();
   });
});

// Mengingat
$(document).ready(function() {
   var i = 1;

   // Tambah baris pada tombol Tambah Baris
   $("#addKonsideranMengingat").click(function() {
      var html = '<tr id="row' + i + '">';
      html += '<input type="hidden" name="id[]" value="">';
      html += '<td><input type="text" name="nomor[]" class="form-control" value="" /></td>';
      html += '<td><input type="text" name="isi[]" class="form-control" value="" /></td>';
      html += '<td><button type="button" class="btn btn-danger btn_remove">Hapus</button></td>';
      html += '</tr>';
      $('#dynamicTableKonsideranMengingat').append(html);
      i++;
   });

   // Hapus baris pada tombol Hapus
   $(document).on('click', '.btn_remove', function() {
      $(this).closest('tr').remove();
   });
});

$(document).ready(function() {

   function applyAutocomplete(element) {
      $(element).autocomplete({
         source: "<?php echo site_url('sk/ajax'); ?>"
      });
   }
   var i = 1;
   // Tambah baris pada tombol Tambah Baris
   $("#addKonsideranMenimbang").click(function() {
      var html = '<tr id="row' + i + '">';
      html += '<input type="hidden" name="id[]" value="">';
      html +=
         '<td><input type="text" name="nomor[]" class="form-control" value="" /></td>';
      html +=
         '<td><input type="text"  id="menimbang" name="isi[]" class="menimbang-input form-control" autocomplete="on"/></td>';
      html += '<td><button type="button" class="btn btn-danger btn_remove">Hapus</button></td>';
      html += '</tr>';
      $('#dynamicTableKonsideranMenimbang').append(html);
      applyAutocomplete("#menimbang");
      i++;
   });
   applyAutocomplete("#menimbang");

   // Hapus baris pada tombol Hapus
   $(document).on('click', '.btn_remove', function() {
      $(this).closest('tr').remove();
   });

   // Menambhakan event listener
   $(document).on('focus', '#menimbang', function() {
      applyAutocomplete(this);
   });
});


// Peraturan

$(document).ready(function() {
   var i = 1;
   $('#addPeraturan').click(function() {
      var rowCount = $('#dynamicTablePeraturan tr').length;
      var newRow = '<tr id="row' + rowCount + '">' +
         '<td><input type="text" name="isi[]" class="form-control" /></td>' +
         '<td><button type="button" name="remove" id="' + rowCount +
         '" class="btn btn-danger btn_remove">Hapus</button></td>' +
         '</tr>';
      $('#dynamicTablePeraturan').append(newRow);
   });

   $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
   });
});

$(document).ready(function() {
   $("#autocomplete-input").autocomplete({
      source: function(request, response) {
         $.ajax({
            url: "<?php echo base_url('admin/auto_peraturan'); ?> ",
            dataType: "json",
            data: {
               term: request.term
            },
            success: function(data) {
               response(data);
            }
         });
      },
      select: function(event, ui) {
         // Lakukan sesuatu saat item dipilih
      }
   });
});

// Autocomplete
</script>