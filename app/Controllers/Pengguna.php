<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Pengguna extends ResourceController
{
    protected $modelName = 'App\Models\PenggunaModel'; 
    protected $format = 'json';
    public function index(){
        return $this->respond ($this->model->findAll());
    }

    public function show($id_pengguna = null){   
        if (!$this->model->find($id_pengguna)) {
            return $this->fail('Data tidak ditemukan');
        }
        return $this->respond ($this->model->find($id_pengguna));    
    }
    
    public function create(){
        $data = $this->request->getPost();
        $pengguna = new \App\Entities\Pengguna(); 
        $pengguna->fill($data);
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)){
            return $this->fail($this->validator->getErrors());
        }
        if ($this->model->save($pengguna)) {
            return $this->respondCreated($data);
        }
    }

    public function update($id_pengguna = null){
        $data = $this->request->getRawInput();
        $data['id_pengguna'] = $id_pengguna;
        if (!$this->model->find($id_pengguna)) {
            return $this->fail('Data tidak ditemukan');
        }
        $pengguna = new \App\Entities\pengguna(); 
        $pengguna->fill($data);
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)){
            return $this->fail($this->validator->getErrors());
        }
        if($this->model->save($pengguna)){
            return $this->respondUpdated($data);
        }
    }

    public function delete($id_pengguna = null){
        if (!$this->model->find($id_pengguna)) {
            return $this->fail('Data tidak ditemukan');
        }
        if($this->model->delete($id_pengguna)){
            return $this->respondDeleted("Data dengan id " . $id_pengguna . "berhasil dihapus");
        }
    }
}
