<?php

namespace App\Controllers;

use App\Models\GuestModel;
use App\Models\OPDModel;

class Guest extends BaseController
{
    public function __construct()
    {
        $this->guest = new GuestModel();
        $this->opd = new OPDModel();
    }

    public function add_guest()
    {
        if (isset($_POST['tambahGuest'])) {
            $val = $this->validate([
                'nama_guest' => [
                    'label' => 'Nama',
                    'rules' => 'required|alpha_space|max_length[50]',
                    'errors' => [
                        'max_length' => '{field} tidak boleh melebihi 10 karakter!',
                        'required' => '{field} tidak boleh kosong!',
                        'alpha_space' => '{field} tidak boleh angka!',
                    ],
                ],
                'no_hp' => [
                    'label' => 'No. Handphone',
                    'rules' => 'required|is_unique[tabel_guest.no_hp]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                        'is_unique' => '{field} sudah terdaftar!',
                    ],
                  ],
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                return redirect()->back();
            } else {
                $data = [
                   'id_guest' => $this->guest->generateID().$this->request->getPost('kd_opd'),
                   'kd_opd' => $this->request->getPost('kd_opd'),
                   'nama_guest' => $this->request->getPost('nama_guest'),
                   'no_hp' => $this->request->getPost('no_hp'),
                   'title' => 'Anggota OPD',
                ];

                // Sanitasi data input
                $data['nama_guest'] = htmlspecialchars($data['nama_guest'], ENT_QUOTES, 'UTF-8');
                $data['no_hp'] = htmlspecialchars($data['no_hp'], ENT_QUOTES, 'UTF-8');

                // Proses Insert Data dan setelah berhasil di kembalikan ke halaman semula
                $this->guest->insert($data);

                $kd_opd = $this->request->getPost('kd_opd');

                return redirect()->to('admin/anggota_opd/'.$kd_opd)->with('success', 'ditambahkan');
            }
        } else {
            $kd_opd = $this->request->getPost('kd_opd');

            return redirect()->to('admin/anggota_opd/'.$kd_opd);
        }
    }

    public function delete_guest($id_guest)
    {
        $this->guest->delete($id_guest);

        return redirect()->back()->with('success', 'dihapus');
    }
}
