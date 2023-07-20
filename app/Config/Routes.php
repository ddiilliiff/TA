<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

// Auth
$routes->group('', function ($routes) {
    $routes->get('/', 'Auth::login');
    $routes->get('auth', 'Auth::login');
    $routes->get('auth/login', 'Auth::login');
    $routes->post('auth/authentication', 'Auth::authentication');
    $routes->get('auth/logout', 'Auth::logout');
});

// Admin
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    // Admin
    $routes->get('', 'Admin::index');
    $routes->get('pengguna', 'Pengguna::index');
    $routes->get('tracking', 'Admin::sk');
    $routes->get('tracking_sk/(:any)', 'Admin::tracking_sk/$1');
    $routes->get('tracking_notulen/(:any)', 'Admin::tracking_notulen/$1');
    $routes->get('tracking_peserta/(:any)', 'Admin::tracking_peserta/$1');
    $routes->get('search_sk', 'Admin::search_sk');
    $routes->get('laporan_sk/(:any)', 'Pdf::laporan_sk/$1');

    // Peridoe
    $routes->get('kategori_periode', 'Periode::periode');
    $routes->post('kategori_periode', 'Periode::add_periode');
    $routes->delete('kategori_periode/(:any)', 'Periode::delete_periode/$1');

    // Komisi
    $routes->get('kategori_komisi', 'Komisi::komisi');
    $routes->post('kategori_komisi', 'Komisi::add_komisi');
    $routes->delete('kategori_komisi/(:any)', 'Komisi::delete_komisi/$1');

    // Fraksi
    $routes->get('kategori_fraksi', 'Fraksi::fraksi');
    $routes->post('kategori_fraksi', 'Fraksi::add_fraksi');
    $routes->post('kategori_fraksi/ubah', 'Fraksi::update_fraksi');
    $routes->delete('kategori_fraksi/(:alphanum)', 'Fraksi::delete_fraksi/$1');
    $routes->get('anggota_fraksi/(:alphanum)', 'Fraksi::anggota_fraksi/$1');

    // Jabatan
    $routes->get('kategori_jabatan', 'Jabatan::jabatan');
    $routes->post('kategori_jabatan', 'Jabatan::add_jabatan');
    $routes->post('kategori_jabatan/update', 'Jabatan::update_jabatan');
    $routes->get('kategori_jabatan/(:alphanum)', 'Jabatan::delete_jabatan/$1');

    // OPD
    $routes->get('kategori_opd', 'OPD::opd');
    $routes->post('kategori_opd', 'OPD::add_opd');
    $routes->post('kategori_opd/update', 'OPD::update_opd');
    $routes->delete('kategori_opd/(:alphanum)', 'OPD::delete_opd/$1');
    $routes->get('anggota_opd/(:alphanum)', 'OPD::anggota_opd/$1');

    // Dewan
    $routes->post('dewan', 'Dewan::add_dewan');
    $routes->post('dewan/ubah', 'Dewan::update_dewan');

    // Agenda
    $routes->get('sidang', 'Sidang::sidang');
    $routes->post('sidang', 'Sidang::add_sidang');
    $routes->post('sidang/update', 'Sidang::update_sidang');
    $routes->delete('sidang/(:alphanum)', 'Sidang::delete_sidang/$1');

    // Jadwal
    $routes->get('jadwal/(:any)', 'Jadwal::jadwal/$1');
    $routes->post('jadwal', 'Jadwal::add_jadwal');
    $routes->post('jadwal/update', 'Jadwal::update_jadwal');
    $routes->delete('jadwal/(:alphanum)', 'Jadwal::delete_jadwal/$1');

    // Peserta (dari Anggota Dewan)
    $routes->post('peserta_guest', 'Peserta::add_peserta_e');
    $routes->get('peserta/(:any)', 'Peserta::peserta/$1');
    $routes->delete('peserta/(:alphanum)', 'Peserta::delete_peserta/$1');
    $routes->post('peserta', 'Peserta::add_peserta_i');

    // Guest (dari OPD)
    $routes->post('guest', 'Guest::add_guest');
    $routes->delete('guest/(:alphanum)', 'Guest::delete_guest/$1');

    // Notulensi
    $routes->get('notulensi', 'Notulensi::notulensi');
    $routes->get('notulensi/(:any)', 'Notulensi::form_notulensi/$1');
    $routes->post('notulensi', 'Notulensi::add_notulensi');
    $routes->post('notulensi/update', 'Notulensi::update_notulensi');

    // Notifikasi
    $routes->post('notifikasi', 'Notifikasi::notifikasi');

    // Presensi
    $routes->get('/admin/presensi', 'Peserta::presensi');
    $routes->post('presensi', 'Peserta::presensi');

    // Draft SK
    $routes->get('draft_sk_notulensi', 'DraftSK::draft_sk_notulensi');
    $routes->get('draft_sk/(:alphanum)', 'DraftSK::form_draft_sk/$1');
    $routes->delete('draft_sk/(:alphanum)', 'DraftSK::delete_draft_sk/$1');
    $routes->post('save_draft_sk', 'DraftSK::save_draft_sk');
    $routes->post('update_draft_sk', 'DraftSK::update_draft_sk');
    $routes->post('update_status_sk', 'DraftSK::update_status_sk');

    // SK
    $routes->get('sk', 'SK::sk');
    $routes->get('isi_sk/(:any)', 'SK::isi_sk/$1');
    $routes->post('save_sk', 'SK::save_sk');
    $routes->post('update_sk', 'SK::update_sk');

    // SK Konsideran Mengingat
    $routes->post('save_konsideran_mengingat', 'SK::save_konsideran_mengingat');
    $routes->post('update_konsideran_mengingat', 'SK::update_konsideran_mengingat');

    // SK Konsideran Menimbang
    $routes->post('save_konsideran_menimbang', 'SK::save_konsideran_menimbang');
    $routes->post('update_konsideran_menimbang', 'SK::update_konsideran_menimbang');

    // SK Konsideran Memperhatikan
    $routes->post('save_konsideran_memperhatikan', 'SK::save_konsideran_memperhatikan');
    $routes->post('update_konsideran_memperhatikan', 'SK::update_konsideran_memperhatikan');

    // SK Diktum Memtuskan
    $routes->post('save_diktum_memutuskan', 'SK::save_diktum_memutuskan');
    $routes->post('update_diktum_memutuskan', 'SK::update_diktum_memutuskan');

    // Laporan
    // $routes->get('pdf/laporan', 'Pdf::generateLaporan');
    $routes->get('laporan', 'Pdf::laporan');

    // Contoh
    $routes->get('pdf/(:any)', 'Pdf::generatePDF/$1');
    $routes->get('c', 'AdminController::contoh');

    // Autocomplete
    $routes->get('ajax', 'SK::ajax');
});

$routes->get('sk/ajax', 'SK::ajax');

$routes->get('demo', 'Demo::index');
$routes->get('demo/ajax', 'Demo::ajax');

// Pimpinan / Sekwan
$routes->group('pimpinan', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'Pimpinan::index');
    $routes->get('sk/(:any)', 'Pdf::generatePDF/$1');
    $routes->post('acc', 'Pimpinan::acc');
});

// User
$routes->group('user', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'User::index');
    $routes->get('sk/(:any)', 'Pdf::generatePDF/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH.'Config/'.ENVIRONMENT.'/Routes.php')) {
    require APPPATH.'Config/'.ENVIRONMENT.'/Routes.php';
}
