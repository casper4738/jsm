<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class berita extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('berita_model');
        $this->load->library('storage');
    }

    public function index() {
        $data['title'] = "Berita & Event";
        $model['list_berita'] = $this->berita_model->get_last_berita();
        $model['list_kategori'] = $this->berita_model->get_list_kategori();
        $model['list'] = $this->berita_model->get_berita(0);

        $this->load->library('pagination');
        $config = $this->storage->init_pagination("berita/page/", $this->berita_model->get_count_berita());
        $this->pagination->initialize($config);

        $this->load->view('news_header', $data);
        $this->load->view('news_content', $model);
        $this->load->view('footer');
    }

    public function page($val1 = 0) {
        $data['title'] = "Berita & Event";
        $model['list_berita'] = $this->berita_model->get_last_berita();
        $model['list_kategori'] = $this->berita_model->get_list_kategori();
        $model['list'] = $this->berita_model->get_berita($val1);

        $this->load->library('pagination');
        $config = $this->storage->init_pagination("berita/page/", $this->berita_model->get_count_berita());
        $this->pagination->initialize($config);

        $this->load->view('news_header', $data);
        $this->load->view('news_content', $model);
        $this->load->view('footer');
    }

    public function detail($id) {
        $data['title'] = "Berita";
        $model['list_berita'] = $this->berita_model->get_last_berita();
        $model['list_kategori'] = $this->berita_model->get_list_kategori();
        $model['list'] = $this->berita_model->get_last_berita();
        $model['berita'] = $this->berita_model->get_detail_berita($id)->row();

        $this->load->view('news_header', $data);
        $this->load->view('news_detail', $model);
        $this->load->view('footer');
    }

    public function add() {
//        if (!$this->session->userdata('logged_in')) {
//            // Allow some methods?
//            $allowed = array(
//                'some_method_in_this_controller',
//                'other_method_in_this_controller',
//            );
//            if (!in_array($this->router->fetch_method(), $allowed) {
//                redirect('login');
//            }
//        }
        $data['title'] = "Berita";
        $model['list_kategori'] = $this->berita_model->get_list_kategori();
        $model['id'] = $this->berita_model->get_id()->row()->id;
        if (empty($model['id'])){
            $model['id'] = date("Ym")."0001";
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/news_add', $model);
        $this->load->view('admin/news_footer');
    }

    public function edit($id = 0) {
//        if (!$this->session->userdata('logged_in')) {
//            // Allow some methods?
//            $allowed = array(
//                'some_method_in_this_controller',
//                'other_method_in_this_controller',
//            );
//            if (!in_array($this->router->fetch_method(), $allowed) {
//                redirect('login');
//            }
//        }
        $data['title'] = "Berita";
        $model['berita'] = $this->berita_model->get_detail_berita($id)->row();
        $model['list_kategori'] = $this->berita_model->get_list_kategori();
        $model['id'] = $id;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/news_edit', $model);
        $this->load->view('admin/news_footer');
    }

    public function insert() {
        $data = array(
            'id_berita' => $this->input->post("string1"),
            'judul_berita' => $this->input->post("string2"),
            'isi_berita' => $this->input->post("string3"),
            'id_kategori' => $this->input->post("string4"),
            'tanggal_post' => date("Y-m-d h:i:s")
        );
        $this->berita_model->insert($data);
        redirect("admin/berita");
    }

    public function update() {
        $data = array(
            'judul_berita' => $this->input->post("string2"),
            'isi_berita' => $this->input->post("string3"),
            'id_kategori' => $this->input->post("string4"),
        );
        $id = $this->input->post("string1");
        $this->berita_model->update($data, $id);
        redirect("admin/berita");
    }

    public function delete($id = 0) {
        $this->berita_model->delete($id);
        redirect("admin/berita");
    }

}
