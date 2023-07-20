<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'tabel_jadwal'; // Nama tabel di database
    protected $primaryKey = 'id_jadwal'; // Nama kolom primary key
    protected $allowedFields = ['id_jadwal', 'id_sidang', 'tanggal', 'waktu', 'tempat', 'keterangan', 'status']; // Kolom yang bisa di input

    public function getData()
    {
        return $this->findAll();
    }

    public function getDataById($id_jadwal)
    {
        return $this->where('id_jadwal', $id_jadwal)->findAll();
    }

    public function getDataByAgenda($id_sidang)
    {
        $query = 'SELECT * FROM tabel_sidang 
                  INNER JOIN tabel_jadwal ON tabel_sidang.id_sidang = tabel_jadwal.id_sidang 
                  WHERE tabel_sidang.id_sidang = ?';

        return $this->db->query($query, [$id_sidang])->getResultArray();
    }

    public function generateID()
    {
        $prefix = 'JS'; // Awalan untuk jadwal sidang
        $tahun = date('y'); // Tahun saat ini (hanya 2 digit terakhir)
        $bulan = date('m'); // Bulan saat ini (format 2 digit)
        $tanggal = date('d'); // Tanggal saat ini (format 2 digit)
        $urutan = $this->getMaxUrutan() + 1; // Mendapatkan urutan terakhir dan ditambah 1

        // Menggabungkan semua komponen menjadi ID
        $id = $prefix.$tahun.$bulan.$tanggal.str_pad($urutan, 2, '0', STR_PAD_LEFT);

        return $id;
    }

    public function getMaxUrutan()
    {
        // Mendapatkan urutan terakhir dari database
        $result = $this->db->query('SELECT MAX(RIGHT(id_jadwal, 2)) as max_urutan FROM tabel_jadwal')->getRow();

        return $result->max_urutan ? (int) $result->max_urutan : 0;
    }

    public function getAgenda($id_jadwal)
    {
        // Ambil data agenda berdasarkan id_jadwal
        return $this->select('agenda')
            ->where('id_jadwal', $id_jadwal)
            ->first();
    }

    public function getTanggal($id_jadwal)
    {
        // Ambil data agenda berdasarkan id_jadwal
        return $this->select('tanggal')
            ->where('id_jadwal', $id_jadwal)
            ->first();
    }

    public function getTempat($id_jadwal)
    {
        // Ambil data agenda berdasarkan id_jadwal
        return $this->select('tempat')
            ->where('id_jadwal', $id_jadwal)
            ->first();
    }

    public function jumlahSidang()
    {
        $query = $this->where('status', 3)->get();

        return $query->getResultArray();
    }

    public function getIdSidang($jadwalFinal)
    {
        $query = $this->db->query('SELECT id_sidang FROM tabel_jadwal WHERE tabel_jadwal.id_jadwal = ?', [$jadwalFinal]);

        return $query->getRowArray();
    }

    public function findBySidang($sidang)
    {
        $query = $this->db->query('SELECT * FROM tabel_jadwal WHERE tabel_jadwal.id_sidang = ?', [$sidang]);

        return $query->getResultArray();
    }

    // Di dalam Controller atau Model CodeIgniter 4

    public function displayJadwalPeserta()
    {
        // Menggunakan metode join() untuk menggabungkan tabel jadwal dan peserta
        $query = $this->db->table('tabel_jadwal')
                        ->select('tabel_jadwal.*, tabel_peserta.nama')
                        ->join('tabel_peserta', 'tabel_peserta.id_jadwal = tabel_jadwal.id_jadwal', 'left')
                        ->get();

        return $query->getResultArray();
    }
}
