<?php

namespace App\Controllers;

use App\Models\SidangModel;

class Sidang extends BaseController
{
    public function __construct()
    {
        $this->sidang = new SidangModel();
    }

    public function sidang()
    {
        $sidang = $this->sidang->findAll();
        $data = [
           'title' => 'Sidang',
           'sidang' => $sidang,
        ];

        return view('admin/agenda', $data);
    }

    public function add_sidang()
    {
        if (isset($_POST['tambahAgenda'])) {
            $val = $this->validate([
                'nama' => [
                    'label' => 'Nama Sidang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrorS());

                return redirect()->back();
            } else {
                $post = $this->request->getPost();

                $data = [
                    'id_sidang' => $this->sidang->generateID(),
                    'nama' => $post['nama'],
                ];

                $this->sidang->insert($data);

                return redirect()->back()->with('success', 'disimpan!');
            }
        }
    }

    public function update_sidang()
    {
        $post = $this->request->getPost();
        $data = [
            'nama' => $post['nama'],
        ];

        $this->sidang->update(['id_sidang' => $post['id_sidang']], $data);

        return redirect()->back()->with('success', 'diubah!');
    }

    public function delete_sidang($id_sidang)
    {
        $this->sidang->delete($id_sidang);

        return redirect()->back()->with('success', 'dihapus');
    }
}
