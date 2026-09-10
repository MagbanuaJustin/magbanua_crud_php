<?php

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->model('ProductModel');
    }

    public function index()
    {
        $data['products'] = $this->ProductModel->getAll();

        $this->call->view('products/index', $data);
    }

    public function create()
    {
        $this->call->view('products/create');
    }

    public function store()
    {
        $data = [
            'product_name' => trim($this->io->post('product_name')),
            'description'  => trim($this->io->post('description')),
            'price'        => $this->io->post('price'),
            'quantity'     => $this->io->post('quantity')
        ];

        $this->ProductModel->create($data);

        $this->response->redirect_after_post('/products');
    }

    public function edit($id)
    {
        $data['product'] = $this->ProductModel->getById($id);

        $this->call->view('products/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'product_name' => trim($this->io->post('product_name')),
            'description'  => trim($this->io->post('description')),
            'price'        => $this->io->post('price'),
            'quantity'     => $this->io->post('quantity')
        ];

        $this->ProductModel->update($id, $data);

        $this->response->redirect_after_post('/products');
    }

    public function delete($id)
    {
        $this->ProductModel->delete($id);

        $this->response->redirect_after_post('/products');
    }
}