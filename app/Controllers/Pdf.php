<?php

namespace App\Controllers;

use App\Models\DraftSKModel;
use App\Models\JadwalModel;
use App\Models\MemperhatikanModel;
use App\Models\MemutuskanModel;
use App\Models\MengingatModel;
use App\Models\MenimbangModel;
use App\Models\NotulensiModel;
use App\Models\PesertaModel;
use App\Models\SKModel;

class Pdf extends BaseController
{
    public function __construct()
    {
        $this->memutuskan = new MemutuskanModel();
        $this->menimbang = new MenimbangModel();
        $this->mengingat = new MengingatModel();
        $this->memperhatikan = new MemperhatikanModel();
        $this->sk = new SKModel();
        $this->draftsk = new DraftSKModel();
        $this->jadwal = new JadwalModel();
        $this->notulensi = new NotulensiModel();
        $this->peserta = new PesertaModel();
    }

    public function generatePDF($kd_sk)
    {
        $info = $this->sk->informasiSK($kd_sk);
        $memutuskan = $this->memutuskan->getKdSk($kd_sk);
        $memperhatikan = $this->memperhatikan->getKdSk($kd_sk);
        $menimbang = $this->menimbang->getKdSk($kd_sk);
        $mengingat = $this->mengingat->getKdSk($kd_sk);

        $data = [
            'info' => $info,
            'mengingat' => $mengingat,
            'menimbang' => $menimbang,
            'memperhatikan' => $memperhatikan,
            'memutuskan' => $memutuskan,
        ];
        // dd($data);
        $html = view('admin/sk/sk', $data);

        // Buat objek TCPDF
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('times', '', 12, '');
        $pdf->SetMargins(30, 10);

        $pdf->setPrintHeader(false);
        $imageFile = FCPATH.'img/logo.jpg';

        $pdf->AddPage();

        // Tampilkan gambar
        $pdf->Image($imageFile, 90, 10, 30, 0, 'JPG');

        // Tentukan posisi dan ukuran konten
        $contentX = 10; // Koordinat X konten
        $contentY = 37; // Koordinat Y konten
        $contentWidth = 190; // Lebar konten
        $contentHeight = 200; // Tinggi konten

        // Tulis konten
        $pdf->writeHTMLCell($contentWidth, $contentHeight, $contentX, $contentY, $html, 0, 0, false, true);

        $this->response->setContentType('application/pdf');
        $pdf->Output('example.pdf', 'I');
    }

    public function generateLaporan()
    {
        $sk = $this->draftsk->finalSK();
        $sidang = $this->jadwal->jumlahSidang();
        $data = [
            'sk' => $sk,
            'sidang' => $sidang,
        ];
        // dd($data);
        $html = view('admin/laporan', $data);

        // Buat objek TCPDF
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('times', '', 12, '');
        $pdf->SetMargins(30, 10);

        $pdf->setPrintHeader(false);
        $imageFile = FCPATH.'img/dprd.jpg';

        $pdf->AddPage();

        // Tampilkan gambar
        $pdf->Image($imageFile, 30, 16, 20, 0, 'JPG');

        // Tulis konten
        $pdf->writeHTML($html);

        $this->response->setContentType('application/pdf');
        $pdf->Output('example.pdf', 'I');
    }

    public function laporan()
    {
        $startDate = $this->request->getVar('tanggal_awal');
        $endDate = $this->request->getVar('tanggal_akhir');

        // Menggunakan nilai tersebut untuk membangun query filter
        $namaModel = new JadwalModel();

        $data['hasil_query'] = $namaModel->where('tanggal >=', $startDate)
                                        ->where('tanggal <=', $endDate)
                                        ->findAll();

        // dd($data);
        // Melakukan sesuatu dengan hasil query, misalnya melewatkan data ke view
        return view('nama_view', $data);
    }

    public function laporan_sk($id_notulensi)
    {
        $jadwalFinal = $this->notulensi->getIdJadwal($id_notulensi);

        $sidang = $this->jadwal->getIdSidang($jadwalFinal);

        $listSidang = $this->jadwal->findBySidang($sidang);

        // $jadwal = [];

        $data = [
            'jadwalFinal' => $jadwalFinal,

            'sidang' => $sidang,

            'listSidang' => $listSidang,
        ];
        dd($data);
    }
}
