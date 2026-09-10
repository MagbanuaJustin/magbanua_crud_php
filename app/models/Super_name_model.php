<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Super_name_model extends Model {
    public function __construct(){
        parent::__construct();

        $this->call->database();
    }

    public function getAll(){
        return $this->db->table('super_names')->get_all();
    }

    public function create($data){
        return $this->db->table('super_names')->insert($data);
    }

    public function getById($id){
        return $this->db->table('super_names')->where('id', $id)->get();
    }

    public function update($id, $data){
        return $this->db->table('super_names')->where('id', $id)->update($data);
    }

    public function delete($id){
        return $this->db->table('super_names')->where('id', $id)->delete();
    }
}