<?php

namespace App\Models;

use CodeIgniter\Model;

class KomisiModel extends Model
{
    protected $table = 'tabel_komisi'; // Nama tabel di database
    protected $primaryKey = 'kd_komisi'; // Nama kolom primary key
    protected $allowedFields = ['komisi'];

    public function getData()
    {
        return $this->findAll();
    }
}
