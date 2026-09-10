<?php

class ProductModel extends Model
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
    }

    public function getAll()
    {
        return $this->db->table('products')->get_all();
    }

    public function create($data)
    {
        return $this->db->table('products')->insert($data);
    }

    public function getById($id)
    {
        return $this->db
            ->table('products')
            ->where('id', $id)
            ->get();
    }

    public function update($id, $data)
    {
        return $this->db
            ->table('products')
            ->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->db
            ->table('products')
            ->where('id', $id)
            ->delete();
    }
}