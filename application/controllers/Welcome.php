<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->user) {
            redirect('dashboard');
        }
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->view('public/index');
    }
    
    public function recover_pasword($hash) {
        $data['hash'] = $hash;
        $data['user'] = $this->user_model->get_by_hash($hash);
        if(!$data['user']){
            show_404();
        }
        
        $this->form_validation->set_rules('password', 'Contraseña', 'required|trim|sha1');
        $this->form_validation->set_rules('passconf', 'Confirmar Contraseña', 'required|trim|sha1|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('public/recover_pasword', $data);
        }else{
            $save['id'] = $data['user']->id;;
            $save['password'] = $this->input->post('password');
            $save['reset_password'] = NULL;
            
            $this->user_model->save($save);
            
            $this->session->set_userdata(['user' => (object)$data['user']]);
            redirect();
        }
        
    }

    public function login() {
        $this->form_validation->set_rules('email', 'Correo');
        $this->form_validation->set_rules('password', 'Contraseña', 'sha1');

        if ($this->form_validation->run() == TRUE) {
            $user = $this->user_model->get_by_email($this->input->post('email'));

            if (!$user) {
                echo 'No existe un usuario con ese correo';
                exit();
            }
            
            if ($user->password != $this->input->post('password')) {
                echo 'Contraseña incorrecta';
                exit();
            }

            $this->session->set_userdata(['user' => (object) $user]);
            echo 1;
        }
    }
    
    public function reset_password() {
        $this->form_validation->set_rules('email', 'Correo');
        
        $user = $this->user_model->get_by_email($this->input->post('email'));

        if (!$user) {
            echo 'No existe un usuario con ese correo';
            exit();
        }
        
        $hash = md5(time());
        $message = "Estimado ".$user->first_name.' '.$user->last_name."<br>"
                . "Para recuperar tu contraseña, sola da click en el siguiente <a href=\"".  base_url('reset-password/'.$hash). "\">enlace</a>";
        if(sendMail($this->input->post('email'), 'Recuperar Contraseña', $message)){
            $this->user_model->reset_password($user->id, $hash);
            echo 1;
        }else{
            echo "No se pudo enviar el correo para recuperar tu contraseña, intenta más tarde.";
        }
        
    }

    public function register() {
        $this->form_validation->set_rules('first_name', 'Nombre (s)', 'required');
        $this->form_validation->set_rules('last_name', 'Apellidos (s)', 'required');
        $this->form_validation->set_rules('email', 'Correo', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Teléfono', 'required|is_natural|exact_length[10]');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|trim|sha1');
        $this->form_validation->set_rules('passconf', 'Confirmar Contraseña', 'required|trim|sha1|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            if ($this->user_model->get_by_email($this->input->post('email'))) {
                echo 'No se puede realizar el registro, el correo ' . $this->input->post('email') . ' ya esta en uso.';
                exit();
            }

            $save['first_name'] = $this->input->post('first_name');
            $save['last_name'] = $this->input->post('last_name');
            $save['email'] = $this->input->post('email');
            $save['phone'] = $this->input->post('phone');
            $save['password'] = $this->input->post('password');
            if ($last_id = $this->user_model->save($save)) {
                $save['id'] = $last_id ;
                $this->session->set_userdata(['user' => (object) $save]);
                echo 1;
            } else {
                echo 'No se pudo realizar el registro, intenta más tarde';
            }
        }
    }

}
