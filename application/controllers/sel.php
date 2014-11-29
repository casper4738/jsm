<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class sel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('sel_model');
        $this->load->library('storage');
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
        if ($this->session->userdata('logged_in')) {
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
        } else {
            redirect('login', 'refresh');
        }
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

    public function add_pelayanan1() {
        if ($this->session->userdata('logged_in')) {
//            $data['title'] = "Jadwal";
//            $model['bulan'] = $this->input->get("bulan");
//            $model['tahun'] = $this->input->get("tahun");
//
//            if (empty($model['bulan'])) {
//                $model['bulan'] = date("m");
//            }
//            if (empty($model['tahun'])) {
//                $model['tahun'] = date("Y");
//            }
//
//            $model['data_array'] = array();
//            foreach ($this->sel_model->get_list3($model['tahun'], $model['bulan'], "SUDIANG")->result() as $value) {
//                $model['data_array'][] = explode("-", $value->tanggal)[2];
//            }
//
//            $this->load->view("admin/sel_header", $data);
//            $this->load->view("admin/sudiang_input", $model);
//            $this->load->view("admin/sel_footer");
           
            $data['title'] = "Jadwal";
            $model['bulan'] = $this->input->get("bulan");
            $model['tahun'] = $this->input->get("tahun");

            if (empty($model['bulan'])) {
                $model['bulan'] = date("m");
            }
            if (empty($model['tahun'])) {
                $model['tahun'] = date("Y");
            }

            $model['data_array'] = array();
            foreach ($this->sel_model->get_list3($model['tahun'], $model['bulan'], "SUDIANG")->result() as $value) {
                $model['data_array'][] = explode("-", $value->tanggal)[2];
            }

            $this->load->view("admin/header", $data);
            $this->load->view("admin/pelayanan_input", $model);
            $this->load->view("admin/footer");
        } else {
            redirect('login', 'refresh');
        }
    }

    public function add_pelayanan2() {
        if ($this->session->userdata('logged_in')) {
            $data['title'] = "Jadwal";
            $model['bulan'] = $this->input->get("bulan");
            $model['tahun'] = $this->input->get("tahun");

            if (empty($model['bulan'])) {
                $model['bulan'] = date("m");
            }
            if (empty($model['tahun'])) {
                $model['tahun'] = date("Y");
            }

            $model['data_array'] = array();
            $model['data_arrayx'] = array();
            foreach ($this->sel_model->get_list3($model['tahun'], $model['bulan'], "PEDAL")->result() as $value) {
                $model['data_array'][] = explode("-", $value->tanggal)[2];
                $model['data_arrayx'][] = $this->sel_model->get_list2($value->tanggal, "PEDAL")->result()[0]->nama_sel;
            }

            $this->load->view("admin/header", $data);
            $this->load->view("admin/pedal_input", $model);
            $this->load->view("admin/footer");
        } else {
            redirect('login', 'refresh');
        }
    }

    public function add_pelayanan3() {
        if ($this->session->userdata('logged_in')) {
            $data['title'] = "Jadwal";
            $model['bulan'] = $this->input->get("bulan");
            $model['tahun'] = $this->input->get("tahun");

            if (empty($model['bulan'])) {
                $model['bulan'] = date("m");
            }
            if (empty($model['tahun'])) {
                $model['tahun'] = date("Y");
            }

            $model['data_array'] = array();
            foreach ($this->sel_model->get_list3($model['tahun'], $model['bulan'], "SYAFAAT")->result() as $value) {
                $model['data_array'][] = explode("-", $value->tanggal)[2];
            }

            $this->load->view("admin/sel_header", $data);
            $this->load->view("admin/syafaat_input", $model);
            $this->load->view("admin/sel_footer");
        } else {
            redirect('login', 'refresh');
        }
    }

    public function add_pelayanan4() {
        if ($this->session->userdata('logged_in')) {
            $data['title'] = "Jadwal";
            $model['bulan'] = $this->input->get("bulan");
            $model['tahun'] = $this->input->get("tahun");

            if (empty($model['bulan'])) {
                $model['bulan'] = date("m");
            }
            if (empty($model['tahun'])) {
                $model['tahun'] = date("Y");
            }

            $model['data_array'] = array();
            foreach ($this->sel_model->get_list3($model['tahun'], $model['bulan'], "POS")->result() as $value) {
                $model['data_array'][] = explode("-", $value->tanggal)[2];
            }

            $this->load->view("admin/sel_header", $data);
            $this->load->view("admin/pos_input", $model);
            $this->load->view("admin/sel_footer");
        } else {
            redirect('login', 'refresh');
        }
    }

    public function insert_pelayanan1() {
        $tahun = $this->input->post("tahun");
        $bulan = sprintf('%02d', $this->input->post("bulan"));

        $this->sel_model->delete_by_tanggal($tahun, $bulan, "SUDIANG");
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "GABUNGAN");

        $list_tanggal = $this->input->post("tanggal");
        for ($index = 0; $index < count($list_tanggal); $index++) {
            $value = $list_tanggal[$index];
            $data['tanggal'] = "2014-$bulan-$value";
            foreach ($this->input->post("sudiang$value" . "_") as $value1) {
                $data['tugas'] = "SUDIANG";
                $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                if (empty($data['id_sel'])) {
                    $data['id_sel'] = date("Ym") . "0001";
                }
                $data['nama_sel'] = $value1;
                $this->sel_model->insert($data);
            }

            foreach ($this->input->post("gabungan$value" . "_") as $value1) {
                $data['tugas'] = "GABUNGAN";
                $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                if (empty($data['id_sel'])) {
                    $data['id_sel'] = date("Ym") . "0001";
                }
                $data['nama_sel'] = $value1;
                $this->sel_model->insert($data);
            }
        }
        redirect("admin/pelayanan");
    }

    public function insert_pelayanan2() {
        $tahun = $this->input->post("tahun");
        $bulan = sprintf('%02d', $this->input->post("bulan"));
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "PEDAL");

        $list_tanggal = $this->input->post("tanggal");
        for ($index = 0; $index < count($list_tanggal); $index++) {
            $value = $list_tanggal[$index];
            $data['tanggal'] = "2014-$bulan-$value";
            $data['tugas'] = "PEDAL";
            $data['id_sel'] = $this->sel_model->get_id()->row()->id;
            if (empty($data['id_sel'])) {
                $data['id_sel'] = date("Ym") . "0001";
            }
            $data['nama_sel'] = $this->input->post("pedal$value" . "_")[0];
            $this->sel_model->insert($data);
            echo "MM$index : " . $data['nama_sel'];
        }

        redirect("admin/pelayanan");
    }

    public function insert_pelayanan3() {
        $tahun = $this->input->post("tahun");
        $bulan = sprintf('%02d', $this->input->post("bulan"));
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "SYAFAAT");
        $list_tanggal = $this->input->post("tanggal");
        for ($index = 0; $index < count($list_tanggal); $index++) {
            $value = $list_tanggal[$index];
            $data['tanggal'] = "2014-$bulan-$value";
            foreach ($this->input->post("syafaat$value" . "_") as $value1) {
                $data['tugas'] = "SYAFAAT";
                $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                if (empty($data['id_sel'])) {
                    $data['id_sel'] = date("Ym") . "0001";
                }
                $data['nama_sel'] = $value1;
                $this->sel_model->insert($data);
            }
        }
        redirect("admin/pelayanan");
    }

    public function insert_pelayanan4() {
        $tahun = $this->input->post("tahun");
        $bulan = sprintf('%02d', $this->input->post("bulan"));
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "POS");
        $list_tanggal = $this->input->post("tanggal");
        for ($index = 0; $index < count($list_tanggal); $index++) {
            $value = $list_tanggal[$index];
            $data['tanggal'] = "2014-$bulan-$value";
            foreach ($this->input->post("pos$value" . "_") as $value1) {
                $data['tugas'] = "POS";
                $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                if (empty($data['id_sel'])) {
                    $data['id_sel'] = date("Ym") . "0001";
                }
                $data['nama_sel'] = $value1;
                $this->sel_model->insert($data);
            }
        }
        redirect("admin/pelayanan");
    }

    public function add_doa_malam() {
        if ($this->session->userdata('logged_in')) {
            $data['title'] = "Jadwal";
            $model['bulan'] = $this->input->get("bulan");
            $model['tahun'] = $this->input->get("tahun");

            if (empty($model['bulan'])) {
                $model['bulan'] = date("m");
            }
            if (empty($model['tahun'])) {
                $model['tahun'] = date("Y");
            }

            $list_sel = array();
            $array1 = array();
            $array2 = array();
            foreach ($this->sel_model->get_list3($model['tahun'], $model['bulan'], "PDB")->result() as $value) {
                $array1[] = $value->tanggal;
            }
            foreach ($this->sel_model->get_list3($model['tahun'], $model['bulan'], "SYAFAAT_MALAM")->result() as $value) {
                $array2[] = $value->tanggal;
            }
            $list_sel = array_unique(array_merge($array1, $array2));

            $model['data_array'] = array();
            foreach ($list_sel as $value) {
                $model['data_array'][] = explode("-", $value)[2];
            }

            $this->load->view("admin/header", $data);
            $this->load->view("admin/doa_malam_input", $model);
            $this->load->view("admin/footer");
        } else {
            redirect('login', 'refresh');
        }
    }

    public function insert_doa_malam() {
        $tahun = $this->input->post("tahun");
        $bulan = sprintf('%02d', $this->input->post("bulan"));
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "PDB");
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "SYAFAAT_MALAM");

        $list_tanggal = $this->input->post("tanggal");
        for ($index = 0; $index < count($list_tanggal); $index++) {
            $value = $list_tanggal[$index];
            $data['tanggal'] = "2014-$bulan-$value";
            $data['tugas'] = "PDB";
            $data['id_sel'] = $this->sel_model->get_id()->row()->id;
            if (empty($data['id_sel'])) {
                $data['id_sel'] = date("Ym") . "0001";
            }
            $data['nama_sel'] = $this->input->post("pdb$value" . "_")[0];
            $this->sel_model->insert($data);


            $data['tugas'] = "SYAFAAT_MALAM";
            $data['id_sel'] = $this->sel_model->get_id()->row()->id;
            if (empty($data['id_sel'])) {
                $data['id_sel'] = date("Ym") . "0001";
            }
            $data['nama_sel'] = $this->input->post("syafaat_malam$value" . "_")[0];
            $this->sel_model->insert($data);
        }

        redirect("admin/doa_malam");
    }

}
