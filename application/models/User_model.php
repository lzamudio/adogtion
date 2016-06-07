<?php

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function save($data){
        if($data['id']){
            $this->db->where('id',$data['id']);
            $this->db->update('users', $data);
            return $data['id'];
        }else{
            $this->db->insert('users', $data);
            return $this->db->insert_id();    
        }
        
    }
    
    public function get_by_email($email){
        return $this->db->get_where('users',['email' => $email])->row();
    }
    
    public function get_by_hash($hash){
        return $this->db->get_where('users',['reset_password' => $hash])->row();
    }
    
    public function get($id){
        return $this->db->get_where('users',['id' => $id])->row();
    }
    public function reset_password($id, $hash){
        $this->db->where('id',$id);
        $this->db->update('users',['reset_password' => $hash, 'password' => NULL]);
    }

}
