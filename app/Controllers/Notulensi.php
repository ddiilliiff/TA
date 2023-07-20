<?php

namespace App\Controllers;

use App\Models\DewanModel;
use App\Models\FraksiModel;
use App\Models\JabatanModel;
use App\Models\JadwalModel;
use App\Models\NotulensiModel;
use App\Models\PesertaModel;

class Notulensi extends BaseController
{
    public function __construct()
    {
        $this->fraksi = new FraksiModel();
        $this->jabatan = new JabatanModel();
        $this->dewan = new DewanModel();
        $this->peserta = new PesertaModel();
        $this->jadwal = new JadwalModel();
        $this->notulensi = new NotulensiModel();
    }

    public function notulensi()
    {
        $data = [
            'jadwal' => $this->jadwal->getData(),
            'title' => 'Notulensi',
        ];

        return view('admin/notulensi', $data);
    }

    public function form_notulensi($id_jadwal)
    {
        $data = [
            'id_jadwal' => $id_jadwal,
            'jadwal' => $this->jadwal->getDataById($id_jadwal),
            'notulensi' => $this->notulensi->getNotulensiByIdJadwal($id_jadwal),
            'peserta' => $this->peserta->getPesertaByIdJadwal($id_jadwal),
            'title' => 'Notulensi Sidang',
         ];

        return view('admin/forms/form_notulensi', $data);
    }

    public function add_notulensi()
    {
        if (isset($_POST['submitNotulensi'])) {
            $val = $this->validate([
                'judul' => [
                    'label' => 'Judul Sidang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'hasil_sidang' => [
                    'label' => 'Hasil Sidang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'status' => [
                    'label' => 'Status Sidang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrorS());

                $id_jadwal = $this->request->getPost('id_jadwal');

                $data = [
                    'notulensi' => $this->notulensi->getDataByIdJadwal($id_jadwal),
                    'id_jadwal' => $id_jadwal,
                    'title' => 'Notulensi Sidang',
                 ];

                return redirect()->back();
            } else {
                $data = [
                    'id_notulensi' => $this->notulensi->generateID().$this->request->getPost('id_jadwal'),
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'judul' => $this->request->getPost('judul'),
                    'hasil_sidang' => $this->request->getPost('hasil_sidang'),
                    'status' => $this->request->getPost('status'),
                ];

                $data['hasil_sidang'] = htmlspecialchars($data['hasil_sidang'], ENT_QUOTES, 'UTF-8');

                $this->notulensi->insert($data);

                $id_jadwal = $this->request->getPost('id_jadwal');
                $status_sidang = $this->request->getPost('status');

                $data_status = [
                    'status' => $status_sidang,
                ];

                $this->jadwal->update(['id_jadwal' => $id_jadwal], $data_status);

                // return redirect()->to('admin/notulensi/'.$this->request->getPost('id_jadwal'))->with('success', 'disimpan!');
                return redirect()->back()->with('success', 'disimpan!');
            }
        } else {
            return redirect()->back();
        }
    }

    public function add_jadwal()
    {
        if (isset($_POST['tambahJadwal'])) {
            $val = $this->validate([
                'agenda' => [
                    'label' => 'Agenda',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi!',
                    ],
                ],
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
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'title' => 'Notulensi',
                    'jadwal' => $this->jadwal->getData(),
                ];

                return view('admin/form_sidang', $data);
            } else {
                $data = [
                    'id_jadwal' => $this->jadwal->generateID(),
                    'agenda' => $this->request->getPost('agenda'),
                    'tanggal' => $this->request->getPost('tanggal'),
                    'tempat' => $this->request->getPost('tempat'),
                    'status' => 1,  // Default 1 = Baru
                ];
                $data['agenda'] = htmlspecialchars($data['agenda'], ENT_QUOTES, 'UTF-8');
                $data['tanggal'] = htmlspecialchars($data['tanggal'], ENT_QUOTES, 'UTF-8');
                $data['tempat'] = htmlspecialchars($data['tempat'], ENT_QUOTES, 'UTF-8');

                $this->jadwal->insert($data);

                return redirect()->back()->with('success', 'ditambahkan');
            }
        } else {
            // return view('admin/jadwal', $data);

            return redirect()->back();
        }
    }

    public function update_notulensi()
    {
        $id_notulensi = $this->request->getPost('id_notulensi');
        $judul = $this->request->getPost('judul');
        $hasil_sidang = $this->request->getPost('hasil_sidang');
        $status = $this->request->getPost('status');

        $data = [
            'id_notulensi' => $id_notulensi,
            'judul' => $judul,
            'hasil_sidang' => $hasil_sidang,
            'status' => $status,
        ];

        $this->notulensi->update(['id_notulensi' => $id_notulensi], $data);

        $id_jadwal = $this->request->getPost('id_jadwal');
        $status_sidang = $this->request->getPost('status');

        $data_status = [
            'status' => $status_sidang,
        ];

        $this->jadwal->update(['id_jadwal' => $id_jadwal], $data_status);

        // return redirect()->to('admin/notulensi/'.$this->request->getPost('id_jadwal'))->with('success', 'disimpan!');
        return redirect()->back()->with('success', 'disimpan!');
    }
}
