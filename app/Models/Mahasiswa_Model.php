<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

use CodeIgniter\Model;

class Mahasiswa_Model extends Model {
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'nim';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nim', 'nama', 'jenis_kelamin', 'kode_agama', 'alamat', 'foto', 'tempat_lahir', 'tanggal_lahir'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get(ConnectionInterface &$db, $where = null) {
        $this->builder = $db->table($this->table);

        $this->builder->join('agama', 'agama.kode_agama = mahasiswa.kode_agama');

        if (!empty($where))
            return $this->builder->getWhere($where);
        else
            return $this->builder->get();
    }
}