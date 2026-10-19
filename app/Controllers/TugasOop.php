<?php

namespace App\Controllers;

use App\Libraries\PeralatanKomputer;

class TugasOop extends BaseController
{
    public function index(): string
    {
        $komputerLab = new PeralatanKomputer('PC Desktop Core i7', 'Perangkat Keras', 15);

        return view('tugas_oop_view', [
            'judul' => 'Tugas Mandiri Peralatan Laboratorium dengan menggunakan Controller',
            'infoPeralatan' => $komputerLab->ringkasan(),
        ]);

    }
}
