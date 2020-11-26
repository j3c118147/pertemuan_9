<?php

namespace App\Controllers;
use App\Models\Pengguna_Model;

class Beranda extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    
    }

    public function index()
    {   
        $data['session'] = $this->session->getFlashdata('response');
        $data['isLogin'] = $this->session->get('username');
        return view('beranda_v',$data);
    }

    public function login()
    {
        $pengguna_model = new Pengguna_Model();
        $where = [
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password'))
        ];

        $data = $pengguna_model->where($where)->find();
        if (!empty($data)) {
            $this->session->set('username',$this->request->getPost('username'));
            $this->session->setFlashdata('response',['status' => 1,'message' => 'Berhasil Login']);     
        }
        else{
            $this->session->setFlashdata('response',['status' => 0,'message' => 'Gagal Login']);  
        }
        return redirect()->to(site_url('Beranda'));
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('Beranda'));
    }
}

?>