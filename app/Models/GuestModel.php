<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{
    protected $table = 'tabel_guest'; // Nama tabel di database
    protected $primaryKey = 'id_guest'; // Nama kolom primary key
    protected $allowedFields = ['id_guest', 'kd_opd', 'nama_guest', 'no_hp']; // Kolom yang bisa di input

    public function getData()
    {
        return $this->findAll();
    }

    public function getDataFull()
    {
        $query = $this->db->table('tabel_opd')
            ->join('tabel_guest', 'tabel_opd.kd_opd = tabel_guest.kd_opd')
            ->get()
            ->getResultArray();

        return $query;
    }

    public function getGuestByOPD($kd_opd)
    {
        $query = 'SELECT * FROM tabel_guest
                INNER JOIN tabel_opd ON tabel_guest.kd_opd = tabel_opd.kd_opd
                WHERE tabel_guest.kd_opd = ?';

        return $this->db->query($query, [$kd_opd])->getResultArray();
    }

    public function generateID()
    {
        $lastGuest = $this->orderBy('id_guest', 'DESC')->first();

        if ($lastGuest) {
            $lastID = substr($lastGuest['id_guest'], 1);
            $newID = 'G'.str_pad((int) $lastID + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newID = 'G001';
        }

        return $newID;
    }
}
