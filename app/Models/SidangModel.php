<?php

namespace App\Models;

use CodeIgniter\Model;

class SidangModel extends Model
{
    protected $table = 'tabel_sidang'; // Nama tabel di database
    protected $primaryKey = 'id_sidang'; // Nama kolom primary key
    protected $allowedFields = ['id_sidang', 'nama']; // Kolom yang bisa di input

    public function getDataAll($id_jadwal)
    {
        $query = $this->db->query('SELECT * FROM tabel_sidang 
                                  INNER JOIN tabel_jadwal 
                                  ON tabel_jadwal.id_sidang = tabel_sidang.id_sidang 
                                  WHERE tabel_jadwal.id_jadwal = ?', [$id_jadwal]);

        return $query->getRowArray();
    }

    public function generateID()
    {
        $prefix = 'AS'; // Awalan ID
        $year = date('Y'); // Tahun saat ini
        $lastID = $this->getLastID(); // Mendapatkan ID terakhir
        $sequence = intval(substr($lastID, -2)) + 1; // Membaca dua digit terakhir dan menambahkan 1

        // Menghasilkan ID dengan format yang diinginkan
        $newID = $prefix.$year.sprintf('%02d', $sequence);

        return $newID;
    }

    private function getLastID()
    {
        // Mengambil ID terakhir dari database (sesuai dengan tabel dan kolom yang digunakan)
        $query = $this->db->query('SELECT id_sidang FROM tabel_sidang ORDER BY id_sidang DESC LIMIT 1');

        if ($query->getNumRows() > 0) {
            $row = $query->getRow();

            return $row->id_sidang;
        } else {
            // Jika tidak ada ID yang ditemukan, mengembalikan ID awal
            return 'AS'.date('Y').'00';
        }
    }
}
