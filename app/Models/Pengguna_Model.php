<?php namespace App\Models;

use CodeIgniter\Model;

class Pengguna_Model extends Model{

    protected $table      = 'pengguna';
    protected $primaryKey = 'username';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'password'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
}