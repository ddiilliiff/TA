<?php

namespace App\Controllers;

use App\Models\DewanModel;
use App\Models\FraksiModel;
use App\Models\JabatanModel;
use App\Models\PenggunaModel;

class Dewan extends BaseController
{
    public function __construct()
    {
        $this->fraksi = new FraksiModel();
        $this->jabatan = new JabatanModel();
        $this->dewan = new DewanModel();
        $this->pengguna = new PenggunaModel();
    }

     public function dewan()
     {
         $data = [
             'fraksi' => $this->fraksi->getData(),
             'jabatan' => $this->jabatan->getData(),
             'dewan' => $this->dewan->getDataFull(),
             'title' => 'Dewan',
         ];

         return view('admin/dewan', $data);
     }

     public function add_dewan()
     {
         if (isset($_POST['tambahDewan'])) {
             $val = $this->validate([
                 'nama' => [
                     'label' => 'Nama Anggota Dewan',
                     'rules' => 'required|alpha_space|max_length[50]',
                     'errors' => [
                         'max_length' => '{field} tidak boleh melebihi 10 karakter!',
                         'required' => '{field} tidak boleh kosong!',
                         'alpha_space' => '{field} tidak boleh angka!',
                     ],
                 ],
                 'tempat_lahir' => [
                     'label' => 'Tempat lahir',
                     'rules' => 'required',
                     'errors' => [
                         'required' => '{field} tidak boleh kosong!',
                     ],
                 ],
                 'tanggal_lahir' => [
                     'label' => 'Tanggal lahir',
                     'rules' => 'required',
                     'errors' => [
                         'required' => '{field} tidak boleh kosong!',
                     ],
                 ],
                 'alamat' => [
                     'label' => 'Alamat',
                     'rules' => 'required',
                     'errors' => [
                         'required' => '{field} tidak boleh kosong!',
                     ],
                 ],
                 'no_hp' => [
                     'label' => 'No. Handphone',
                     'rules' => 'required|is_unique[tabel_dewan.no_hp]',
                     'errors' => [
                         'required' => '{field} tidak boleh kosong!',
                         'is_unique' => '{field} sudah terdaftar!',
                     ],
                 ],
                 'kd_jabatan' => [
                     'label' => 'Jabatan',
                     'rules' => 'required',
                     'errors' => [
                         'required' => '{field} tidak boleh kosong!',
                     ],
                 ],
                 'kd_komisi' => [
                     'label' => 'Komisi',
                     'rules' => 'required',
                     'errors' => [
                         'required' => '{field} tidak boleh kosong!',
                     ],
                 ],
                 'id_periode' => [
                     'label' => 'Periode',
                     'rules' => 'required',
                     'errors' => [
                         'required' => '{field} tidak boleh kosong!',
                     ],
                 ],
             ]);
             if (!$val) {
                 session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                 return redirect()->back();
             } else {
                 $kd_fraksi = $this->request->getPost('kd_fraksi');
                 $data = [
                     'id_dewan' => $this->dewan->generateID().$this->request->getPost('kd_fraksi').$this->request->getPost('kd_jabatan'),
                     'kd_fraksi' => $kd_fraksi,
                     'kd_jabatan' => $this->request->getPost('kd_jabatan'),
                     'id_periode' => $this->request->getPost('id_periode'),
                     'kd_komisi' => $this->request->getPost('kd_komisi'),
                     'nama' => $this->request->getPost('nama'),
                     'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                     'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                     'alamat' => $this->request->getPost('alamat'),
                     'no_hp' => $this->request->getPost('no_hp'),
                     'title' => 'Dewan',
                 ];

                 $this->dewan->insert($data);

                 $data = [
                    'id_user' => '',
                    'no_hp' => $this->request->getPost('no_hp'),
                    'password' => password_hash($this->request->getPost('tanggal_lahir'), PASSWORD_DEFAULT),
                    'role' => 3,
                ];

                 $this->pengguna->insert($data);

                 return redirect()->back()->with('success', 'ditambahkan');
             }
         } else {
             return redirect()->back();
         }
     }

     private function isJabatanWakilDuplicate($jabatan)
     {
         $jabatanData = $this->jabatan->getJabatanById($jabatan);

         // Cek apakah jabatan ketua, wakil ketua, atau sekretaris sudah ada dalam fraksi
         if (in_array($jabatan, ['J02']) && $jabatanData !== null) {
             return true;
         }

         return false;
     }

     private function isJabatanSekretarisDuplicate($jabatan)
     {
         $jabatanData = $this->jabatan->getJabatanById($jabatan);

         // Cek apakah jabatan ketua, wakil ketua, atau sekretaris sudah ada dalam fraksi
         if (in_array($jabatan, ['J03']) && $jabatanData !== null) {
             return true;
         }

         return false;
     }

     public function update_dewan()
     {
         $id_dewan = $this->request->getPost('id_dewan');
         $data = [
            // 'kd_fraksi' => $this->request->getPost('kd_fraksi'),
            'kd_jabatan' => $this->request->getPost('kd_jabatan'),
            'id_periode' => $this->request->getPost('id_periode'),
            'kd_komisi' => $this->request->getPost('kd_komisi'),
            'nama' => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
         ];

         $this->dewan->update(['id_dewan' => $id_dewan], $data);

         return redirect()->back()->with('success', 'diubah');
     }

     public function delete_dewan($id_dewan)
     {
         $this->dewan->delete($id_dewan);

         return redirect()->to('admin/dewan')->with('success', 'dihapus');
     }
}
