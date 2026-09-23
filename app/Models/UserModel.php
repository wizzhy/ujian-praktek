<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'name', 'role'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'username' => 'required|min_length[3]|max_length[100]|is_unique[users.username,id,{id}]',
        'password' => 'required|min_length[6]',
        'name'     => 'required|min_length[3]|max_length[150]',
    ];
    protected $validationMessages   = [
        'username' => [
            'required'   => 'Username wajib diisi.',
            'min_length' => 'Username minimal 3 karakter.',
            'is_unique'  => 'Username sudah digunakan.',
        ],
        'password' => [
            'required'   => 'Password wajib diisi.',
            'min_length' => 'Password minimal 6 karakter.',
        ],
        'name' => [
            'required' => 'Nama lengkap wajib diisi.',
        ],
    ];
}
