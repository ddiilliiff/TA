<?php

namespace App\Controllers;

use App\Models\DewanModel;
use App\Models\PenggunaModel;
use App\Models\UserModel;

class Pengguna extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->pengguna = new PenggunaModel();
        $this->dewan = new DewanModel();
    }

     public function index()
     {
         $pengguna = $this->pengguna->findAll();
         $data = [
             'title' => 'Pengguna',
             'pengguna' => $pengguna,
         ];

         return view('admin/pengguna', $data);
     }

     public function delete_user($id_user)
     {
         $this->user->delete($id_user);

         return redirect()->to('admin/user')->with('success', 'dihapus');
     }

     public function create_user()
     {
         $id = $this->request->getVar('id_dewan');
         if (isset($_POST['tambahUser'])) {
             $val = $this->validate([
                'email' => [
                   'label' => 'Email',
                   'rules' => 'required|is_unique[tabel_user.email]',
                   'errors' => [
                      'required' => '{field}  harus diisi!',
                      'is_unique' => '{field} sudah terdaftar!',
                      ],
                   ],
               ]);
             if (!$val) {
                 session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                 $data = [
                     'dewan' => $this->dewan->getALlData(),
                     'user' => $this->user->getData(),
                     'title' => 'User',
                  ];

                 return view('admin/user', $data);
             } else {
                 $data = [
                    'id_user' => $this->user->generateID().$this->request->getVar('id_dewan'),
                    'id_dewan' => $this->request->getVar('id_dewan'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->user->generateAndHashPassword(),
                    'role' => 'anggota',
                 ];

                 $this->user->insert($data);

                 return redirect()->to('admin/user')->with('success', 'ditambahkan');
             }
         } else {
             //  return view('admin/user', $data);
         }
     }
}