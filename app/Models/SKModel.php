<?php

namespace App\Models;

use CodeIgniter\Model;

class SKModel extends Model
{
    protected $table = 'tabel_sk'; // Nama tabel di database
    protected $primaryKey = 'kd_sk'; // Nama kolom primary key
    protected $allowedFields = ['kd_sk', 'kd_draft_sk', 'e_sign']; // Kolom yang bisa di input

    public function getData()
    {
        return $this->findAll();
    }

    public function getSKbyNotulen($id_notulensi)
    {
        $query = 'SELECT * FROM tabel_sk
              INNER JOIN tabel_notulensi ON tabel_sk.id_notulensi = tabel_notulensi.id_notulensi
              WHERE tabel_sk.id_notulensi = ?';

        return $this->db->query($query, [$id_notulensi])->getResultArray();
    }

    public function getSKpending()
    {
        $query = 'SELECT * FROM tabel_draft_sk
              INNER JOIN tabel_sk ON tabel_sk.kd_draft_sk= tabel_draft_sk.kd_draft_sk';

        return $this->db->query($query)->getResultArray();
    }

    public function generateUrutanSK()
    {
        $currentYear = date('Y'); // Mendapatkan tahun sekarang
        $lastSK = $this->orderBy('kd_sk', 'DESC')->first(); // Mendapatkan SK terakhir

        if ($lastSK) {
            $lastSKYear = substr($lastSK['kd_sk'], 2, 4); // Mendapatkan tahun dari nomor SK terakhir
            $lastSKNumber = substr($lastSK['kd_sk'], -3); // Mendapatkan empat digit terakhir dari nomor SK terakhir
            $newSKNumber = (int) $lastSKNumber + 1; // Increment nomor SK terakhir

            if ($currentYear != $lastSKYear) {
                // Jika tahun berbeda dengan tahun dari nomor SK terakhir, reset nomor SK menjadi 1
                $newSKNumber = 1;
            }
        } else {
            $newSKNumber = 1;
        }

        // Konversi nomor SK menjadi kata
        $numberWords = [
            1 => 'PERTAMA',
            2 => 'KEDUA',
            3 => 'KETIGA',
            // Tambahkan angka kata hingga KESERATUS sesuai kebutuhan
        ];

        $newSKNumberPadded = str_pad($newSKNumber, 3, '0', STR_PAD_LEFT); // Padding dengan nol di depan jika kurang dari empat digit
        $newSK = 'SK'.$currentYear.$newSKNumberPadded; // Gabungkan komponen menjadi nomor SK baru
        $newSKWord = isset($numberWords[$newSKNumber]) ? $numberWords[$newSKNumber] : '';

        return [$newSK, $newSKWord, $currentYear];
    }

    public function getSKByNotulensiId($id_notulensi)
    {
        return $this->where('id_notulensi', $id_notulensi)
        ->first();
    }

    public function generateSkCode()
    {
        $currentYear = date('Y'); // Mendapatkan tahun sekarang
        $prefix = 'SK/'; // Awalan kode SK
        $suffix = '/DPRD'; // Akhiran kode SK

        // Mengambil jumlah data SK
        $skCount = $this->countAllResults();

        $skNumber = str_pad($skCount + 1, 2, '0', STR_PAD_LEFT); // Mengisi nomor dengan 2 digit, misal: 01, 02, dst.

        $skCode = $prefix.$skNumber.'/'.$currentYear.$suffix; // Menggabungkan semua komponen menjadi kode SK

        return $skCode;
    }

    public function generateKd()
    {
        $currentYear = date('Y');
        $lastSk = $this->orderBy('kd_sk', 'DESC')->first();

        if ($lastSk) {
            $lastSkYear = substr($lastSk['kd_sk'], 3, 4);

            if ($lastSkYear == $currentYear) {
                $lastSkNumber = substr($lastSk['kd_sk'], -2);
                $newSkNumber = $lastSkNumber + 1;
            } else {
                $newSkNumber = 1;
            }
        } else {
            $newSkNumber = 1;
        }

        $newSkId = 'SK-'.$currentYear.'-'.str_pad($newSkNumber, 2, '0', STR_PAD_LEFT);

        // Cek apakah ID SK sudah ada sebelumnya
        $existingSk = $this->where('kd_sk', $newSkId)->first();

        if ($existingSk) {
            // Jika ID SK sudah ada, tambahkan angka unik di belakangnya
            $suffix = 1;
            while ($existingSk) {
                $newSkId = $newSkId.'-'.$suffix;
                $existingSk = $this->where('kd_sk', $newSkId)->first();
                ++$suffix;
            }
        }

        return $newSkId;
    }

    public function getSkByKdDraft($kd_draft_sk)
    {
        return $this->where('kd_draft_sk', $kd_draft_sk)
            ->first(); // Mengembalikan satu baris data hasil query
    }

    public function informasiSK($kd_sk)
    {
        $query = $this->db->table('tabel_sk')
            ->select('*')
            ->join('tabel_draft_sk', 'tabel_sk.kd_draft_sk = tabel_draft_sk.kd_draft_sk')
            ->where('tabel_sk.kd_sk', $kd_sk)
            ->get();

        return $query->getResultArray();
    }

    public function getSK($kd_sk)
    {
        $query = $this->db->table('tabel_sk')
                          ->join('tabel_draft_sk', 'tabel_sk.kd_draft_sk = tabel_draft_sk.kd_draft_sk')
                          ->where('tabel_sk.kd_sk', $kd_sk)
                          ->get();

        return $query->getResultArray();
    }

    public function getTracking()
    {
        return $this->db->table('tabel_sk')
                        ->join('tabel_draft_sk', 'tabel_sk.kd_draft_sk = tabel_draft_sk.kd_draft_sk')
                        // ->where('tabel_draft_sk.status', 3)
                        ->get()
                        ->getResultArray();
    }

    public function searchByTanggal($startDate, $endDate)
    {
        return $this->db->table('tabel_sk')
                        ->join('tabel_draft_sk', 'tabel_sk.kd_draft_sk = tabel_draft_sk.kd_draft_sk')
                        ->where('tanggal >=', $startDate)
                        ->where('tanggal <=', $endDate)
                        ->get()
                        ->getResultArray();
    }

    public function tracking()
    {
        $query = 'SELECT * FROM tabel_draft_sk
                  INNER JOIN tabel_sk ON tabel_draft_sk.kd_draft_sk = tabel_sk.kd_draft_sk
                  INNER JOIN tabel_notulensi ON tabel_draft_sk.id_notulensi = tabel_notulensi.id_notulensi
                  INNER JOIN tabel_jadwal ON tabel_jadwal.id_jadwal = tabel_notulensi.id_jadwal
                  INNER JOIN tabel_sidang ON tabel_jadwal.id_sidang = tabel_sidang.id_sidang
                  INNER JOIN tabel_peserta ON tabel_peserta.id_jadwal = tabel_jadwal.id_jadwal';

        $result = $this->db->query($query);
        $data = $result->getResultArray();

        return $data;
    }
}
