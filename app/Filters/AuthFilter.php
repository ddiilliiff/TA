<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ambil rute yang sedang diakses
        $route = $request->uri->getPath();

        // Ambil peran pengguna dari sesi
        $role = session('role');

        // Cek akses pengguna berdasarkan peran dan rute yang diakses
        switch ($role) {
            case 1: // Admin
                if (strpos($route, 'admin') === false) {
                    // Jika pengguna dengan peran admin mencoba mengakses rute yang tidak sesuai
                    return redirect()->to('admin');
                }
                break;
            case 2: // Pimpinan
                if (strpos($route, 'pimpinan') === false) {
                    // Jika pengguna dengan peran pimpinan mencoba mengakses rute yang tidak sesuai
                    return redirect()->to('pimpinan');
                }
                break;
            case 3: // User
                if (strpos($route, 'user') === false) {
                    // Jika pengguna dengan peran user mencoba mengakses rute yang tidak sesuai
                    return redirect()->to('user');
                }
                break;
            default:
                // Jika peran tidak ditemukan, arahkan ke halaman login atau tampilkan pesan akses ditolak
                return redirect()->to('/');
                break;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan setelah filter dijalankan
    }
}
