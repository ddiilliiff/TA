<?php

namespace App\Controllers;

class Demo extends BaseController
{
    public function __construct()
    {
        helper(['url']);
    }

    public function index()
    {
        return view('demo');
    }

    public function ajax()
    {
    }
}
