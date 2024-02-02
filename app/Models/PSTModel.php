<?php

namespace App\Models;

use CodeIgniter\Model;

class PSTModel extends Model
{
    protected $table            = 'pst';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id', 'tanggal', 'tahun', 'nama', 'jenis_kelamin', 'email',
        'tahun_lahir', 'umur', 'alamat', 'pendidikan',
        'pekerjaan', 'instansi', 'pemanfaatan_data',
        'layanan', 'data', 'saran', 'kepuasan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'tanggal'        => 'required',
        'nama'           => 'required',
        'jenis_kelamin'  => 'required',
        'tahun_lahir'    => 'required',
        'umur'           => 'required',
        'alamat'         => 'required',
        'pendidikan'     => 'required',
        'pekerjaan'      => 'required',
        'instansi'       => 'required',
        'pemanfaatan_data' => 'required',
        'layanan'        => 'required',
        'data'           => 'required',
        'kepuasan'       => 'required',
    ];
    protected $validationMessages   = [];
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
