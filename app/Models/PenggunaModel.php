<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table            = 'tb_pengguna';
    protected $primaryKey       = 'id_pengguna';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Pengguna';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username',
        'password',
        'nama',
        'email',
        'no_telpon',
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
        'username' => 'required|min_length[4]|is_unique[tb_pengguna.username]',
        'password' => 'required',
        'nama' => 'required',
        'email' => 'required|valid_email',
        'no_telpon' => 'required',
    ];
    protected $validationMessages   = [
        'username' => [
            'required' => 'Silahkan Masukkan Username Anda',
            'min_length' => 'Nama minimal 4 karakter',
            'is_unique' => 'Username sudah terdaftar, silahkan masukkan nama lain',
        ],
        'password' => [
            'required' => 'Silahkan Masukkan Password Anda',
        ],
        'nama' => [
            'required' => 'Silahkan Masukkan Nama Anda',
        ],
        'email' => [
            'required' => 'Silahkan Masukkan Email',
            'valid_email' => 'Silahkan masukkan email yang valid',
        ],
        'no_telpon' => [
            'required' => 'Silahkan Masukkan No Telepon Anda',
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
