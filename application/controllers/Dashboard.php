<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends BaseController {

    public function __construct() {
        parent::__construct();
        if(!$this->checkSession()){
            redirect('/');
        }
        $this->load->model('user_model');
    }

    public function index() {
        $this->view('index');
    }
    
    public function profile(){
        $data['user'] = $this->user_model->get($this->session->user->id);
              
        $this->form_validation->set_rules('first_name', 'Nombre (s)', 'required');
        $this->form_validation->set_rules('last_name', 'Apellidos (s)', 'required');
        $this->form_validation->set_rules('email', 'Correo', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Teléfono', 'required|is_natural|exact_length[10]');
        
        if($this->input->post('password')){
            $this->form_validation->set_rules('password', 'Contraseña', 'required|trim|sha1');
            $this->form_validation->set_rules('passconf', 'Confirmar Contraseña', 'required|trim|sha1|matches[password]');
        }
        
        
        if ($this->form_validation->run() == FALSE) {
            $this->view('profile', $data);
        }else{
            $search = $this->user_model->get_by_email($this->input->post('email'));
            
            if ($search && $search->id != $this->session->user->id) {
                $this->session->set_flashdata('error',  'No se puede realizar el registro, el correo ' . $this->input->post('email') . ' ya esta en uso.');
                redirect('dashboard/profile');
            }
            
            $save['id'] = $this->session->user->id;
            $save['first_name'] = $this->input->post('first_name');
            $save['last_name'] = $this->input->post('last_name');
            $save['email'] = $this->input->post('email');
            $save['phone'] = $this->input->post('phone');
            
            if($this->input->post('password')){
                $save['password'] = $this->input->post('password');
            }
            
            if ($last_id = $this->user_model->save($save)) {
                $this->session->set_userdata(['user' => (object) $save]);
                
                $this->session->set_flashdata('message', 'Se actualizó correctamente tus datos.');
                redirect('dashboard/profile');
            } else {
                $this->session->set_flashdata('error', 'No se pudo realizar el registro, intenta más tarde');
                redirect('dashboard/profile');
            }
        }
        
    }
    
    public function logout(){
        $this->session->set_userdata(['user' => []]);
        redirect();
    }
    
    public function get_info_pet($pet_id){
        $data['pet'] = $this->pet_model->get($pet_id);
        echo $this->load->view('dashboard/modal_mascota', $data, TRUE );
    }

    public function search_pet($lat, $lng, $radius){
        echo json_encode($this->pet_model->search_pets($lat, $lng, $radius));
        
    }
    
    public function adoption_request(){
        if($this->input->post('pet_id')){
            $this->pet_model->adoption_request($this->input->post('pet_id'), $this->session->user->id);
            
            $pet = $this->pet_model->get($this->input->post('pet_id'));
            $user = $this->user_model->get($pet->user_id);
            
            $message = "Estimado ".$user->first_name." ".$user->last_name."<br>"
                    . " El usuario ".$this->session->user->first_name." ".$this->session->user->last_name." esta interesado "
                    . " en adoptar a la mascota <b>".$pet->name."</b>.<br>"
                    . "Ponte en contacto con el y posteriormente ingresa a <a href=\"".  base_url()."\">aDOGtion software</a> y "
                    . " acepta o rechaza la petición.<br><br><br>"
                    . "Equipo de aDOGtion software";
            sendMail($user->email, 'Petición de adopción', $message);
            echo 1;
            exit();
        }
        show_404();
    }
    
    public function set_request(){
        if($this->input->post('pet_id') && $this->input->post('aceptacion') !== NULL){
            $this->pet_model->set_request_pending($this->input->post('pet_id'), $this->input->post('aceptacion'));
            echo 1;
            exit();
        }
        show_404();
    }
    
    public function get_info_request($user_id, $request_id){
        $data['user'] = $this->user_model->get($user_id);
        $data['request_id'] = $request_id;
        echo $this->load->view('dashboard/modal_peticion', $data, TRUE );
    }

}
