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
        $this->load->view('korbid_header', $data);
        $this->load->view('korbid_content', $model);
        $this->load->view('footer');
    }

    public function add($string = "music") {
        $data['title'] = "Kordinator Bidang";
        $model['id'] = $this->korbid_model->get_id()->row()->id;
        if (empty($model['id'])) {
            $model['id'] = date("Ym") . "0001";
        }

        if ($string == "music") {
            $model['jenis'] = "Music";
            $model['par'] = "music";
        } else if ($string == "choir") {
            $model['jenis'] = "Choir";
            $model['par'] = "choir";
        } else if ($string == "multimedia") {
            $model['jenis'] = "Multimedia";
            $model['par'] = "multimedia";
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/korbid_add', $model);
        $this->load->view('admin/footer');
    }

    public function edit($string, $id = 0) {
        $data['title'] = "Kordinator Bidang";
        if ($string == "music") {
            $model['jenis'] = "Music";
        } else if ($string == "choir") {
            $model['jenis'] = "Choir";
        } else if ($string == "multimedia") {
            $model['jenis'] = "Multimedia";
        }
        $model['par'] = $string;
        $model['korbid'] = $this->korbid_model->get_detail($id)->row();
        $model['id'] = $id;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/korbid_edit', $model);
        $this->load->view('admin/footer');
    }

    public function insert() {
        $data = array(
            'id_korbid' => $this->input->post("string1"),
            'jenis_korbid' => $this->input->post("string2"),
            'tanggal' => date("Y-m-d", strtotime($this->input->post("string3"))),
            'singer' => $this->input->post("string4"),
            'pemusik' => $this->input->post("string5"),
            'atur_alat' => $this->input->post("string6"),
        );
        $this->korbid_model->insert($data);
        redirect("admin/korbid/" . $data["jenis_korbid"]);
    }

    public function update() {
        $data = array(
            'jenis_korbid' => $this->input->post("string2"),
            'tanggal' => date("Y-m-d", strtotime($this->input->post("string3"))),
            'singer' => $this->input->post("string4"),
            'pemusik' => $this->input->post("string5"),
            'atur_alat' => $this->input->post("string6"),
        );
        $id = $this->input->post("string1");
        $this->korbid_model->update($data, $id);
        redirect("admin/korbid/" . $data["jenis_korbid"]);
    }

    public function delete($par, $id = 0) {
        $this->korbid_model->delete($id);
        redirect("admin/korbid/" . $par);
    }

}
