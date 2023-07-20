<?php

namespace App\Models;

use CodeIgniter\Model;

class MemutuskanModel extends Model
{
    protected $table = 'tabel_diktum_memutuskan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kd_sk', 'nomor', 'isi'];

    public function getKdSk($kd_sk)
    {
        return $this->where('kd_sk', $kd_sk)
                    ->findAll();
    }
}
