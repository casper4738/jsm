<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class event extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('berita_model');
        $this->load->library('storage');
    }

    public function all() {
        $data['title'] = "Event";
        $model['title'] = strtoupper("ALL EVENT");

        $list = $this->event_model->get_list();
        $model['list'] = $list;

        $response = array();
        foreach ($list->result() as $value) {
            $data = array();
            $data["id"] = $value->id_event;
            $data["title"] = $value->judul_event;
            $data["start"] = $value->tanggal_event;
            $data["url"] = base_url()."event/detail/$value->id_event"; 
//            $data["end"] = "2014-11-11";
//            $data["rendering"] = "background";
//            $data["color"] = "#ff9f89";
//            $data["constraint"] = "availableForMeeting";
//            $data["overlap"] = "false";
            
            array_push($response, $data);
        }
        $model['data_json'] = json_encode($response);

        $this->load->view('sel_header', $data);
        $this->load->view('event_all', $model);
        $this->load->view('footer');
    }

    public function detail($id) {
        $data['title'] = "Event";
        $model['list_berita'] = $this->berita_model->get_last_berita();
        $model['list_event'] = $this->event_model->get_last();
        $model['event'] = $this->event_model->get_detail($id)->row();

        $this->load->view('news_header', $data);
        $this->load->view('event_detail', $model);
        $this->load->view('footer');
    }

    public function add() {
        $data['title'] = "Event";
        $model['id'] = $this->event_model->get_id()->row()->id;
        if (empty($model['id'])) {
            $model['id'] = date("Ym") . "0001";
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/event_add', $model);
        $this->load->view('admin/event_footer');
    }

    public function edit($id = 0) {
        $data['title'] = "Event";
        $model['event'] = $this->event_model->get_detail($id)->row();
        $model['id'] = $id;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/event_edit', $model);
        $this->load->view('admin/event_footer');
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
