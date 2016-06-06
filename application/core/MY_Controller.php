<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pet_model');
        $this->request_pending = $this->pet_model->get_request_pending($this->session->user->id);
    }

    public function checkSession() {
        if ($this->session->user) {
            return true;
        }

        return false;
    }
    
    public function view($path, $data = []){
        $this->load->view('dashboard/_includes/header', $data);
        $this->load->view('dashboard/'.$path, $data);
        $this->load->view('dashboard/_includes/footer', $data);
    }

}
