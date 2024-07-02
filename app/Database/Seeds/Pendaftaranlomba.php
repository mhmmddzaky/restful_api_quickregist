<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pendaftaranlomba extends Seeder
{
    public function run()
    {
        $data = [
            [
            ],
        ];

        $this->db->table('tb_pendaftaranlomba')->insertBatch($data);
    }
}
