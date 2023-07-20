<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table = 'tabel_jabatan'; // Nama tabel di database
    protected $primaryKey = 'kd_jabatan'; // Nama kolom primary key
    protected $allowedFields = ['kd_jabatan', 'jabatan']; // Kolom yang bisa di input

    public function getData()
    {
        return $this->findAll();
    }

    // public function getDataById($kd_jabatan)
    // {
    //     return $this->where('id_jadwal', $id_jadwal)->find();
    // }

    public function generateID()
    {
        $lastJabatan = $this->orderBy('kd_jabatan', 'DESC')->first();

        if ($lastJabatan) {
            $lastID = substr($lastJabatan['kd_jabatan'], 1);
            $newID = 'J'.str_pad((int) $lastID + 1, 2, '0', STR_PAD_LEFT);
        } else {
            $newID = 'J01';
        }

        return $newID;
    }

    public function getJabatanById($kd_jabatan)
    {
        return $this->find($kd_jabatan);
    }
}
