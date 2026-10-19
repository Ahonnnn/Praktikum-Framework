<?php
namespace App\Controllers;

class Sapa extends BaseController
{
    public function index()
    {
        return view('sapa', [
            'judul' => "Hello, CodeIgniter 4!",
            'pesan' => "Saya belajar MVC pada minggu ketiga."
        ]);
    }

    public function nama(string $nama)
    {
        return view('sapa', [
            'judul' => 'Salam ' . $nama,
            'pesan' => 'Parameter nama dikirim melalui URL'
        ]);
    }
}

