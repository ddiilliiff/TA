<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tabel_user'; // Nama tabel di database
    protected $primaryKey = 'id_user'; // Nama kolom primary key
    protected $allowedFields = ['id_user', 'no_hp', 'password', 'role']; // Kolom yang bisa di input

    public function getData()
    {
        return $this->findAll();
    }

    public function generateID()
    {
        $lastUser = $this->orderBy('id_user', 'DESC')->first();
        $newID = 'U001';

        if ($lastUser) {
            $lastID = substr($lastUser['id_user'], 2);
            $newID = 'U'.str_pad((int) $lastID + 1, 3, '0', STR_PAD_LEFT);
        }

        return $newID;
    }

    public function generateAndHashPassword()
    {
        $password = bin2hex(random_bytes(8));
        $salt = bin2hex(random_bytes(16));
        $hashedPassword = hash('sha256', $password.$salt);

        return $hashedPassword;
        // return [
        //     'password' => $password,
        //     'hashed_password' => $hashedPassword,
        // ];
    }

    // public function generateID()
    // {
    //     $lastUser = $this->orderBy('id_user', 'DESC')->first();

    //     if ($lastUser) {
    //         $lastID = substr($lastUser['id_user'], 2);
    //         $newID = 'U'.str_pad((int) $lastID + 1, 3, '0', STR_PAD_LEFT);
    //     } else {
    //         $newID = 'A001';
    //     }

    //     return $newID;
    // }
}
