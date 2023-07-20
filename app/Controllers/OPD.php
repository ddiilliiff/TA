<?php

namespace App\Controllers;

use App\Models\GuestModel;
use App\Models\OPDModel;

class OPD extends BaseController
{
    public function __construct()
    {
        $this->opd = new OPDModel();
        $this->guest = new GuestModel();
    }

    public function opd()
    {
        $opd = $this->opd->getData();

        $data = [
            'opd' => $opd,
            'title' => 'OPD',
        ];

        return view('admin/opd', $data);
    }

    public function add_opd()
    {
        if (isset($_POST['tambahOPD'])) {
            $val = $this->validate([
                'opd' => [
                    'label' => 'OPD',
                    'rules' => 'required|alpha_space|is_unique[tabel_fraksi.fraksi]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                        'alpha_space' => '{field} tidak boleh angka!',
                        'is_unique' => '{field} sudah ada!',
                    ],
                ],
                'akronim' => [
                    'label' => 'Akronim',
                    'rules' => 'required|is_unique[tabel_fraksi.akronim]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                        'is_unique' => '{field} sudah ada!',
                    ],
                ],
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrorS());

                return redirect()->back();
            } else {
                $data = [
                    'kd_opd' => $this->opd->generateID(),
                    'opd' => $this->request->getPost('opd'),
                    'akronim' => $this->request->getPost('akronim'),
                    'title' => 'OPD',
                ];

                $this->opd->insert($data);

                return redirect()->back()->with('success', 'ditambahkan');
            }
        } else {
            $data = [
                'kd_opd' => $this->opd->generateID(),
                'opd' => $this->request->getPost('opd'),
                'akronim' => $this->request->getPost('akronim'),
                'title' => 'OPD',
            ];

            return view('admin/opd', $data);
        }
    }

    public function update_opd()
    {
        $post = $this->request->getPost();
        $data = [
            'opd' => $post['opd'],
            'akronim' => $post['akronim'],
        ];

        $this->opd->update(['kd_opd' => $post['kd_opd']], $data);

        return redirect()->back()->with('success', 'diubah!');
    }

    public function delete_opd($kd_opd)
    {
        $this->opd->delete($kd_opd);

        return redirect()->to('admin/kategori_opd')->with('success', 'dihapus');
    }

    public function anggota_opd($kd_opd)
    {
        $guest = $this->guest->getGuestByOPD($kd_opd);
        $nama_opd = $this->opd->namaOPD($kd_opd);

        $data = [
            'guest' => $guest,
            'kd_opd' => $kd_opd,
            'opd' => $nama_opd,
            'title' => 'Anggota OPD',
        ];

        return view('admin/_opd/guest_by_opd', $data);
    }
}