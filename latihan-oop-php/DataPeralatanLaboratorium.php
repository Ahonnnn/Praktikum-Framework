<?php

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

class PeralatanKomputer extends Peralatan
{
    #[Override]
    public function ringkasan(): string
    {
        return "[Komputer] " . parent::ringkasan();
    }
}

$komputerLab = new PeralatanKomputer('PC Desktop Core i7', 'Perangkat Keras', 15);

echo $komputerLab->ringkasan() . PHP_EOL;