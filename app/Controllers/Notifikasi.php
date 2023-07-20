<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\PesertaModel;
use App\Models\SidangModel;

class Notifikasi extends BaseController
{
    public function __construct()
    {
        $this->peserta = new PesertaModel();
        $this->jadwal = new JadwalModel();
        $this->sidang = new SidangModel();
    }

    public function notifikasi()
    {
        $id_jadwal = $this->request->getPost('id_jadwal');
        $no_hp = $this->peserta->getNomorHandphone($id_jadwal);
        $agenda = $this->sidang->getDataAll($id_jadwal);
        // dd($agenda);
        $nama_peserta = $this->peserta->getNamaPeserta($id_jadwal);

        // dd($id_jadwal, $no_hp, $agenda);
        // $agenda['agenda'] = $this->jadwal->getAgenda($id_jadwal);
        // $tanggal = $this->jadwal->getTanggal($id_jadwal);
        // $tempat = $this->jadwal->getTempat($id_jadwal);

        foreach ($no_hp as $index => $row) {
            $nomor_handphone = $row['no_hp'];
            $nama = $nama_peserta[$index];

            $agendaStr = $agenda['nama']; // Konversi array $agenda menjadi string
            $tanggalStr = \App\Helpers\MyHelper::formatTanggalIndonesia($agenda['tanggal']); // Konversi array $tanggal menjadi string
            $waktuStr = \App\Helpers\MyHelper::formatWit($agenda['waktu']); // Konversi array $tanggal menjadi string
            $tempatStr = $agenda['tempat']; // Konversi array $tempat menjadi string

            $message = "Yth. Bpk/Ibu {$nama},\n\nKami dari Sekretariat DPRD Kab. Keerom mengundang Bpk/Ibu dalam sidang, pada :\n\nHari/Tanggal: {$tanggalStr}.\n\nWaktu : {$waktuStr}.\n\nTempat: {$tempatStr}.\n\nAgenda: {$agendaStr}.\n\nDemikian undangan ini kami sampaikan terima kasih!";

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => [
                    'target' => $nomor_handphone,
                    'message' => $message,
                    'delay' => '1',
                ],
                CURLOPT_HTTPHEADER => [
                    'Authorization: xj1eDZ6a_vM6NhD@HDnG',
                ],
            ]);

            $response = curl_exec($curl);

            curl_close($curl);
        }
        if ($response) {
            return redirect()->back()->with('notif', 'Notifikasi berhasil dikirmkan!');
        }
    }
}
