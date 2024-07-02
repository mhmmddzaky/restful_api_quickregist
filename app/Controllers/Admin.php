<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends ResourceController
{
    protected $modelName = 'App\Models\AdminModel'; 
    protected $format = 'json';     
    public function index(){
        return $this->respond ($this->model->findAll());
    }

    public function show($id_admin = null){   
        if (!$this->model->find($id_admin)) {
            return $this->fail('Data tidak ditemukan');
        }
        return $this->respond ($this->model->find($id_admin));    
    }
    
    public function create(){
        $data = $this->request->getPost();
        $admin = new \App\Entities\Admin(); 
        $admin->fill($data);
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)){
            return $this->fail($this->validator->getErrors());
        }
        if ($this->model->save($admin)) {
            return $this->respondCreated($data);
        }
    }

    public function update($id_admin = null){
        $data = $this->request->getRawInput();
        $data['id_admin'] = $id_admin;
        if (!$this->model->find($id_admin)) {
            return $this->fail('Data tidak ditemukan');
        }
        $admin = new \App\Entities\Admin(); 
        $admin->fill($data);
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)){
            return $this->fail($this->validator->getErrors());
        }
        if($this->model->save($admin)){
            return $this->respondUpdated($data);
        }
    }

    public function delete($id_admin = null){
        if (!$this->model->find($id_admin)) {
            return $this->fail('Data tidak ditemukan');
        }
        if($this->model->delete($id_admin)){
            return $this->respondDeleted("Data dengan id " . $id_admin . "berhasil dihapus");
        }
    }
}

