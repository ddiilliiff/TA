<?php

namespace App\Controllers;

use App\Models\KomisiModel;

class Komisi extends BaseController
{
    public function __construct()
    {
        $this->komisi = new KomisiModel();
    }

    public function komisi()
    {
        $data = [
           'komisi' => $this->komisi->findAll(),
           'title' => 'Komisi',
        ];

        return view('admin/komisi', $data);
    }

    public function add_komisi()
    {
        if (isset($_POST['tambahKomisi'])) {
            $val = $this->validate([
                'komisi' => [
                    'label' => 'Komisi',
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
                $post = $this->request->getPost();

                $data = [
                    'komisi' => $post['komisi'],
                ];

                $this->komisi->insert($data);

                return redirect()->back()->with('success', 'ditambahkan!');
            }
        }

        return redirect()->back();
    }

    public function update_periode()
    {
    }

    public function delete_komisi($kd_komisi)
    {
        $this->komisi->delete($kd_komisi);

        return redirect()->back()->with('success', 'dihapus');
    }
}
