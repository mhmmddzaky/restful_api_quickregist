<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Pengguna extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengguna' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'no_telpon' => [
                'type' => 'varchar',
                'constraint' => 20,
            ],
        ]);
        $this->forge->addKey('id_pengguna', true);
        $this->forge->createTable('tb_pengguna');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pengguna');
    }
}