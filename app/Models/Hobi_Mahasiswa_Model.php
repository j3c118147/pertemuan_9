<?php namespace App\Models;

use CodeIgniter\Model;

class Hobi_Mahasiswa_Model extends Model {
    protected $table      = 'hobi_mahasiswa';
    protected $primaryKey = 'kode_hobi_mahasiswa';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['kode_hobi_mahasiswa', 'kode_hobi', 'nim'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}