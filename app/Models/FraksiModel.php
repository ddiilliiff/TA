<?php

namespace App\Models;

use CodeIgniter\Model;

class FraksiModel extends Model
{
    protected $table = 'tabel_fraksi'; // Nama tabel di database
    protected $primaryKey = 'kd_fraksi'; // Nama kolom primary key
    protected $allowedFields = ['kd_fraksi', 'fraksi', 'akronim'];

    public function getData()
    {
        return $this->findAll();
    }

    public function getDataDesc()
    {
        return $this->db->query('SELECT * FROM tabel_fraksi ORDER BY kd_fraksi DESC')->getResultArray();
    }

    public function getFraksiById($kd_fraksi)
    {
        return $this->find($kd_fraksi);
    }

    public function getMemberById($kd_fraksi)
    {
        return $this->query("SELECT * FROM tabel_dewan WHERE kd_fraksi={$kd_fraksi}");
    }

    public function generateID()
    {
        $lastFraksi = $this->orderBy('kd_fraksi', 'DESC')->first();

        if ($lastFraksi) {
            $lastID = substr($lastFraksi['kd_fraksi'], 1);
            $newID = 'F'.str_pad((int) $lastID + 1, 2, '0', STR_PAD_LEFT);
        } else {
            $newID = 'F01';
        }

        return $newID;
    }

    public function updateFraksi($kd_fraksi, $data)
    {
        return $this->where(['kd_fraksi' => $kd_fraksi])->update($data);
    }
}
