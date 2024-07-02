<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriLomba extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'kategori_lomba' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_kategori', true);
        $this->forge->createTable('tb_kategorilomba');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kategorilomba');
    }
}
