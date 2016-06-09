<?php

class Pet_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function search_pets($lat, $lng, $radius){
        $sql = "SELECT id, address, name, lat, lng, ( 6371392 * acos( cos( radians(".$this->db->escape($lat).") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(".$this->db->escape($lng).") ) + sin( radians(".$this->db->escape($lat).") ) * sin( radians( lat ) ) ) ) AS distance 
                FROM pets 
                WHERE  user_request IS NULL 
                HAVING distance <=  ".$this->db->escape($radius);
        
        $query = $this->db->query($sql);
        
        return $query->result();
    }
    
    
    public function save($data, $vaccines){
        if($data['id']){
            $this->db->where('id', $data['id']);
            $this->db->update('pets', $data);
            
        }else{
            $this->db->insert('pets', $data);
            $data['id'] = $this->db->insert_id();
        }
        
        $this->db->delete('pet_vaccine',['pet_id' => $data['id']]);
        foreach ($vaccines as $vaccine) {
            if(!empty($vaccine)){
                $this->db->insert('pet_vaccine', ['pet_id' => $data['id'], 'name' => $vaccine ]);
            }
        }
        
        return true;
    }
    
    public function delete($id){
        $this->db->delete('pets',['id' => $id]);
        $this->db->delete('pet_vaccine',['pet_id' => $id]);
    }
    
    public function get($id){
        $pet = $this->db->get_where('pets',['id' => $id])->row();
        if($pet){
            $pet->vaccines = $this->db->get_where('pet_vaccine',['pet_id' => $id])->result();
            $pet->owner = $this->db->get_where('users',['id' => $pet->user_id])->row();
        }
        return $pet;
    }
    
    public function get_all($id){
        return  $this->db->get_where('pets',['user_id' => $id])->result();
    }
    public function get_adoptions($user_id){
        return  $this->db->get_where('pets',['user_request' => $user_id])->result();
    }
    
    public function adoption_request($pet_id, $user_id){
        
        $this->db->where('id', $pet_id);
        return $this->db->update('pets', ['approved' => 0, 'user_request' => $user_id ]);
    }
    public function set_request_pending($pet_id, $status){
        
        $this->db->where('id', $pet_id);
        if($status){
            return $this->db->update('pets', ['approved' => 1 ]);
        }else{
            return $this->db->update('pets', ['approved' => 0, 'user_request' => NULL ]);
        }
        
    }
    
    public function get_request_pending($user_id){
        return $this->db->get_where('pets', ['user_id' => $user_id, 'approved' => 0, 'user_request !=' => NULL])->result();
    }
    

}
