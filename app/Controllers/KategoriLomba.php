<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class KategoriLomba extends ResourceController
{
    protected $modelName = 'App\Models\KategoriLombaModel'; 
    protected $format = 'json';     
    public function index(){
        return $this->respond ($this->model->findAll());
    }

    public function show($id_kategori = null){   
        if (!$this->model->find($id_kategori)) {
            return $this->fail('Data tidak ditemukan');
        }
        return $this->respond ($this->model->find($id_kategori));    
    }
    
    public function create(){
        $data = $this->request->getPost();
        $kategori = new \App\Entities\KategoriLomba(); 
        $kategori->fill($data);
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)){
            return $this->fail($this->validator->getErrors());
        }
        if ($this->model->save($kategori)) {
            return $this->respondCreated($data);
        }
    }

    public function update($id_kategori = null){
        $data = $this->request->getRawInput();
        $data['id_kategori'] = $id_kategori;
        if (!$this->model->find($id_kategori)) {
            return $this->fail('Data tidak ditemukan');
        }
        $kategori = new \App\Entities\KategoriLomba(); 
        $kategori->fill($data);
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)){
            return $this->fail($this->validator->getErrors());
        }
        if($this->model->save($kategori)){
            return $this->respondUpdated($data);
        }
    }

    public function delete($id_kategori = null){
        if (!$this->model->find($id_kategori)) {
            return $this->fail('Data tidak ditemukan');
        }
        if($this->model->delete($id_kategori)){
            return $this->respondDeleted("Data dengan id " . $id_kategori . "berhasil dihapus");
        }
    }
}
