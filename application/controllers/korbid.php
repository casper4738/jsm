<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class korbid extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('korbid_model');
        $this->load->library('storage');
    }
    
    public function music() {
        $data['title'] = "Korbid";
        $model['title'] = "KORDINATOR BIDANG MUSIC";
        $model['korbid'] = $this->korbid_model->get_detail("music")->row();
        $this->load->view('korbid_header', $data);
        $this->load->view('korbid_content', $model);
        $this->load->view('footer');
    }
    
    public function choir() {
        $data['title'] = "Korbid";
        $model['title'] = "KORDINATOR BIDANG CHOIR";
        $model['korbid'] = $this->korbid_model->get_detail("choir")->row();
        $this->load->view('korbid_header', $data);
        $this->load->view('korbid_content', $model);
        $this->load->view('footer');
    }
    
     public function multimedia() {
        $data['title'] = "Korbid";
        $model['title'] = "KORDINATOR BIDANG MULTIMEDIA";
        $model['korbid'] = $this->korbid_model->get_detail("multimedia")->row();
        $this->load->view('korbid_header', $data);
        $this->load->view('korbid_content', $model);
        $this->load->view('footer');
    }

    public function update() {
        $data = array(
            'nama_korbid' => $this->input->post("string1"),
            'tugas' => $this->input->post("string2"),
        );
        $this->korbid_model->update($data);
        redirect("admin/korbid/" . $data["nama_korbid"]);
    }


}
