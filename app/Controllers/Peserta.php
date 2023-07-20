<?php

namespace App\Controllers;

use App\Models\DewanModel;
use App\Models\FraksiModel;
use App\Models\GuestModel;
use App\Models\JabatanModel;
use App\Models\JadwalModel;
use App\Models\PesertaModel;

class Peserta extends BaseController
{
    public function __construct()
    {
        $this->peserta = new PesertaModel();
        $this->jadwal = new JadwalModel();
        $this->dewan = new DewanModel();
        $this->fraksi = new FraksiModel();
        $this->fraksi = new JabatanModel();
        $this->guest = new GuestModel();
    }

    public function peserta($id_jadwal)
    {
        $data = [
           'dewan' => $this->dewan->getDataFull(),
           'guest' => $this->guest->getDataFull(),
           'peserta' => $this->peserta->getPesertaByIdJadwal($id_jadwal),
           'id_jadwal' => $id_jadwal,
           'title' => 'Peserta Sidang',
        ];

        return view('admin/peserta', $data);
    }

    public function add_peserta_i()
    {
        if (isset($_POST['tambahPeserta'])) {
            $id_jadwal = $this->request->getPost('id_jadwal');

            $val = $this->validate([
                'id_dewan' => [
                    'label' => 'Peserta',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi!',
                        'is_unique' => '{field} sudah ada!',
                        'unique_peserta' => '{field} sudah ada dalam sidang!',
                    ],
                ],
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                return redirect()->back();
            } else {
                $id_jadwal = $this->request->getPost('id_jadwal');
                $id_dewan_or_guest = $this->request->getPost('id_dewan');
                $isDuplicate = $this->peserta->isDuplicatePeserta($id_dewan_or_guest, $id_jadwal);
                if ($isDuplicate == true) {
                    return redirect()->back()->with('error', 'Data Peserta sudah ada dalam sidang ini!');
                } else {
                    $data = [
                        'id_peserta' => $this->peserta->generateID().$this->request->getPost('id_jadwal').$this->request->getPost('id_dewan'),
                        'id_dewan_or_guest' => $this->request->getPost('id_dewan'),
                        'id_jadwal' => $this->request->getPost('id_jadwal'),
                        'nama' => $this->request->getPost('nama_peserta'),
                        'no_hp' => $this->request->getPost('no_hp'),
                        'peserta' => '',
                    ];

                    $this->peserta->insert($data);

                    return redirect()->back()->with('success', 'ditambahkan');
                }
            }
        } else {
            $data = [
                'dewan' => $this->dewan->getDataFull(),
                'id_jadwal' => $this->request->getVar('id_jadwal'),
                'guest' => $this->guest->getDataFull(),
                'title' => 'Peserta Sidang',
            ];

            return view('admin/peserta', $data);
        }
    }

    public function add_peserta_e()
    {
        if (isset($_POST['tambahGuest'])) {
            $val = $this->validate([
                'data_guest' => [
                    'label' => 'Peserta',
                    'rules' => 'required|is_unique[tabel_peserta.id_dewan_or_guest]',
                    'errors' => [
                        'required' => '{field} harus diisi!',
                        'is_unique' => '{field} sudah ada!',
                    ],
                ],
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                return redirect()->back();
            } else {
                $id_jadwal = $this->request->getPost('id_jadwal');
                $id_dewan_or_guest = $this->request->getPost('id_guest');
                $isDuplicate = $this->peserta->isDuplicatePeserta($id_dewan_or_guest, $id_jadwal);
                if ($isDuplicate == true) {
                    return redirect()->back()->with('error', 'Data Peserta sudah ada dalam sidang ini!');
                } else {
                    $data = [
                        'id_peserta' => $this->peserta->generateID().$this->request->getPost('id_jadwal').$this->request->getPost('id_guest'),
                        'id_dewan_or_guest' => $this->request->getPost('id_guest'),
                        'id_jadwal' => $this->request->getPost('id_jadwal'),
                        'nama' => $this->request->getPost('nama_peserta'),
                        'no_hp' => $this->request->getPost('no_hp'),
                    ];

                    $this->peserta->insert($data);

                    $id_jadwal = $this->request->getPost('id_jadwal');
                    $dewan = $this->dewan->getDataFull();
                    $guest = $this->guest->getDataFull();
                    $peserta = $this->peserta->getPesertaByIdJadwal($id_jadwal);
                    $data = [
                        'id_jadwal' => $id_jadwal,
                        'dewan' => $dewan,
                        'peserta' => $peserta,
                        'guest' => $guest,
                        'title' => 'Peserta',
                    ];

                    return redirect()->back()->with('success', 'ditambahkan');
                }
            }
        }

        return redirect()->back();
    }

    public function delete_peserta($id_peserta)
    {
        $this->peserta->delete($id_peserta);

        return redirect()->back()->with('success', 'dihapus!');
    }

    public function presensi()
    {
        $ids = $this->request->getPost('ids');

        if (!empty($ids)) {
            $data = [];
            foreach ($ids as $id) {
                $data[] = [
                    'id_peserta' => $id,
                    'presensi' => 1,
                ];
            }

            $this->peserta->updateBatch($data, 'id_peserta');
        }

        return redirect()->back()->with('presensi', 'Berhasil melakukan presensi');
    }
}
