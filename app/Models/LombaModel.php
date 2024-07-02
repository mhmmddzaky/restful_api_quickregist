<?php

namespace App\Models;

use CodeIgniter\Model;

class LombaModel extends Model
{
    protected $table            = 'tb_lomba';
    protected $primaryKey       = 'id_lomba';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Lomba';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_lomba',
        'kategori_lomba',
        'nama_penyelenggara',
        'email_penyelenggara',
        'tanggal_pelaksanaan',
        'jam_pelaksanaan',
        'no_rekening',
        'biaya_lomba',
        'status_lomba',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_lomba' => 'required',
        'kategori_lomba' => 'required',
        'nama_penyelenggara' => 'required',
        'email_penyelenggara' => 'required|valid_email',
        'tanggal_pelaksanaan' => 'required',
        'jam_pelaksanaan' => 'required',
        'no_rekening' => 'required',
        'biaya_lomba' => 'required',
    ];
    protected $validationMessages   = [
        'nama_lomba' => [
            'required' => 'Silahkan Masukkan Nama Lomba',
        ],
        'kategori_lomba' => [
            'required' => 'Silahkan Pilih Kategori Lomba',
        ],
        'nama_penyelenggara' => [
            'required' => 'Silahkan Masukkan Nama Anda',
        ],
        'email_penyelenggara' => [
            'required' => 'Silahkan Masukkan Email Anda',
            'valid_email' => 'Silahkan masukkan email yang valid',
        ],
        'tanggal_pelaksanaan' => [
            'required' => 'Silahkan Masukkan Tanggal Pelaksanaan',
        ],
        'jam_pelaksanaan' => [
            'required' => 'Silahkan Masukkan Jam Pelaksanaan',
        ],
        'no_rekening' => [
            'required' => 'Silahkan Masukkan No Rekening Anda',
        ],
        'biaya_lomba' => [
            'required' => 'Silahkan Masukkan Biaya Lomba',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
