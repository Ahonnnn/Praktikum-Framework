<?php

class Produk

{
    public function __construct(
        public string $nama,
        public int $harga
    ){}

    public function info(): string
    {
        return "$this->nama - Rp$this->harga";
    }
}

$produk1 = new Produk("Mouse Wireless", 120000);
$produk2 = new Produk("Keyboard", 175000);
echo $produk1->info() . PHP_EOL;
echo $produk2->info() . PHP_EOL;