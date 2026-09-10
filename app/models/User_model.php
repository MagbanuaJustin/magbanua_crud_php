<?php
class User_model extends Model{
    public function __construct(){
        parent::__construct();
        $this->call->database();
    }
    protected $table = 'lab_users';
    public function find_by_username($username){
        return $this->db
        ->table($this->table)
        ->where('username', $username)
        ->get();
    }
    
}