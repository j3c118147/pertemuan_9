<?php namespace App\Models;

use CodeIgniter\Model;

class Hobi_Model extends Model {
    protected $table      = 'hobi';
    protected $primaryKey = 'kode_hobi';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['kode_hobi', 'hobi'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}