<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranLombaModel extends Model
{
    protected $table            = 'tb_pendaftaranlomba';
    protected $primaryKey       = 'id_pendaftaran';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\PendaftaranLomba';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_lomba',
        'nama_penyelenggara',
        'email_penyelenggara',
        'nama_lomba',
        'kategori_lomba',
        'tanggal_pelaksanaan',
        'jam_pelaksanaan',
        'no_rekening',
        'biaya_lomba',
        'status_lomba',
        'nama_peserta',
        'email_peserta',
        'bukti_pembayaran',
        'status_pendaftaran',
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
        'nama_penyelenggara' => 'required',
        'email_penyelenggara' => 'required|valid_email',
        'nama_lomba' => 'required',
        'kategori_lomba' => 'required',
        'tanggal_pelaksanaan' => 'required',
        'jam_pelaksanaan' => 'required',
        'no_rekening' => 'required',
        'biaya_lomba' => 'required',
        'nama_peserta' => 'required',
        'email_peserta' => 'required|valid_email',
        'bukti_pembayaran' => 'required',
    ];
    protected $validationMessages   = [
        'nama_penyelenggara' => [
            'required' => 'Silahkan Masukkan Nama Anda',
        ],
        'email_penyelenggara' => [
            'required' => 'Silahkan Masukkan Email Anda',
            'valid_email' => 'Silahkan masukkan email yang valid',
        ],
        'nama_lomba' => [
            'required' => 'Silahkan Masukkan Lomba',
        ],
        'kategori_lomba' => [
            'required' => 'Silahkan Masukkan Kategori Lomba',
        ],
        'tanggal_pelaksanaan' => [
            'required' => 'Silahkan Masukkan Tanggal Pelaksanaan',
        ],
        'jam_pelaksanaan' => [
            'required' => 'Silahkan Masukkan Jam Pelaksanaan',
        ],
        'no_rekening' => [
            'required' => 'Silahkan Masukkan Nomor Rekening Anda',
        ],
        'biaya_lomba' => [
            'required' => 'Silahkan Masukkan Biaya Lomba',
        ],
        'nama_peserta' => [
            'required' => 'Silahkan Masukkan Nama Anda',
        ],
        'email_peserta' => [
            'required' => 'Silahkan Masukkan Email',
            'valid_email' => 'Silahkan masukkan email yang valid',
        ],
        'bukti_pembayaran' => [
            'required' => 'Silahkan Masukkan Link Pembayaran'
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
