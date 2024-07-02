<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriLomba extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori_lomba' => 'Programming',
            ],
            [
                'kategori_lomba' => 'Multimedia',
            ],
            [
                'kategori_lomba' => 'Internet of Things',
            ],
        ];

        $this->db->table('tb_kategorilomba')->insertBatch($data);
    }
}
