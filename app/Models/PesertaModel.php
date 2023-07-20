<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'tabel_peserta'; // Nama tabel di database
    protected $primaryKey = 'id_peserta'; // Nama kolom primary key
    protected $allowedFields = ['id_peserta', 'id_dewan_or_guest', 'id_jadwal', 'nama', 'email', 'no_hp', 'presensi']; // Kolom yang bisa di input

    public function getData()
    {
        return $this->findAll();
    }

    public function getDataById($id_jadwal)
    {
        return $this->where('id_jadwal', $id_jadwal)->findAll();
    }

    public function isDuplicatePeserta($id_dewan_or_guest, $id_jadwal)
    {
        $count = $this->where('id_dewan_or_guest', $id_dewan_or_guest)
            ->where('id_jadwal', $id_jadwal)
            ->countAllResults();

        return $count > 0;
    }

    public function getPesertaByJadwal($id_jadwal)
    {
        return $this->where('id_jadwal', $id_jadwal)->findAll();
    }

    public function getPesertaByIdJadwal($id_jadwal)
    {
        $query = $this->db->table('tabel_jadwal')
            ->join('tabel_peserta', 'tabel_jadwal.id_jadwal = tabel_peserta.id_jadwal')
            ->where('tabel_jadwal.id_jadwal', $id_jadwal)
            ->where('tabel_peserta.id_jadwal', $id_jadwal)
            ->get();

        return $query->getResultArray();
    }

    public function generateID()
    {
        $lastPeserta = $this->orderBy('id_peserta', 'DESC')->first();

        if ($lastPeserta) {
            $lastID = substr($lastPeserta['id_peserta'], 2);
            $newID = 'PS'.str_pad((int) $lastID + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newID = 'PS001';
        }

        return $newID;
    }

    public function getNomorHandphone($id_jadwal)
    {
        // Ambil data nomor handphone peserta sesuai dengan id_jadwal
        return $this->select('no_hp')
            ->where('id_jadwal', $id_jadwal)
            ->findAll();
    }

    public function getNamaPeserta($id_jadwal)
    {
        $builder = $this->db->table($this->table);
        $builder->select('nama');
        $builder->where('id_jadwal', $id_jadwal);
        $results = $builder->get()->getResultArray();

        $namaPeserta = [];
        foreach ($results as $row) {
            $namaPeserta[] = $row['nama'];
        }

        return $namaPeserta;
    }

    public function trackPeserta($id_jadwal)
    {
        $query = $this->db->table('tabel_peserta')
        ->where('id_jadwal', $id_jadwal)
        ->get();

        return $query->getResultArray();
    }
}
