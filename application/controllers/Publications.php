<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Publications extends BaseController {

    public function __construct() {
        parent::__construct();
        if(!$this->checkSession()){
            redirect('/');
        }
    }

    public function index() {
        $data['publicaciones'] = $this->pet_model->get_all($this->session->user->id);
        $this->view('publications', $data);
    }
    
    public function adoptions(){
        $data['adoptions'] = $this->pet_model->get_adoptions($this->session->user->id);
        $this->view('adoptions', $data);
    }
    
    public function add($id = 0) {
        if ($id <= 0 && empty($_FILES['photo']['name']) ) {
            $this->form_validation->set_rules('photo', 'Foto', 'required');
        }
        $this->form_validation->set_rules('name', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('especie', 'Especie', 'required|trim');
        $this->form_validation->set_rules('age', 'Edad', 'required|trim');
        $this->form_validation->set_rules('sex', 'Sexo', 'required|trim');
        $this->form_validation->set_rules('breed', 'Raza', 'required|trim');
        $this->form_validation->set_rules('sterilization', 'Esterilización');
        $this->form_validation->set_rules('size', 'Tamaño', 'required|trim');
        $this->form_validation->set_rules('address', 'Dirección', 'trim|required');
        $this->form_validation->set_rules('vaccine', 'Vacunas');
        
        $data['id'] = '';
        $data['user_id'] = $this->session->user->id;
        $data['photo'] = '';
        $data['name'] = '';
        $data['especie'] = '';
        $data['age'] = '';
        $data['sex'] = '';
        $data['breed'] = '';
        $data['sterilization'] = '';
        $data['size'] = '';
        $data['address'] = '';
        
        $data['vaccines'] = [];
        
        if($id > 0){
            $pet = $this->pet_model->get($id);
            if($pet){
                $data['id'] = $pet->id;
                $data['photo'] = $pet->photo;
                $data['name'] = $pet->name;
                $data['especie'] = $pet->especie;
                $data['age'] = $pet->age;
                $data['sex'] = $pet->sex;
                $data['breed'] = $pet->breed;
                $data['sterilization'] = $pet->sterilization;
                $data['size'] = $pet->size;
                $data['address'] = $pet->address;
                $data['vaccines'] = $pet->vaccines;
            }
        }
        
        if ($this->form_validation->run() == FALSE) {

            $this->view('new_publication', $data);
        } else {
            $geometry = getGeometry($this->input->post('address'));
            if($geometry === FALSE){
                $this->session->set_flashdata('error', 'No se puede guardar la publicación. Verifica que la dirección sea correcta.');
                redirect('publications/add/'.$id);
            }else{
                $data['lat'] = $geometry->lat;
                $data['lng'] = $geometry->lng;
            }
            
            
            $config['upload_path']    = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $config);
            
            if(! empty($_FILES['photo']['name'])){
                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('publications/add/'.$id);
                } else {
                    $info = $this->upload->data();
                    $data['photo'] = $info['file_name'];
                }
            }
            
            $data['name'] = $this->input->post('name');
            $data['especie'] = $this->input->post('especie');
            $data['age'] = $this->input->post('age');
            $data['sex'] = $this->input->post('sex');
            $data['breed'] = $this->input->post('breed');
            $data['sterilization'] = (bool)$this->input->post('sterilization');
            $data['size'] = $this->input->post('size');
            $data['address'] = $this->input->post('address');
            
            $vaccines = [];
            if(is_array( $this->input->post('vaccine'))){
                foreach ( $this->input->post('vaccine') as $vaccine) {
                    $vaccines[] =  $vaccine;
                }
            }
            
            unset($data['vaccines']);
            
            $this->pet_model->save($data, $vaccines);
            $this->session->set_flashdata('message', 'Se guardo correctamente la publicación');
            redirect('publications');
            
        }
        
    }    

}
