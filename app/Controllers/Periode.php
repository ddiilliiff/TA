<?php

namespace App\Controllers;

use App\Models\PeriodeModel;

class Periode extends BaseController
{
    public function __construct()
    {
        $this->periode = new PeriodeModel();
    }

    public function periode()
    {
        $data = [
           'periode' => $this->periode->findAll(),
           'title' => 'Periode',
        ];

        return view('admin/periode', $data);
    }

    public function add_periode()
    {
        if (isset($_POST['tambahPeriode'])) {
            $val = $this->validate([
                'periode_awal' => [
                    'label' => 'Periode Awal',
                    'rules' => 'required|numeric|max_length[4]|min_length[4]',
                    'errors' => [
                        'required' => '{field} harus diisi!',
                        'numeric' => '{field} harus angka!',
                        'max_length' => '{field} harus format tahun!',
                        'min_length' => '{field} harus format tahun!',
                    ],
                ],
                'periode_akhir' => [
                    'label' => 'Periode Akhir',
                    'rules' => 'required|numeric|max_length[4]|min_length[4]',
                    'errors' => [
                        'required' => '{field} harus diisi!',
                        'numeric' => '{field} harus angka!',
                        'max_length' => '{field} harus format tahun!',
                        'min_length' => '{field} harus format tahun!',
                    ],
                ],
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                return redirect()->back();
            } else {
                $post = $this->request->getPost();

                $data = [
                    'periode' => $post['periode_awal'].'/'.$post['periode_akhir'],
                ];

                $this->periode->insert($data);

                return redirect()->back()->with('success', 'ditambahkan!');
            }
        }

        return redirect()->back();
    }

    public function update_periode()
    {
    }

    public function delete_periode($id_periode)
    {
        $this->periode->delete($id_periode);

        return redirect()->back()->with('success', 'dihapus');
    }
}
