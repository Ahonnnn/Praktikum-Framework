<?php
interface DapatDiskon
{
    public function hitungHargaAkhir(): int;
}

class BarangPromo implements DapatDiskon
{
    public function __construct(
        private int $harga,
        private int $diskon
    ){}

    #[Override]
    public function hitungHargaAkhir(): int
    {
        return $this->harga - $this->diskon;
    }
}

$promo = new BarangPromo(100000, 25000);
echo 'Harga akhir: Rp' . $promo->hitungHargaAkhir(). PHP_EOL;