<?php

namespace App\Controllers;

use App\Models\DraftSKModel;
use App\Models\MemperhatikanModel;
use App\Models\MemutuskanModel;
use App\Models\MengingatModel;
use App\Models\MenimbangModel;
use App\Models\NotulensiModel;
use App\Models\PeraturanModel;
use App\Models\SKModel;

class SK extends BaseController
{
    public function __construct()
    {
        helper(['url']);
        $this->sk = new SKModel();
        $this->notulensi = new NotulensiModel();
        $this->memutuskan = new MemutuskanModel();
        $this->menimbang = new MenimbangModel();
        $this->mengingat = new MengingatModel();
        $this->memperhatikan = new MemperhatikanModel();
        $this->peraturan = new PeraturanModel();
        $this->draftsk = new DraftSKModel();
    }

    public function sk()
    {
        $draft_sk = $this->draftsk->getData();

        $data = [
            'draft_sk' => $draft_sk,
            'title' => 'SK',
        ];

        return view('admin/draft_sk', $data);
    }

    public function draft_sk()
    {
        $sk = $this->sk->findAll();
        $notulen = $this->notulensi->getNotulensiIsEnded();

        $data = [
            'sk' => $sk,
            'notulen' => $notulen,
            'title' => 'Draft SK',
        ];

        return view('admin/sk', $data);
    }

    public function form_draft_sk($id_notulensi)
    {
        $no_sk = $this->sk->generateSkCode();
        $data = [
            'id_notulensi' => $id_notulensi,
            'no_sk' => $no_sk,
            'title' => 'Form SK',
        ];

        return view('admin/forms/form_draft_sk', $data);
    }

    public function save_draft_sk()
    {
        $kd_draft_sk = $this->request->getPost('kd_sk');
        $id_notulensi = $this->request->getPost('id_notulensi');
        $judul = $this->request->getPost('judul');
        $tahun = date('Y');
        $tgl = date('Y-m-d');
        // $tanggal = \App\Helpers\MyHelper::formatTanggalIndonesia($tgl);

        $data = [
            'kd_drfat_sk' => $kd_draft_sk,
            'id_notulensi' => $id_notulensi,
            'judul' => $judul,
            'tahun' => $tahun,
            'tanggal' => $tgl,
            'status' => 1,
        ];

        $this->sk->insert($data);

        return redirect()->back()->with('success', 'Data SK berhasil disimpan!');
    }

    public function isi_sk($kd_draft_sk)
    {
        $draft_sk = $this->draftsk->getDataByKdDraftSk($kd_draft_sk);
        $sk = $this->sk->getSkByKdDraft($kd_draft_sk);
        if ($sk == null) {
            $data = [
                'draft_sk' => $draft_sk,
                'sk' => $sk,
                'title' => 'Isi SK',
            ];

            return view('admin/forms/form_isi_sk', $data);
        } else {
            $draft_sk = $this->draftsk->getDataByKdDraftSk($kd_draft_sk);
            $sk = $this->sk->getSkByKdDraft($kd_draft_sk);

            $mengingat = $this->mengingat->getKdSk($sk['kd_sk']);
            $menimbang = $this->menimbang->getKdSk($sk['kd_sk']);
            $memperhatikan = $this->memperhatikan->getKdSk($sk['kd_sk']);
            $memutuskan = $this->memutuskan->getKdSk($sk['kd_sk']);

            $data = [
                'mengingat' => $mengingat,
                'menimbang' => $menimbang,
                'memperhatikan' => $memperhatikan,
                'memutuskan' => $memutuskan,
                'draft_sk' => $draft_sk,
                'sk' => $sk,
                'title' => 'Isi SK',
            ];

            return view('admin/forms/form_isi_sk', $data);
        }
    }

    public function save_sk()
    {
        $kd_draft_sk = $this->request->getPost('kd_draft_sk');
        $kd_sk = $this->sk->generateKd();

        $data = [
            'kd_sk' => $kd_sk,
            'kd_draft_sk' => $kd_draft_sk,
            'e_sign' => '',
        ];

        $this->sk->insert($data);

        return redirect()->back();
    }

    public function update_sk()
    {
        $kd_sk = $this->request->getPost('kd_sk');

        $judul = $this->request->getPost('judul');

        $data = [
            'judul' => $judul,
            'e_sign' => '',
            'status' => 1,
        ];

        $this->sk->update(['kd_sk' => $kd_sk], $data);

        return redirect()->back()->with('success', 'Data SK berhasil diubah!');
    }

    public function save_diktum_memutuskan()
    {
        $kd_draft_sk = $this->request->getPost('kd_draft_sk');
        $kd_sk = $this->request->getPost('kd_sk');
        $nomor = $this->request->getPost('nomor');
        $isi = $this->request->getPost('isi');

        $data = [];

        foreach ($nomor as $key => $value) {
            $data[] = [
                'kd_sk' => $kd_sk,
                'nomor' => $value,
                'isi' => $isi[$key],
            ];
        }

        // dd($data);
        $this->memutuskan->insertBatch($data);

        return redirect()->to('admin/isi_sk/'.$kd_draft_sk)->with('success', 'Data Diktum Menimbang berhasil disimpan!');
    }

    public function save_konsideran_memperhatikan()
    {
        $kd_draft_sk = $this->request->getPost('kd_draft_sk');
        $kd_sk = $this->request->getPost('kd_sk');
        $nomor = $this->request->getPost('nomor');
        $isi = $this->request->getPost('isi');

        $data = [];

        foreach ($nomor as $key => $value) {
            $data[] = [
                'kd_sk' => $kd_sk,
                'nomor' => $value,
                'isi' => $isi[$key],
            ];
        }

        // dd($data);
        $this->memperhatikan->insertBatch($data);

        return redirect()->to('admin/isi_sk/'.$kd_draft_sk)->with('success', 'Data Konsideran Memperhatikan berhasil disimpan!');
    }

    public function save_konsideran_mengingat()
    {
        $kd_draft_sk = $this->request->getPost('kd_draft_sk');
        $kd_sk = $this->request->getPost('kd_sk');
        $nomor = $this->request->getPost('nomor');
        $isi = $this->request->getPost('isi');

        $data = [];

        foreach ($nomor as $key => $value) {
            $data[] = [
                'kd_sk' => $kd_sk,
                'nomor' => $value,
                'isi' => $isi[$key],
            ];
        }

        // dd($data);
        $this->mengingat->insertBatch($data);

        return redirect()->to('admin/isi_sk/'.$kd_draft_sk)->with('success', 'Data Konsideran Mengingat berhasil disimpan!');
    }

    public function save_konsideran_menimbang()
    {
        $kd_draft_sk = $this->request->getPost('kd_draft_sk');
        $kd_sk = $this->request->getPost('kd_sk');
        $nomor = $this->request->getPost('nomor');
        $isi = $this->request->getPost('isi');

        $data = [];

        foreach ($nomor as $key => $value) {
            $data[] = [
                'kd_sk' => $kd_sk,
                'nomor' => $value,
                'isi' => $isi[$key],
            ];
        }

        // dd($data);
        $this->menimbang->insertBatch($data);

        return redirect()->to('admin/isi_sk/'.$kd_draft_sk)->with('success', 'Data Konsideran Menimbang berhasil disimpan!');
    }

    public function update_diktum_memutuskan()
    {
        $data = $this->request->getPost(); // Mengambil data yang dikirim melalui form
        if (!isset($data['nomor'])) {
            return redirect()->back();
        }
        $memutuskan = [];
        $kd_sk = $data['kd_sk'];
        $nomor = $data['nomor'];
        $isi = $data['isi'];

        foreach ($nomor as $index => $value) {
            $id = $data['id'][$index];
            $memutuskan[] = [
                'id' => $id ? $id : null, // Jika ID ada, gunakan ID tersebut. Jika tidak, gunakan null untuk menandakan data baru.
                'kd_sk' => $kd_sk,
                'nomor' => $nomor[$index],
                'isi' => $isi[$index],
            ];
        }

        // Memisahkan data yang sudah ada dan data baru
        $existingData = array_filter($memutuskan, function ($diktum) {
            return $diktum['id'] !== null;
        });

        $newData = array_filter($memutuskan, function ($diktum) {
            return $diktum['id'] === null;
        });

        // Melakukan pembaruan data menggunakan updateBatch
        if ($existingData) {
            $this->memutuskan->updateBatch($existingData, 'id');
        }

        // Menambahkan data baru
        if ($newData) {
            $this->memutuskan->insertBatch($newData);
        }

        // Menghapus data yang tidak ada di form
        $idsFromForm = array_column($memutuskan, 'id');
        $this->memutuskan->whereNotIn('id', $idsFromForm)->delete();

        // Redirect atau memberikan respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Data Diktum Memutuskan berhasil diubah!');
    }

    public function update_konsideran_memperhatikan()
    {
        $data = $this->request->getPost(); // Mengambil data yang dikirim melalui form
        if (!isset($data['nomor'])) {
            return redirect()->back();
        }
        $memperhatikan = [];
        $kd_sk = $data['kd_sk'];
        $nomor = $data['nomor'];
        $isi = $data['isi'];

        foreach ($nomor as $index => $value) {
            $id = $data['id'][$index];
            $memperhatikan[] = [
                'id' => $id ? $id : null, // Jika ID ada, gunakan ID tersebut. Jika tidak, gunakan null untuk menandakan data baru.
                'kd_sk' => $kd_sk,
                'nomor' => $nomor[$index],
                'isi' => $isi[$index],
            ];
        }

        // Memisahkan data yang sudah ada dan data baru
        $existingData = array_filter($memperhatikan, function ($diktum) {
            return $diktum['id'] !== null;
        });

        $newData = array_filter($memperhatikan, function ($diktum) {
            return $diktum['id'] === null;
        });

        // Melakukan pembaruan data menggunakan updateBatch
        if ($existingData) {
            $this->memperhatikan->updateBatch($existingData, 'id');
        }

        // Menambahkan data baru
        if ($newData) {
            $this->memperhatikan->insertBatch($newData);
        }

        // Menghapus data yang tidak ada di form
        $idsFromForm = array_column($memperhatikan, 'id');
        $this->memperhatikan->whereNotIn('id', $idsFromForm)->delete();

        // Redirect atau memberikan respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Data Konsideran Memperhaatikan berhasil diubah!');
    }

    public function update_konsideran_mengingat()
    {
        $data = $this->request->getPost(); // Mengambil data yang dikirim melalui form
        if (!isset($data['nomor'])) {
            return redirect()->back();
        }
        $mengingat = [];
        $kd_sk = $data['kd_sk'];
        $nomor = $data['nomor'];
        $isi = $data['isi'];

        foreach ($nomor as $index => $value) {
            $id = $data['id'][$index];
            $mengingat[] = [
                'id' => $id ? $id : null, // Jika ID ada, gunakan ID tersebut. Jika tidak, gunakan null untuk menandakan data baru.
                'kd_sk' => $kd_sk,
                'nomor' => $nomor[$index],
                'isi' => $isi[$index],
            ];
        }

        // Memisahkan data yang sudah ada dan data baru
        $existingData = array_filter($mengingat, function ($diktum) {
            return $diktum['id'] !== null;
        });

        $newData = array_filter($mengingat, function ($diktum) {
            return $diktum['id'] === null;
        });

        // Melakukan pembaruan data menggunakan updateBatch
        if ($existingData) {
            $this->mengingat->updateBatch($existingData, 'id');
        }

        // Menambahkan data baru
        if ($newData) {
            $this->mengingat->insertBatch($newData);
        }

        // Menghapus data yang tidak ada di form
        $idsFromForm = array_column($mengingat, 'id');
        $this->mengingat->whereNotIn('id', $idsFromForm)->delete();

        // Redirect atau memberikan respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Data Konsideran Mengingat berhasil diubah!');
    }

    public function update_konsideran_menimbang()
    {
        $data = $this->request->getPost(); // Mengambil data yang dikirim melalui form
        if (!isset($data['nomor'])) {
            return redirect()->back();
        }
        $menimbang = [];
        $kd_sk = $data['kd_sk'];
        $nomor = $data['nomor'];
        $isi = $data['isi'];

        foreach ($nomor as $index => $value) {
            $id = $data['id'][$index];
            $menimbang[] = [
                'id' => $id ? $id : null, // Jika ID ada, gunakan ID tersebut. Jika tidak, gunakan null untuk menandakan data baru.
                'kd_sk' => $kd_sk,
                'nomor' => $nomor[$index],
                'isi' => $isi[$index],
            ];
        }

        // Memisahkan data yang sudah ada dan data baru
        $existingData = array_filter($menimbang, function ($diktum) {
            return $diktum['id'] !== null;
        });

        $newData = array_filter($menimbang, function ($diktum) {
            return $diktum['id'] === null;
        });

        // Melakukan pembaruan data menggunakan updateBatch
        if ($existingData) {
            $this->menimbang->updateBatch($existingData, 'id');
        }

        // Menambahkan data baru
        if ($newData) {
            $this->menimbang->insertBatch($newData);
        }

        // Menghapus data yang tidak ada di form
        $idsFromForm = array_column($menimbang, 'id');
        $this->menimbang->whereNotIn('id', $idsFromForm)->delete();

        // Redirect atau memberikan respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Data Konsideran Menimbang berhasil diubah!');
    }

    public function ajax()
    {
        $term = $this->request->getVar('term');
        $menimbang = $this->menimbang->like('isi', $term, 'both')->findColumn('isi');
        // dd($menimbang);

        return $this->response->setJSON($menimbang);
    }
}
