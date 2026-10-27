<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKegiatanTable extends Migration
{
    public function up()
    {
         $this->forge->addField([ 
            'id' => [ 
                'type' => 'INT', 'constraint' => 11, 
                'unsigned' => true, 'auto_increment' => true, 
            ], 
            'judul' => [ 
                'type' => 'VARCHAR', 'constraint' => 150, 
            ], 
            'kategori' => [ 
                'type' => 'VARCHAR', 'constraint' => 80, 
            ], 
            'kuota' => [ 
                'type' => 'INT', 'constraint' => 11, 
                'unsigned' => true, 'default' => 0, 
            ], 
        ]); 
  
        $this->forge->addKey('id', true); 
        $this->forge->createTable('kegiatan', true); 
    }

    public function down()
    {
        $this->forge->dropTable('Kegiatan', true);
    }
}
