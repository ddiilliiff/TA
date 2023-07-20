<?php

namespace App\Controllers;

use App\Models\DewanModel;
use App\Models\FraksiModel;
use App\Models\JabatanModel;
use App\Models\KomisiModel;
use App\Models\PeriodeModel;

class Fraksi extends BaseController
{
    public function __construct()
    {
        $this->fraksi = new FraksiModel();
        $this->jabatan = new JabatanModel();
        $this->dewan = new DewanModel();
        $this->komisi = new KomisiModel();
        $this->periode = new PeriodeModel();
    }

    public function fraksi()
    {
        // Mengambil data fraksi menggunakan FraksiModel
        $data = [
            'fraksi' => $this->fraksi->getDataDesc(),
            'title' => 'Fraksi',
        ];

        // dd($data);
        echo view('admin/fraksi', $data);
    }

    public function add_fraksi()
    {
        if (isset($_POST['tambahFraksi'])) {
            $val = $this->validate([
                'fraksi' => [
                    'label' => 'Nama Fraksi',
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
                    'kd_fraksi' => $this->fraksi->generateID(),
                    'fraksi' => $this->request->getPost('fraksi'),
                    'akronim' => $this->request->getPost('akronim'),
                    'title' => 'Fraksi',
                ];

                $data['fraksi'] = htmlspecialchars($data['fraksi'], ENT_QUOTES, 'UTF-8');
                $data['akronim'] = htmlspecialchars($data['akronim'], ENT_QUOTES, 'UTF-8');

                $this->fraksi->insert($data);

                return redirect()->back()->with('success', 'ditambahkan');
            }
        } else {
            $data = [
                'fraksi' => $this->fraksi->getData(),
                'title' => 'Fraksi',
            ];

            return view('admin/fraksi', $data);
        }
    }

    // Edit Data Fraksi
    public function update_fraksi()
    {
        $kd_fraksi = $this->request->getPost('kd_fraksi');
        $fraksi = $this->request->getPost('fraksi');
        $akronim = $this->request->getPost('akronim');

        $data = [
            'fraksi' => $fraksi,
            'akronim' => $akronim,
        ];
        $this->fraksi->update(['kd_fraksi' => $kd_fraksi], $data);

        return redirect()->back()->with('success', 'diubah');
    }

    // Hapus Data Fraksi
    public function delete_fraksi($kd_fraksi)
    {
        $this->fraksi->delete($kd_fraksi);

        return redirect()->back()->with('success', 'dihapus');
    }

     public function anggota_fraksi($kd_fraksi)
     {
         $result = $this->dewan->getAnggotaByFraksi($kd_fraksi);
         $fraksi = $this->fraksi->getFraksiById($kd_fraksi);
         $jabatan = $this->jabatan->getData();
         $komisi = $this->komisi->getData();
         $periode = $this->periode->getData();

         $data = [
             'dewan' => $result,
             'fraksi' => $fraksi,
             'jabatan' => $jabatan,
             'komisi' => $komisi,
             'periode' => $periode,
             'title' => 'Anggota Fraksi',
         ];

         return view('admin/_dewan/dewan_by_fraksi', $data);
     }
}
