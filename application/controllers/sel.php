<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class sel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('sel_model');
    }

    public function index() {
        $this->jadwal();
    }

    public function jadwal($string = "A") {
        $data['title'] = "Jadwal Tugas Sel";
        $model['title'] = strtoupper("JADWAL TUGAS SEL $string");

        $list = $this->sel_model->get_list($string);
        $model['list'] = $list;

        $response = array();
        foreach ($list->result() as $value) {
            $data = array();
            $data["id"] = $value->tugas;
            $data["title"] = $value->tugas;
            $data["start"] = $value->tanggal;
//            $data["end"] = "2014-11-11";
//            $data["rendering"] = "background";
//            $data["color"] = "#ff9f89";
//            $data["constraint"] = "availableForMeeting";
//            $data["overlap"] = "false";
            array_push($response, $data);
        }
        $model['data_json'] = json_encode($response);

        $this->load->view('sel_header', $data);
        $this->load->view('sel_detail', $model);
        $this->load->view('footer');
    }

    public function add($string = "A") {
        $data['title'] = "Jadwal Tugas";
        $model['title'] = "Jadwal Tugas Sel $string";
        $model['sel'] = $string;
        $model['id'] = $this->sel_model->get_id()->row()->id;
        if (empty($model['id'])) {
            $model['id'] = date("Ym") . "0001";
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sel_add', $model);
        $this->load->view('admin/footer');
    }

    public function insert() {
        $data = array(
            'id_sel' => $this->input->post("string1"),
            'nama_sel' => $this->input->post("string2"),
            'tanggal' => date("Y-m-d", strtotime($this->input->post("string3"))),
            'tugas' => $this->input->post("string4"),
            'keterangan' => $this->input->post("string5"),
        );
        $this->sel_model->insert($data);
        redirect("admin/sel/" . $data['string1']);
    }

}
