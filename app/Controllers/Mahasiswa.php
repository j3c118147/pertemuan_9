<?php
namespace App\Controllers;

use CodeIgniter\Database\ConnectionInterface;

use App\Models\Agama_Model;
use App\Models\Hobi_Model;
use App\Models\Hobi_Mahasiswa_Model;
use App\Models\Mahasiswa_Model;

class Mahasiswa extends BaseController {

    public function __construct() {
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();

        $this->agamaModel = new Agama_Model();
        $this->hobiModel = new Hobi_Model();
        $this->hobimahasiswaModel = new Hobi_Mahasiswa_Model();
        $this->mahasiswaModel = new Mahasiswa_Model();
    }

    public function index() {
        $data['session'] = $this->session->getFlashdata('response');
        $data['dataMahasiswa'] = $this->mahasiswaModel->get($this->db)->getResult();

        echo view('header_v');
        echo view('mahasiswa_v', $data);
        echo view('footer_v');
    }

    public function add() {
        $data['dataAgama'] = $this->agamaModel->findAll();
        $data['dataHobi'] = $this->hobiModel->findAll();

        echo view('header_v');
        echo view('mahasiswa_form_v', $data);
        echo view('footer_v');
    }

    public function edit($id) {
        $data['dataAgama'] = $this->agamaModel->findAll();
        $data['dataHobi'] = $this->hobiModel->findAll();
        $data['dataMahasiswa'] = $this->mahasiswaModel->find($id);

        foreach ($this->hobimahasiswaModel->where('nim', $id)->findAll() as $row) :
            $data['dataHobiMahasiswa'][] = $row->kode_hobi;
        endforeach;
        
        echo view('header_v');
        echo view('mahasiswa_form_v', $data);
        echo view('footer_v');
    }

    public function save() {
        $this->db->transStart();
        
        $nim = $this->request->getPost('nim');

        $data = [
            'nim' => $nim,
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'kode_agama' => $this->request->getPost('kode_agama'),
            'alamat' => $this->request->getPost('alamat'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'foto' => 'blank.png'
        ];

        $id = $this->request->getPost('id');

        if (empty($id)) { //Insert
            $this->mahasiswaModel->insert($data);

            $data = [];

            $hobi = $this->request->getPost('hobi');

            for ($i = 0; $i < count($hobi); $i++) {
                $data = [
                    'kode_hobi' => $hobi[$i],
                    'nim' => $nim
                ];

                $this->hobimahasiswaModel->insert($data);
            }

            $this->db->transComplete();

            $response = $this->db->transStatus();

            if ($response === FALSE) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal disimpan.']);                
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil disimpan.']);
            }
        } else { // Update
            $where = ['nim' => $id];

            $this->mahasiswaModel->update($where, $data);

            $this->hobimahasiswaModel->where($where)->delete();

            $data = [];

            $hobi = $this->request->getPost('hobi');

            for ($i = 0; $i < count($hobi); $i++) {
                $data = [
                    'kode_hobi' => $hobi[$i],
                    'nim' => $nim
                ];

                $this->hobimahasiswaModel->insert($data);
            }

            $this->db->transComplete();

            $response = $this->db->transStatus();
            
            if ($response) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal disimpan.']);
            }
        }

        return redirect()->to(site_url('Mahasiswa'));
    }

    public function delete($id) {
        $response = $this->mahasiswaModel->delete($id);
        
        if ($response) {
            $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil dihapus.']);
        } else {
            $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal dihapus.']);
        }

        return redirect()->to(site_url('Mahasiswa'));
    }

}