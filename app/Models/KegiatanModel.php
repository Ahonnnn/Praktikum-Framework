<?php
namespace App\Models;

class KegiatanModel
{
    public function semua(): array
    {
        return [
            ['id'=> 1, 'judul'=> 'Workshop Web', 'kategori'=> 'Teknologi', 'kuota'=> 30, 'lokasi' => 'Aula Stmik Palangka Raya'],
            ['id'=> 2, 'judul'=> 'Pelatihan Desain', 'kategori'=> 'Kreatif', 'kuota'=> 25, 'lokasi' => 'Aula Stmik Palangka Raya'],
            ['id'=> 3, 'judul'=> 'Kelas Public Speaking', 'kategori'=> 'Komunikasi', 'kuota'=> 20, 'lokasi' => 'Aula Stmik Palangka Raya'],
            ['id'=> 4, 'judul'=> 'Kelas Coding Dengan AI', 'kategori'=> 'Teknologi', 'kuota'=> 100, 'lokasi' => 'Lab 2B Stmik Palangka Raya'],
            ['id'=> 5, 'judul'=> 'Kelas Coding Laravel 13', 'kategori'=> 'Teknologi', 'kuota'=> 200, 'lokasi' => 'Kantin Stmik Palangka Raya'],
            ['id'=> 6, 'judul'=> 'Kelas Terbuka Belajar Javascript Dasar', 'kategori'=> 'Teknologi', 'kuota'=> 120, 'lokasi' => 'Kantin Stmik Palangka Raya'],
            ['id'=> 7, 'judul'=> 'Pendalaman Forensik Jaringan Bersama Ahli', 'kategori'=> 'Teknologi', 'kuota'=> 100, 'lokasi' => 'Lab 1A Stmik Palangka Raya'],
            ['id'=> 8, 'judul'=> 'Kelas Game Dev', 'kategori'=> 'Teknologi', 'kuota'=> 100, 'lokasi' => 'Lab 2A Stmik Palangka Raya'],
            ['id'=> 9, 'judul'=> 'Kelas Python Dasar', 'kategori'=> 'Teknologi', 'kuota'=> 100, 'lokasi' => 'Lab 2B Stmik Palangka Raya'],
            ['id'=> 10, 'judul'=> 'Kelas React JS', 'kategori'=> 'Teknologi', 'kuota'=> 100, 'lokasi' => 'Lab 2A Stmik Palangka Raya'],
        ];
    }

    public function cari(int $id): ?array
    {
        foreach ($this->semua() as $item){
            if ($item['id'] === $id) return $item;
        }
        return null;
    }

}