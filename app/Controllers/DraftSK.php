<?php

namespace App\Controllers;

use App\Models\DraftSKModel;
use App\Models\NotulensiModel;
use App\Models\SKModel;

class DraftSK extends BaseController
{
    public function __construct()
    {
        $this->draftsk = new DraftSKModel();
        $this->sk = new SKModel();
        $this->notulensi = new NotulensiModel();
    }

    public function draft_sk_notulensi()
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

    public function draft_sk()
    {
        $draft_sk = $this->draftsk->getData();

        $data = [
            'draft_sk' => $draft_sk,
            'title' => 'Draft S',
        ];

        return view('admin/draft_sk', $data);
    }

     public function form_draft_sk($id_notulensi)
     {
         $no_sk = $this->draftsk->generateKd();
         $draftSk = $this->draftsk->getDraftSkByNotulensi($id_notulensi);

         if (empty($draftSk)) {
             $data = [
                 'id_notulensi' => $id_notulensi,
                 'no_sk' => $no_sk,
                 'title' => 'Form SK',
             ];

             return view('admin/forms/form_draft_sk', $data);
         } else {
             $data = [
                'id_notulensi' => $id_notulensi,
                'no_sk' => $no_sk,
                'draft_sk' => $draftSk,
                'title' => 'Form SK',
           ];

             return view('admin/forms/form_draft_sk', $data);
         }
     }

     public function save_draft_sk()
     {
         $kd_draft_sk = $this->request->getPost('kd_draft_sk');
         $id_notulensi = $this->request->getPost('id_notulensi');
         $judul = $this->request->getPost('judul');
         $nomor = $this->draftsk->getNextAvailableDraftNumber();
         $tahun = date('Y');
         $tgl = date('Y-m-d');
         // $tanggal = \App\Helpers\MyHelper::formatTanggalIndonesia($tgl);

         $data = [
             'kd_draft_sk' => $kd_draft_sk,
             'id_notulensi' => $id_notulensi,
             'judul' => $judul,
             'nomor' => $nomor,
             'tahun' => $tahun,
             'tanggal' => $tgl,
             'status' => 1,
         ];

         $this->draftsk->insert($data);

         return redirect()->back()->with('success', 'Data Draft SK berhasil disimpan!');
     }

     public function update_draft_sk()
     {
         $kd_draft_sk = $this->request->getPost('kd_draft_sk');
         $judul = $this->request->getPost('judul');
         $data = [
             'judul' => $judul,
             'status' => 1,
         ];

         $this->draftsk->update(['kd_draft_sk' => $kd_draft_sk], $data);

         return redirect()->back()->with('success', 'Data Draft SK berhasil diubah!');
     }

     public function update_status_sk()
     {
         $kd_draft_sk = $this->request->getPost('kd_draft_sk');
         $data = [
             'status' => 2,
         ];

         $this->draftsk->update(['kd_draft_sk' => $kd_draft_sk], $data);

         return redirect()->back()->with('success', 'Data Draft SK selesai dilengkapi!');
     }
}