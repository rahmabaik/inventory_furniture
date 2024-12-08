<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Anda dapat menambahkan logika untuk mengambil data yang diperlukan untuk dashboard
        return view('dashboard/index');
    }
}
