<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class PendaftaranLomba extends ResourceController
{
    protected $modelName = 'App\Models\PendaftaranLombaModel'; 
    protected $format = 'json';     
    public function index(){
        return $this->respond ($this->model->findAll());
    }

    public function show($id_pendaftaran = null){   
        if (!$this->model->find($id_pendaftaran)) {
            return $this->fail('Data tidak ditemukan');
        }
        return $this->respond ($this->model->find($id_pendaftaran));    
    }
    
    public function create(){
        $data = $this->request->getPost();
        $pendaftaranlomba = new \App\Entities\PendaftaranLomba(); 
        $pendaftaranlomba->fill($data);
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)){
            return $this->fail($this->validator->getErrors());
        }
        if ($this->model->save($pendaftaranlomba)) {
            return $this->respondCreated($data);
        }
    }

    public function update($id_pendaftaran = null){
        $data = $this->request->getRawInput();
        $data['id_pendaftaran'] = $id_pendaftaran;
        if (!$this->model->find($id_pendaftaran)) {
            return $this->fail('Data tidak ditemukan');
        }
        $pendaftaranlomba = new \App\Entities\PendaftaranLomba(); 
        $pendaftaranlomba->fill($data);
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)){
            return $this->fail($this->validator->getErrors());
        }
        if($this->model->save($pendaftaranlomba)){
            return $this->respondUpdated($data);
        }
    }

    public function delete($id_pendaftaran = null){
        if (!$this->model->find($id_pendaftaran)) {
            return $this->fail('Data tidak ditemukan');
        }
        if($this->model->delete($id_pendaftaran)){
            return $this->respondDeleted("Data dengan id " . $id_pendaftaran . "berhasil dihapus");
        }
    }
    
    public function updateStatusLomba(){
        $data = $this->request->getJSON(true);
        $idPendaftaran = $data['id_pendaftaran'];
        $statusPendaftaran = $data['status_pendaftaran'];

        if (!$this->model->find($idPendaftaran)) {
            return $this->fail('Data tidak ditemukan');
        }

        $pendaftaranlomba = $this->model->find($idPendaftaran);
        $pendaftaranlomba['status_pendaftaran'] = $statusPendaftaran;

        if($this->model->save($pendaftaranlomba)){
            return $this->respondUpdated($pendaftaranlomba);
        } else {
            return $this->fail('Gagal mengupdate status');
        }
    }
}
