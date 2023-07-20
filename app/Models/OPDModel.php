<?php

namespace App\Models;

use CodeIgniter\Model;

class OPDModel extends Model
{
    protected $table = 'tabel_opd'; // Nama tabel di database
    protected $primaryKey = 'kd_opd'; // Nama kolom primary key
    protected $allowedFields = ['kd_opd', 'opd', 'akronim'];

    public function getData()
    {
        return $this->findAll();
    }

    public function namaOPD($kd_opd)
    {
        return $this->db->table('tabel_opd')
            ->select('opd')
            ->where('kd_opd', $kd_opd)
            ->get()
            ->getRowArray();
    }

    public function generateID()
    {
        $lastOPD = $this->orderBy('kd_opd', 'DESC')->first();

        if ($lastOPD) {
            $lastID = substr($lastOPD['kd_opd'], 3);
            $newID = 'OPD'.sprintf('%02d', (int) $lastID + 1);
        } else {
            $newID = 'OPD01';
        }

        return $newID;
    }
}
