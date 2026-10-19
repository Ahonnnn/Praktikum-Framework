<?php 

class Produk
{
    public string $nama = "Buku PHP";
    public int $harga = 75000;

    public function info(): string
    {
        return $this->nama . ' - Rp' . $this->harga;
    }
}

$produk1 = new Produk();
echo $produk1->info() . PHP_EOL;