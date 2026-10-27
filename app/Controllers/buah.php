<?php

namespace App\Controllers;

class buah extends BaseController
{
    public function index(): string
    {
        return view('buah');
    }
}