<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table = 'tabel_periode'; // Nama tabel di database
    protected $primaryKey = 'id_periode'; // Nama kolom primary key
    protected $allowedFields = ['periode'];

    public function getData()
    {
        return $this->findAll();
    }
}
