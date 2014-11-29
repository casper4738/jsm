<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class beranda extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('berita_model');
        $this->load->model('slider_model');
    }

    public function index() {
        $data['title'] = "Beranda";
        $model['list'] = $this->berita_model->get_last_berita();
        $model['slider1'] = $this->slider_model->get_detail('file1')->row();
        $model['slider2'] = $this->slider_model->get_detail('file2')->row();
        $model['slider3'] = $this->slider_model->get_detail('file3')->row();
        $model['slider4'] = $this->slider_model->get_detail('file4')->row();
        $this->load->view('home_header', $data);
        $this->load->view('home_content', $model);
        $this->load->view('footer');
    }

}
