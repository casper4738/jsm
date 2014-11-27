<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class galeri extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('galeri_model');
    }

    public function index() {
        $data['title'] = "Galeri";
        $model['hal'] = "1";
        $model['list_album'] = $this->galeri_model->get_album();
        $this->load->view('gallery_header', $data);
        $this->load->view('gallery_content', $model);
        $this->load->view('footer');
    }

    public function hal($val1, $val2) {
        $data['title'] = "Galeri";
        $model['album'] = $val1;
        $model['hal'] = $val2;
        $model['num_rows'] = $this->galeri_model->get_num_rows()->num_rows();
        $model['list'] = $this->galeri_model->get_galeri($val1, ($val2-1)*9);
        $this->load->view('gallery_header', $data);
        $this->load->view('gallery_all_photo', $model);
        $this->load->view('footer');
    }

}
