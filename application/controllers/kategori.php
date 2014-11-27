<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('berita_model');
        $this->load->library('storage');
    }

    public function add() {
        $data['title'] = "Berita";
        if (empty($model['id'])){
            $model['id'] = date("Ym")."0001";
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/kategori_add', $model);
        $this->load->view('admin/footer');
    }

    public function edit($id = 0) {
        $data['title'] = "Berita";
        $model['kategori'] = $this->berita_model->get_detail_kategori($id)->row();
        $model['id'] = $id;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/kategori_edit', $model);
        $this->load->view('admin/footer');
    }

    public function insert() {
        $data = array(
            'nama_kategori' => $this->input->post("string2"),
        );
        $this->berita_model->insert_kategori($data);
        redirect("admin/kategori");
    }

    public function update() {
        $data = array(
            'nama_kategori' => $this->input->post("string2"),
        );
        $id = $this->input->post("string1");
        $this->berita_model->update_kategori($data, $id);
        redirect("admin/kategori");
    }

    public function delete($id = 0) {
        $this->berita_model->delete_kategori($id);
        redirect("admin/kategori");
    }

}
