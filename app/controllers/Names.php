<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Names extends Controller {
    public function __construct(){
        parent::__construct();

        $this->call->model('Super_name_model');
    }

    public function index(){
        $data['names'] = $this->Super_name_model->getAll();

        $this->call->view('names/index', $data);
    }

    public function create(){
        $this->call->view('names/create');
    }

    public function store(){
        $data = [
            'last_name' => $this->io->post('last_name'),
            'first_name' => $this->io->post('first_name'),
            'middle_name' => $this->io->post('middle_name')
        ];

        $this->Super_name_model->create($data);
        $this->response->redirect_after_post('/names');
    }

    public function edit($id){
        $data['name'] = $this->Super_name_model->getById($id);
        $this->call->view('names/edit', $data);
    }    

    public function update($id){
        $data = [
            'last_name' => $this->io->post('last_name'),
            'first_name' => $this->io->post('first_name'),
            'middle_name' => $this->io->post('middle_name')
        ];

        $this->Super_name_model->update($id, $data);
        $this->response->redirect_after_post('/names');
    }

    public function delete($id){
        $this->Super_name_model->delete($id);
        $this->response->redirect_after_post('/names');
    }
}