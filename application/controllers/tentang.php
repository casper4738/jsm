<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class tentang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('content_model');
    }

    public function index() {
        $data['title'] = "Tentang JSM";
        $model['content'] = $this->content_model->get_detail(1)->row();
        $this->load->view('about_header', $data);
        $this->load->view('about_content', $model);
        $this->load->view('footer');
    }

    public function insert() {
        $data = array(
            'id_content' => "1",
            'isi_content' => $this->input->post("textarea"),
        );
        $this->content_model->insert($data);
        redirect("admin/tentang");
    }

    public function update() {
        $data = array(
            'isi_content' => $this->input->post("textarea"),
        );
        $id = "1";
        $this->content_model->update($data, $id);
        redirect("admin/tentang");
    }

}
