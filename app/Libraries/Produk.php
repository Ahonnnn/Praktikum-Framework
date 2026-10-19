<?php
namespace App\Libraries;

class Produk
{
    public function __construct(
        private string $nama,
        private int $harga
    ){}

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getHarga() : int
    {
        return $this->harga;
    }

    public function getInfo() : string
    {
        return $this->nama . ' - Rp' . number_format($this->harga, 0, ',', '.');
    }
}