<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Lomba extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lomba' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'nama_lomba' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'kategori_lomba' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'nama_penyelenggara' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'email_penyelenggara' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'tanggal_pelaksanaan' => [
                'type' => 'date',
                'null' => false,
            ],
            'jam_pelaksanaan' => [
                'type' => 'time',
                'null' => false,
            ],
            'no_rekening' => [
                'type' => 'INT',
            ],
            'biaya_lomba' => [
                'type' => 'INT',
            ],
            'status_lomba' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_lomba', true);
        $this->forge->createTable('tb_lomba');
    }

    public function down()
    {
        $this->forge->dropTable('tb_lomba');
    }
}