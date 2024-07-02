<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class PendaftaranLomba extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pendaftaran' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'id_lomba' => [
                'type' => 'INT',
            ],
            'nama_penyelenggara' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'email_penyelenggara' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'nama_lomba' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'kategori_lomba' => [
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
            'nama_peserta' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'email_peserta' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'bukti_pembayaran' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'status_pendaftaran' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_pendaftaran', true);
        $this->forge->createTable('tb_pendaftaranlomba');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pendaftaranlomba');
    }
}