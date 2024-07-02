<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class Lomba extends ResourceController
{
    protected $modelName = 'App\Models\LombaModel'; 
    protected $format = 'json';     

    public function index(){
        return $this->respond($this->model->findAll());
    }

    public function show($id_lomba = null){   
        if (!$this->model->find($id_lomba)) {
            return $this->fail('Data tidak ditemukan');
        }
        return $this->respond($this->model->find($id_lomba));    
    }
    
    public function create(){
        $data = $this->request->getPost();
        $lomba = new \App\Entities\PendaftaranLomba(); 
        $lomba->fill($data);
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)){
            return $this->fail($this->validator->getErrors());
        }
        if ($this->model->save($lomba)) {
            return $this->respondCreated($data);
        }
    }

    public function update($id_lomba = null){
        $data = $this->request->getRawInput();
        $data['id_lomba'] = $id_lomba;
        if (!$this->model->find($id_lomba)) {
            return $this->fail('Data tidak ditemukan');
        }
        $lomba = new \App\Entities\Lomba(); 
        $lomba->fill($data);
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)){
            return $this->fail($this->validator->getErrors());
        }
        if($this->model->save($lomba)){
            return $this->respondUpdated($data);
        }
    }

    public function delete($id_lomba = null){
        if (!$this->model->find($id_lomba)) {
            return $this->fail('Data tidak ditemukan');
        }
        if($this->model->delete($id_lomba)){
            return $this->respondDeleted("Data dengan id " . $id_lomba . " berhasil dihapus");
        }
    }

    // New method to update status
    public function updateStatusLomba(){
        $data = $this->request->getJSON(true);
        $idLomba = $data['id_lomba'];
        $statusLomba = $data['status_lomba'];

        if (!$this->model->find($idLomba)) {
            return $this->fail('Data tidak ditemukan');
        }

        $lomba = $this->model->find($idLomba);
        $lomba['status_lomba'] = $statusLomba;

        if($this->model->save($lomba)){
            return $this->respondUpdated($lomba);
        } else {
            return $this->fail('Gagal mengupdate status');
        }
    }
}
