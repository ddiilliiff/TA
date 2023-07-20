<?php

namespace App\Controllers;

use App\Models\PeraturanModel;

class Peraturan extends BaseController
{
    public function __construct()
    {
        $this->peraturan = new PeraturanModel();
    }

    public function peraturan()
    {
        $peraturan = $this->peraturan->getData();
        $data = [
            'peraturan' => $peraturan,
           'title' => 'Peraturan',
        ];

        return view('admin/peraturan', $data);
    }

    public function add_peraturan()
    {
        $isi = $this->request->getPost('isi');

        $data = [];

        foreach ($isi as $key => $value) {
            $data[] = [
                'aturan' => $isi[$key],
            ];
        }
        //   dd($data);

        $this->peraturan->insertBatch($data);

        return redirect()->to('admin/peraturan')->with('success', 'ditambahkan');
    }

    public function getAutocompleteData()
    {
        $term = $this->request->getVar('term'); // Mendapatkan kata kunci pencarian dari permintaan Ajax

        $data = $this->peraturan->searchAutocomplete($term);

        return $this->response->setJSON($data);
    }
}
