<?php

namespace App\Controllers;

use App\Models\DewanModel;
use App\Models\DraftSKModel;
use App\Models\FraksiModel;
use App\Models\JabatanModel;
use App\Models\SKModel;

class Pimpinan extends BaseController
{
    public function __construct()
    {
        $this->fraksi = new FraksiModel();
        $this->jabatan = new JabatanModel();
        $this->dewan = new DewanModel();
        $this->sk = new SKModel();
        $this->draftsk = new DraftSKModel();
    }

    public function index()
    {
        $sk_pending = $this->sk->getSKpending();

        $data = [
            'title' => 'Dashboard',
            'sk_pending' => $sk_pending,
        ];

        echo view('pimpinan/index', $data);
    }

    public function acc()
    {
        $post = $this->request->getPost();
        $sk = $this->sk->getSK($post['kd_sk']);

        $data = [
            'status' => 3,
        ];

        $this->draftsk->update(['kd_draft_sk' => $sk[0]['kd_draft_sk']], $data);

        return redirect()->back()->with('success', 'di ACC!');
    }
}
