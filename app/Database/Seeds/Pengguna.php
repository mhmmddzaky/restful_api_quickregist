<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pengguna extends Seeder
{
    public function run()
    {
        $data = [
            [
            ],
        ];

        $this->db->table('tb_pengguna')->insertBatch($data);
    }
}
