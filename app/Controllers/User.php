<?php

namespace App\Controllers;

use App\Models\DewanModel;
use App\Models\DraftSKModel;
use App\Models\SKModel;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->dewan = new DewanModel();
        $this->draftsk = new DraftSKModel();
        $this->sk = new SKModel();
    }

     public function index()
     {
         $sk = $this->draftsk->finalSK();
         //  dd($sk);
         $data = [
             'title' => 'Dewan',
             'sk' => $sk,
         ];

         return view('dewan/index', $data);
     }
}