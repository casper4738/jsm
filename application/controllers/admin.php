<?php
error_reporting(0);
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->berita();
    }

    public function tentang() {
        $this->load->model('content_model');
        $data['title'] = "Tentang JSM";
        $model['content'] = $this->content_model->get_detail(1)->row();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/about_content', $model);
        $this->load->view('admin/about_footer');
    }

    public function berita() {
        $this->load->model('berita_model');
        $data['title'] = "Berita";
        $model['list'] = $this->berita_model->get_all_berita();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/news_content', $model);
        $this->load->view('admin/footer');
    }

    public function kategori() {
        $this->load->model('berita_model');
        $data['title'] = "Kategori";
        $model['list'] = $this->berita_model->get_list_kategori();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/kategori_content', $model);
        $this->load->view('admin/footer');
    }

    public function event() {
        $this->load->model('event_model');
        $data['title'] = "Event";
        $model['list'] = $this->event_model->get_list();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/event_content', $model);
        $this->load->view('admin/footer');
    }

//    public function korbid($string = "music") {
//        $this->load->model('korbid_model');
//        $data['title'] = "Kordinator Bidang";
//        $this->load->view('admin/header', $data);
//        if ($string == "music") {
//            $model['jenis'] = "Music";
//            $model['par'] = "music";
//            $model['list'] = $this->korbid_model->get_list("music");
//            $this->load->view('admin/korbid_content', $model);
//        } else if ($string == "choir") {
//            $model['jenis'] = "Choir";
//            $model['par'] = "choir";
//            $model['list'] = $this->korbid_model->get_list("choir");
//            $this->load->view('admin/korbid_content', $model);
//        } else if ($string == "multimedia") {
//            $model['jenis'] = "Multimedia";
//            $model['par'] = "multimedia";
//            $model['list'] = $this->korbid_model->get_list("multimedia");
//            $this->load->view('admin/korbid_content', $model);
//        }
//        $this->load->view('admin/footer');
//    }
    
     public function korbid($string = "music") {
        $this->load->model('korbid_model');
        $data['title'] = "Korbid";
        
        $model['korbid'] = $this->korbid_model->get_detail($string)->row();
        $model['id'] = $string;
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/korbid_content', $model);
        $this->load->view('admin/about_footer');
    }

    public function sel($string = "A") {
        $this->load->model('sel_model');
        $data['title'] = "Sel " . $string;
        $this->load->view('admin/header', $data);
        $model['par1'] = "Sel " . $string;
        $model['par2'] = "Jadwal Tugas POS, Shafaat Komunitas, Shafaat DF";
        $model['par3'] = $string;
        $model['list'] = $this->sel_model->get_list($string);
        $this->load->view('admin/sel_content', $model);
        $this->load->view('admin/footer');
    }

}
