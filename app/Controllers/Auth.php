<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('session');
        $this->pengguna = new PenggunaModel();
    }

    public function index()
    {
        return redirect()->to(site_url('auth'));
    }

    public function login()
    {
        return view('auth/login');
    }

    public function authentication()
    {
        $post = $this->request->getPost();
        $pengguna = $this->pengguna->where('no_hp', $post['no_hp'])->first();
        if ($pengguna) {
            if ($post['no_hp'] == $pengguna['no_hp']) {
                if (password_verify($post['password'], $pengguna['password'])) {
                    if ($post['role'] == $pengguna['role']) {
                        $role = $pengguna['role'];
                        session()->set('role', $role);
                        switch ($role) {
                            case 1:
                                return redirect()->to('admin');
                                break;
                            case 2:
                                return redirect()->to('pimpinan');
                                break;
                            case 3:
                                return redirect()->to('user');
                                break;
                        }
                    } else {
                        return redirect()->back()->with('error', 'Role salah!');
                    }
                } else {
                    return redirect()->back()->with('error', 'Password salah!');
                }
            } else {
                return redirect()->back()->with('error', 'Email salah!');
            }
        } else {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
        }
    }

    public function logout()
    {
        $session = session();

        $session->remove('role');

        return redirect()->to('/')->with('logout', 'Anda berhasil logout!');
    }
}
