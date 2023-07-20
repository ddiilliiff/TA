<?php

namespace App\Models;

use CodeIgniter\Model;

class PeraturanModel extends Model
{
    protected $table = 'tabel_peraturan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['aturan'];

    public function getData()
    {
        return $this->findAll();
    }

    public function getAutocompleteData($term)
    {
        $builder = $this->db->table('tabel_peraturan');
        $builder->like('aturan', $term);
        $query = $builder->get();
        $result = $query->getResultArray();

        return $result;
    }

    public function searchAutocomplete($term)
    {
        return $this->select('id, aturan')
            ->like('aturan', $term)
            ->findAll();
    }
}
