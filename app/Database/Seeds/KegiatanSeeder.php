<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
         ['judul' => 'Workshop Web', 
             'kategori' => 'Teknologi', 'kuota' => 30], 
            ['judul' => 'Pelatihan Desain', 
             'kategori' => 'Kreatif', 'kuota' => 25], 
            ['judul' => 'Kelas Presentasi', 
            'kategori' => 'Komunikasi', 'kuota' => 20], 
            ['judul' => 'Ekspo Teknologi', 
             'kategori' => 'Teknologi', 'kuota' => 40], 
        ]; 
  
        $this->db->table('kegiatan')->insertBatch($data); 
    }
}
