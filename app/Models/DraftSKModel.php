<?php

namespace App\Models;

use CodeIgniter\Model;

class DraftSKModel extends Model
{
    protected $table = 'tabel_draft_sk'; // Nama tabel di database
    protected $primaryKey = 'kd_draft_sk'; // Nama kolom primary key
    protected $allowedFields = ['kd_draft_sk', 'id_notulensi', 'judul', 'nomor', 'tahun', 'tanggal', 'status']; // Kolom yang bisa di input

    public function getData()
    {
        return $this->findAll();
    }

    public function generateKd()
    {
        $currentYear = date('Y');
        $lastSk = $this->orderBy('kd_draft_sk', 'DESC')->first();

        if ($lastSk) {
            $lastSkYear = substr($lastSk['kd_draft_sk'], 4, 4);

            if ($lastSkYear == $currentYear) {
                $lastSkNumber = substr($lastSk['kd_draft_sk'], -2);
                $newSkNumber = $lastSkNumber + 1;
            } else {
                $newSkNumber = 1;
            }
        } else {
            $newSkNumber = 1;
        }

        $newSkId = 'DSK-'.$currentYear.'-'.str_pad($newSkNumber, 2, '0', STR_PAD_LEFT);

        return $newSkId;
    }

    public function getDraftSkByNotulensi($id_notulensi)
    {
        return $this->where('id_notulensi', $id_notulensi)
            ->first(); // Mengembalikan satu baris data hasil query
    }

    public function getDataByKdDraftSk($kd_draft_sk)
    {
        return $this->where('kd_draft_sk', $kd_draft_sk)
            ->first(); // Mengembalikan satu baris data hasil query
    }

    public function getLastDraftNumber()
    {
        $query = $this->select('kd_draft_sk')
            ->orderBy('kd_draft_sk', 'DESC')
            ->limit(1)
            ->get();

        if ($query->getNumRows() > 0) {
            $lastId = $query->getRow()->kd_draft_sk;
            $lastNumber = explode('-', $lastId)[2];

            return (int) $lastNumber;
        }

        // Jika tidak ada data dalam database, kembalikan angka awal
        return 0;
    }

    public function getNextAvailableDraftNumber()
    {
        $usedNumbers = $this->getUsedDraftNumbers();
        $lastNumber = $this->getLastDraftNumber();

        for ($i = 1; $i <= 99; ++$i) {
            $nextNumber = sprintf($lastNumber + $i);
            if (!in_array($nextNumber, $usedNumbers)) {
                return $nextNumber;
            }
        }

        // Jika semua angka telah digunakan, kembalikan null atau lakukan penanganan yang sesuai
        return null;
    }

    public function getUsedDraftNumbers()
    {
        $query = $this->select('kd_draft_sk')
            ->get();

        $usedNumbers = [];
        foreach ($query->getResult() as $row) {
            $number = explode('-', $row->kd_draft_sk)[2];
            $usedNumbers[] = $number;
        }

        return $usedNumbers;
    }

    public function finalSK()
    {
        $query = $this->db->table('tabel_sk')
                          ->join('tabel_draft_sk', 'tabel_sk.kd_draft_sk = tabel_draft_sk.kd_draft_sk')
                          ->where('tabel_draft_sk.status', 3)
                          ->get();

        return $query->getResultArray();
    }
}
