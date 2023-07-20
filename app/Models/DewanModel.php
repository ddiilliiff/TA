<?php

namespace App\Models;

use CodeIgniter\Model;

class DewanModel extends Model
{
    protected $table = 'tabel_dewan'; // Nama tabel di database
    protected $primaryKey = 'id_dewan'; // Nama kolom primary key
    protected $allowedFields = [
        'id_dewan',
        'kd_fraksi',
        'kd_jabatan',
        'id_periode',
        'kd_komisi',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
         'no_hp']; // Kolom yang bisa di input

    public function getDataFull()
    {
        return $this->db->table('tabel_dewan')
            ->select('tabel_dewan.*, tabel_fraksi.*, tabel_jabatan.*', 'left')
            ->join('tabel_fraksi', 'tabel_fraksi.kd_fraksi = tabel_dewan.kd_fraksi', 'left')
            ->join('tabel_jabatan', 'tabel_jabatan.kd_jabatan = tabel_dewan.kd_jabatan', 'left')
            ->get()
            ->getResultArray();
    }

    public function getAllData()
    {
        return $this->findAll();
    }

    public function generateID()
    {
        $lastFraksi = $this->orderBy('id_dewan', 'DESC')->first();

        if ($lastFraksi) {
            $lastID = substr($lastFraksi['id_dewan'], 2);
            $newID = 'AD'.str_pad((int) $lastID + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newID = 'AD001';
        }

        return $newID;
    }

    public function getAnggotaByFraksi($kd_fraksi)
    {
        // $query = 'SELECT * FROM tabel_dewan
        //           INNER JOIN tabel_fraksi ON tabel_dewan.kd_fraksi = tabel_fraksi.kd_fraksi
        //           WHERE tabel_dewan.kd_fraksi = ?';

        $query = 'SELECT * FROM tabel_dewan
                INNER JOIN tabel_fraksi ON tabel_dewan.kd_fraksi = tabel_fraksi.kd_fraksi
                INNER JOIN tabel_jabatan ON tabel_dewan.kd_jabatan = tabel_jabatan.kd_jabatan
                WHERE tabel_dewan.kd_fraksi = ?';

        return $this->db->query($query, [$kd_fraksi])->getResultArray();
    }
}
