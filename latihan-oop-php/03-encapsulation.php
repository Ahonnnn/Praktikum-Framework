<?php 
class Produk
{
    public function __construct(
        private string $nama,
        private int $harga
    ){}

    public function getHarga():int
    {
        return $this->harga;
    }

    public function setHarga(int $harga): void
    {
        if ($harga < 0) {
            throw new InvalidArgumentException("Harga tidak boleh Negatif");
        }
        $this->harga = $harga;
    }

    public function info(): string
    {
        return "$this->nama - Rp$this->harga";
    }
}

$produk = new Produk('Monitor', 1250000);
$produk->setHarga(1150000);
echo $produk->info() . PHP_EOL;