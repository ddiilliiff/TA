<?php

namespace App\Models;

use CodeIgniter\Model;

class NotulensiModel extends Model
{
    protected $table = 'tabel_notulensi'; // Nama tabel di database
    protected $primaryKey = 'id_notulensi'; // Nama kolom primary key
    protected $allowedFields = ['id_notulensi', 'id_jadwal', 'judul', 'hasil_sidang', 'status']; // Kolom yang bisa di input

    public function getData()
    {
        return $this->findAll();
    }

    public function getNotulensiByIdJadwal($id_jadwal)
    {
        $builder = $this->db->table('tabel_jadwal');
        $builder->select('*');
        $builder->join('tabel_notulensi', 'tabel_notulensi.id_jadwal = tabel_jadwal.id_jadwal');
        $builder->where('tabel_jadwal.id_jadwal', $id_jadwal);

        return $builder->get()->getResultArray();
    }

    public function getDataByIdJadwal($id_jadwal)
    {
        $query = 'SELECT * FROM tabel_jadwal 
              INNER JOIN tabel_notulensi 
              ON tabel_jadwal.id_jadwal = tabel_notulensi.id_jadwal 
              WHERE tabel_jadwal.id_jadwal = ?';

        return $this->db->query($query, [$id_jadwal])->getResultArray();
    }

    // public function getDataByIdJadwal($id_jadwal)
    // {
    //     return $this->db->query("SELECT * FROM tabel_jadwal, tabel_notulensi WHERE tabel_jadwal.id_jadwal = {$id_jadwal} AND tabel_notulensi.id_jadwal = {$id_jadwal}")->get()->getResultArray();
    // }

    public function generateID()
    {
        $lastNotulen = $this->orderBy('id_notulensi', 'DESC')->first();

        if ($lastNotulen) {
            $lastID = substr($lastNotulen['id_notulensi'], 2);
            $newID = 'N'.str_pad((int) $lastID + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newID = 'N001';
        }

        return $newID;
    }

    public function getNotulensiIsEnded()
    {
        return $this->db->query("SELECT * FROM tabel_notulensi WHERE status='3'")->getResultArray();
    }

    public function getIdJadwal($id_notulensi)
    {
        $query = $this->db->query('SELECT id_jadwal FROM tabel_notulensi WHERE tabel_notulensi.id_notulensi = ?', [$id_notulensi]);

        return $query->getRowArray();
    }

    public function trackNotulen($id_jadwal)
    {
        $query = $this->db->table('tabel_notulensi')
                         ->where('id_jadwal', $id_jadwal)
                         ->get();

        return $query->getRowArray();
    }
}
