<?php

namespace App\Libraries;

class Peralatan
{
    public function __construct(
        private string $nama,
        private string $kategori,
        private int $stok,
    ){}

    public function ringkasan(): string
    {
        return $this->nama . ' | ' . $this->kategori . ' | ' . $this->stok;
    }
}