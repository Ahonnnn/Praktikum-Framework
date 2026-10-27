<?php

// Induk
class Produk 
{
    public function __construct(protected string $nama){}

    public function label(): string
    {
        return 'Produk: '. $this->nama;
    }
}

// Anak dari Produk
class ProdukDigital extends Produk
{
    #[Override]
    public function label(): string
    {
        return 'Produk digital: ' . $this->nama;
    }
}

// Anak dari Produk 
class ProdukFisik extends Produk
{
    #[Override]
    public function label(): string
    {
        return 'Produk Fisik: ' . $this->nama;
    }
}

$barang = new Produk('Buku Cetak');
$digital = new ProdukDigital('E-Book OOP');
$fisik = new ProdukFisik('Meja Belajar');
echo $barang->label() . PHP_EOL;
echo $digital->label() . PHP_EOL;
echo $fisik->label() . PHP_EOL;