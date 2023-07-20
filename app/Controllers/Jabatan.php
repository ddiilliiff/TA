<?php

namespace App\Controllers;

use App\Models\JabatanModel;

class Jabatan extends BaseController
{
    public function __construct()
    {
        $this->jabatan = new JabatanModel();
    }

    public function jabatan()
    {
        $data = [
            'jabatan' => $this->jabatan->getData(),
            'title' => 'Jabatan',
        ];

        echo view('admin/jabatan', $data);
    }

    public function add_jabatan()
    {
        $data = [
            'jabatan' => $this->jabatan->getData(),
            'title' => 'Jabatan',
        ];
        if (isset($_POST['submit'])) {
            $val = [
                'jabatan' => [
                    'label' => 'Jabatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
            ];
            if (!$this->validate($val)) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
            } else {
                $data = [
                    'kd_jabatan' => $this->jabatan->generateID(),
                    'jabatan' => $this->request->getPost('jabatan'),
                ];
                $this->jabatan->insert($data);

                return redirect()->to('admin/kategori_jabatan')->with('success', 'ditambahkan');
            }
        }
        $data = [
            'jabatan' => $this->jabatan->getData(),
            'title' => 'Jabatan',
        ];

        return view('admin/jabatan', $data);
    }

    public function delete_jabatan($kd_jabatan)
    {
        $this->jabatan->delete($kd_jabatan);

        return redirect()->to('admin/kategori_jabatan')->with('success', 'dihapus');
    }

    public function update_jabatan()
    {
        if (isset($_POST['submit'])) {
            $val = [
                'jabatan' => [
                    'label' => 'Jabatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
            ];
            if (!$this->validate($val)) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
            } else {
                $kd_jabatan = $this->request->getPost('kd_jabatan');
                $jabatan = $this->request->getPost('jabatan');

                $data = [
                    'jabatan' => $jabatan,
                ];

                $this->jabatan->update(['kd_jabatan' => $kd_jabatan], $data);

                return redirect()->to('admin/kategori_jabatan')->with('success', 'diubah');
            }
        }
    }
}
