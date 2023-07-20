<?php

namespace App\Controllers;

use App\Models\DewanModel;
use App\Models\DraftSKModel;
use App\Models\FraksiModel;
use App\Models\JabatanModel;
use App\Models\JadwalModel;
use App\Models\NotulensiModel;
use App\Models\PesertaModel;
use App\Models\SidangModel;
use App\Models\SKModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->fraksi = new FraksiModel();
        $this->jabatan = new JabatanModel();
        $this->dewan = new DewanModel();
        $this->notulensi = new NotulensiModel();
        $this->sk = new SKModel();
        $this->draftsk = new DraftSKModel();
        $this->jadwal = new JadwalModel();
        $this->sidang = new SidangModel();
        $this->peserta = new PesertaModel();
    }

    // Dashboard
    public function index()
    {
        $dewan = $this->dewan->findAll();
        $sidang_belum = $this->jadwal->findAll();
        $sidang_sudah = $this->notulensi->findAll();
        $fraksi = $this->fraksi->findAll();
        $dewan = $this->dewan->findAll();
        $sk = $this->sk->findAll();
        $data = [
            'title' => 'Dashboard',
            'dewan' => $dewan,
            'fraksi' => $fraksi,
            'sidang_belum' => $sidang_belum,
            'sidang_sudah' => $sidang_sudah,
            'sk' => $sk,
        ];
        echo view('admin/index', $data);
    }

    public function sk()
    {
        $data = [
            // 'data' => $this->sk->getTracking(),
            // 'tracking' => $this->sk->tracking(),
            'title' => 'Tracking SK',
        ];

        return view('admin/tracking', $data);
    }

    public function search_sk()
    {
        $startDate = $this->request->getVar('tanggal_awal');
        $endDate = $this->request->getVar('tanggal_akhir');

        $hasil = $this->sk->searchByTanggal($startDate, $endDate);
        $data = [
            'data' => $hasil,
            'title' => 'Tracking SK',
            'tanggal_awal' => $startDate,
            'tanggal_akhir' => $endDate,
        ];

        return view('admin/tracking', $data);
    }

    public function tracking_sk($id_notulensi)
    {
        $jadwalFinal = $this->notulensi->getIdJadwal($id_notulensi);

        $sidang = $this->jadwal->getIdSidang($jadwalFinal);

        $data = [
        'listSidang' => $this->jadwal->findBySidang($sidang),
        'title' => 'Track SK',
        ];

        return view('admin/tracking_sk', $data);
    }

    public function tracking_notulen($id_jadwal)
    {
        // dd($id_jadwal);
        $data = [
            'title' => 'Tracking SK',
            'data' => $this->notulensi->trackNotulen($id_jadwal),
         ];
        // dd($data);

        return view('admin/tracking_notulen', $data);
    }

    public function tracking_peserta($id_jadwal)
    {
        $data = [
            'title' => 'Tracking SK',
            'data' => $this->peserta->trackPeserta($id_jadwal),
        ];
        // dd($data);

        return view('admin/tracking_peserta', $data);
    }

    // public function laporan_sk($id_notulensi)
    // {
    //     dd($id_notulensi);
    // }
}