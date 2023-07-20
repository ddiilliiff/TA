<?php

namespace App\Controllers;

use App\Models\DewanModel;
use App\Models\FraksiModel;
use App\Models\JabatanModel;
use App\Models\JadwalModel;

class Jadwal extends BaseController
{
    public function __construct()
    {
        $this->fraksi = new FraksiModel();
        $this->jabatan = new JabatanModel();
        $this->dewan = new DewanModel();
        $this->jadwal = new JadwalModel();
    }

    public function jadwal($id_sidang)
    {
        $data = [
            'id_sidang' => $id_sidang,
            'jadwal' => $this->jadwal->getDataByAgenda($id_sidang),
            'title' => 'Jadwal Sidang',
        ];
        // dd($data);

        return view('admin/jadwal', $data);
    }

    public function add_jadwal()
    {
        if (isset($_POST['tambahJadwal'])) {
            $val = $this->validate([
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required|is_unique[tabel_jadwal.tanggal]',
                    'errors' => [
                        'required' => '{field} harus diisi!',
                        'is_unique' => '{field} sudah ada! Tidak dibolehkan ada sidang lain di {field} yang sama!',
                    ],
                ],
                'tempat' => [
                    'label' => 'Tempat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi!',
                    ],
                ],
                'waktu' => [
                    'label' => 'Waktu',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi!',
                    ],
                ],
                'keterangan' => [
                    'label' => 'Keterangan Sidang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi!',
                    ],
                ],
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                return redirect()->back();
            } else {
                $data = [
                    'id_jadwal' => $this->jadwal->generateID(),
                    'id_sidang' => $this->request->getPost('id_sidang'),
                    'tanggal' => $this->request->getPost('tanggal'),
                    'waktu' => $this->request->getPost('waktu'),
                    'tempat' => $this->request->getPost('tempat'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'status' => 1,  // Default 1 = Baru
                ];

                $this->jadwal->insert($data);

                return redirect()->back()->with('success', 'ditambahkan');
            }
        } else {
            return redirect()->back();
        }
    }

    public function update_jadwal()
    {
        $post = $this->request->getPost();
        // dd($post);
        $data = [
            'tanggal' => $post['tanggal'],
            'waktu' => $post['waktu'],
            'tempat' => $post['tempat'],
        ];

        $this->jadwal->update(['id_jadwal' => $post['id_jadwal']], $data);

        return redirect()->back()->with('success', 'diubah');
    }

    public function delete_jadwal($id_jadwal)
    {
        $this->jadwal->delete($id_jadwal);

        return redirect()->back()->with('success', 'dihapus');
    }
}
