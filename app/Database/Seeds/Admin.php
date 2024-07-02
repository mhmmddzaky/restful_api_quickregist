<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'AD01',
                'password' => '12345',
            ],
        ];

        $this->db->table('tb_admin')->insertBatch($data);
    }
}
