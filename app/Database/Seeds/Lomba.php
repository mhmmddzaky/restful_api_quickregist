<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Lomba extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lomba' => 'Short Movie',
                'kategori_lomba' => 'Multimedia',
                'nama_penyelenggara' => 'Rizky Adi',
                'email_penyelenggara' => 'rizkyad@gmail.com',
                'tanggal_pelaksanaan' => '2024-02-02',
                'jam_pelaksanaan' => '12:30:00',
                'no_rekening' => '123456',
                'biaya_lomba' => '100000',
                'status_lomba' => 'Diterima'
            ],
        ];

        $this->db->table('tb_lomba')->insertBatch($data);
    }
}
