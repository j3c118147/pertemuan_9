<?php
namespace App\Controllers;

use App\Models\Hobi_Model;

class Hobi extends BaseController {

    public function __construct() {
        $this->session = \Config\Services::session();

        $this->hobiModel = new Hobi_Model();
    }

    public function index() {
        $data['session'] = $this->session->getFlashdata('response');
        $data['dataHobi'] = $this->hobiModel->findAll();

        echo view('header_v');
        echo view('hobi_v', $data);
        echo view('footer_v');
    }

    public function add() {
        echo view('header_v');
        echo view('hobi_form_v');
        echo view('footer_v');
    }

    public function edit($id) {
        $data['dataHobi'] = $this->hobiModel->find($id);
        
        echo view('header_v');
        echo view('hobi_form_v', $data);
        echo view('footer_v');
    }

    public function save() {
        $data = [
            'kode_hobi' => $this->request->getPost('kode'),
            'hobi' => $this->request->getPost('hobi')
        ];

        $id = $this->request->getPost('id');

        if (empty($id)) { //Insert
            $response = $this->hobiModel->insert($data);

            if ($response) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal disimpan.']);
            }
        } else { // Update
            $where = ['kode_hobi' => $id];

            $response = $this->hobiModel->update($where, $data);
            
            if ($response) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal disimpan.']);
            }
        }

        return redirect()->to(site_url('Hobi'));
    }

    public function delete($id) {
        $response = $this->hobiModel->delete($id);
        
        if ($response) {
            $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil dihapus.']);
        } else {
            $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal dihapus.']);
        }

        return redirect()->to(site_url('Hobi'));
    }

}