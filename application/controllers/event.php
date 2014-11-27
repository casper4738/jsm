<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class event extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->library('storage');
    }

    public function add() {
        $data['title'] = "Event";
        $model['id'] = $this->event_model->get_id()->row()->id;
        if (empty($model['id'])) {
            $model['id'] = date("Ym") . "0001";
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/event_add', $model);
        $this->load->view('admin/footer');
    }

    public function edit($id = 0) {
        $data['title'] = "Event";
        $model['event'] = $this->event_model->get_detail($id)->row();
        $model['id'] = $id;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/event_edit', $model);
        $this->load->view('admin/footer');
    }

    public function insert() {
        $data = array(
            'id_event' => $this->input->post("string1"),
            'judul_event' => $this->input->post("string2"),
            'isi_event' => $this->input->post("string3"),
            'tanggal_event' => date("Y-m-d", strtotime($this->input->post("string4"))),
        );
        $this->event_model->insert($data);
        redirect("admin/event");
    }

    public function update() {
        $data = array(
            'judul_event' => $this->input->post("string2"),
            'isi_event' => $this->input->post("string3"),
            'tanggal_event' => date("Y-m-d", strtotime($this->input->post("string4"))),
        );
        $id = $this->input->post("string1");
        $this->event_model->update($data, $id);
        redirect("admin/event");
    }

    public function delete($id = 0) {
        $this->event_model->delete($id);
        redirect("admin/event");
    }

}
