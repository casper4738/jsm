<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class beranda extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('berita_model');
    }

    public function index() {
        $data['title'] = "Beranda";
                
        $model['list'] = $this->berita_model->get_last_berita();
        $this->load->view('home_header', $data);
        $this->load->view('home_content', $model);
        $this->load->view('footer');
    }

}
