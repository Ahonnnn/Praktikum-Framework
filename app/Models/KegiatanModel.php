<?php
namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['judul', 'kategori', 'kuota'];
    protected $useTimestamps = false;

    public function semua(): array
    { 
        return $this->orderBy('id', 'ASC')->findAll(); 
    } 
  
    public function cari(int $id): ?array 
    { 
        return $this->find($id); 
    } 
  
    public function ringkasanKategori(): array 
    { 
        return $this->builder() 
            ->select('kategori') 
            ->selectCount('id', 'total') 
            ->groupBy('kategori') 
            ->orderBy('kategori', 'ASC') 
            ->get()->getResultArray(); 
    } 

    public function cariKeyword(string $keyword): array
    {
        return $this->builder()
                    ->like('judul', $keyword)
                    ->orLike('kategori', $keyword)
                    ->orderBy('id', 'ASC')
                    ->get()
                    ->getResultArray();
    }


    //     return [
    //         ['id'=> 1, 'judul'=> 'Workshop Web', 'kategori'=> 'Teknologi', 'kuota'=> 30, 'lokasi' => 'Aula Stmik Palangka Raya'],
    //         ['id'=> 2, 'judul'=> 'Pelatihan Desain', 'kategori'=> 'Kreatif', 'kuota'=> 25, 'lokasi' => 'Aula Stmik Palangka Raya'],
    //         ['id'=> 3, 'judul'=> 'Kelas Public Speaking', 'kategori'=> 'Komunikasi', 'kuota'=> 20, 'lokasi' => 'Aula Stmik Palangka Raya'],
    //         ['id'=> 4, 'judul'=> 'Kelas Coding Dengan AI', 'kategori'=> 'Teknologi', 'kuota'=> 100, 'lokasi' => 'Lab 2B Stmik Palangka Raya'],
    //         ['id'=> 5, 'judul'=> 'Kelas Coding Laravel 13', 'kategori'=> 'Teknologi', 'kuota'=> 200, 'lokasi' => 'Kantin Stmik Palangka Raya'],
    //         ['id'=> 6, 'judul'=> 'Kelas Terbuka Belajar Javascript Dasar', 'kategori'=> 'Teknologi', 'kuota'=> 120, 'lokasi' => 'Kantin Stmik Palangka Raya'],
    //         ['id'=> 7, 'judul'=> 'Pendalaman Forensik Jaringan Bersama Ahli', 'kategori'=> 'Teknologi', 'kuota'=> 100, 'lokasi' => 'Lab 1A Stmik Palangka Raya'],
    //         ['id'=> 8, 'judul'=> 'Kelas Game Dev', 'kategori'=> 'Teknologi', 'kuota'=> 100, 'lokasi' => 'Lab 2A Stmik Palangka Raya'],
    //         ['id'=> 9, 'judul'=> 'Kelas Python Dasar', 'kategori'=> 'Teknologi', 'kuota'=> 100, 'lokasi' => 'Lab 2B Stmik Palangka Raya'],
    //         ['id'=> 10, 'judul'=> 'Kelas React JS', 'kategori'=> 'Teknologi', 'kuota'=> 100, 'lokasi' => 'Lab 2A Stmik Palangka Raya'],
    //     ];
    // }

    // public function cari(int $id): ?array
    // {
    //     foreach ($this->semua() as $item){
    //         if ($item['id'] === $id) return $item;
    //     }
    //     return null;
    // }

}