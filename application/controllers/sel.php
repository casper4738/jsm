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

    public function pelayanan() {
        $data['title'] = "Jadwal Tugas";
        $model['title'] = strtoupper("JADWAL PELAYANAN $string");

        $model['bulan1'] = $this->input->get("bulan1");
        $model['tahun1'] = $this->input->get("tahun1");
        $model['bulan2'] = $this->input->get("bulan2");
        $model['tahun2'] = $this->input->get("tahun2");

        if (empty($model['bulan1'])) {
            $model['bulan1'] = date("m");
        }
        if (empty($model['tahun1'])) {
            $model['tahun1'] = date("Y");
        }
        if (empty($model['bulan2'])) {
            $model['bulan2'] = date("m");
        }
        if (empty($model['tahun2'])) {
            $model['tahun2'] = date("Y");
        }

        $this->load->view('sel_header', $data);
        $this->load->view('pelayanan_content', $model);
        $this->load->view('footer');
    }
    
    public function english_mass() {
        $data['title'] = "Jadwal Tugas";
        $model['title'] = strtoupper("JADWAL PELAYANAN $string");

        $model['bulan1'] = $this->input->get("bulan1");
        $model['tahun1'] = $this->input->get("tahun1");
        $model['bulan2'] = $this->input->get("bulan2");
        $model['tahun2'] = $this->input->get("tahun2");

        if (empty($model['bulan1'])) {
            $model['bulan1'] = date("m");
        }
        if (empty($model['tahun1'])) {
            $model['tahun1'] = date("Y");
        }
        if (empty($model['bulan2'])) {
            $model['bulan2'] = date("m");
        }
        if (empty($model['tahun2'])) {
            $model['tahun2'] = date("Y");
        }

        $this->load->view('sel_header', $data);
        $this->load->view('english_mass_content', $model);
        $this->load->view('footer');
    }
    
    public function doa_malam() {
        $data['title'] = "Jadwal Tugas";
        $model['title'] = strtoupper("JADWAL PELAYANAN $string");

        $model['bulan1'] = $this->input->get("bulan1");
        $model['tahun1'] = $this->input->get("tahun1");
        $model['bulan2'] = $this->input->get("bulan2");
        $model['tahun2'] = $this->input->get("tahun2");

        if (empty($model['bulan1'])) {
            $model['bulan1'] = date("m");
        }
        if (empty($model['tahun1'])) {
            $model['tahun1'] = date("Y");
        }
        if (empty($model['bulan2'])) {
            $model['bulan2'] = date("m");
        }
        if (empty($model['tahun2'])) {
            $model['tahun2'] = date("Y");
        }

        $this->load->view('sel_header', $data);
        $this->load->view('doa_malam_content', $model);
        $this->load->view('footer');
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

    public function add_pelayanan() {
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

    public function insert_pelayanan() {
        $tahun = $this->input->post("tahun");
        $bulan = sprintf('%02d', $this->input->post("bulan"));

        $this->sel_model->delete_by_tanggal($tahun, $bulan, "SUDIANG");
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "GABUNGAN");
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "PEDAL");
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "SYAFAAT");
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "POS");

        $list_tanggal = $this->input->post("tanggal");
        for ($index = 0; $index < count($list_tanggal); $index++) {
            $value = $list_tanggal[$index];
            $data['tanggal'] = "2014-$bulan-$value";
            echo $data['tanggal'];
            foreach ($this->input->post("sudiang$value" . "_") as $value1) {
                $str = explode(",", $value1);
                foreach ($str as $row) {
                    $data['tugas'] = "SUDIANG";
                    $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                    if (empty($data['id_sel'])) {
                        $data['id_sel'] = date("Ym") . "0001";
                    }
                    $data['nama_sel'] = $row;
                    $this->sel_model->insert($data);
                }
            }
            foreach ($this->input->post("gabungan$value" . "_") as $value1) {
                $str = explode(",", $value1);
                foreach ($str as $row) {
                    $data['tugas'] = "GABUNGAN";
                    $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                    if (empty($data['id_sel'])) {
                        $data['id_sel'] = date("Ym") . "0001";
                    }
                    $data['nama_sel'] = $row;
                    $this->sel_model->insert($data);
                }
            }
            foreach ($this->input->post("pedal$value" . "_") as $value1) {
                $str = explode(",", $value1);
                foreach ($str as $row) {
                    $data['tugas'] = "PEDAL";
                    $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                    if (empty($data['id_sel'])) {
                        $data['id_sel'] = date("Ym") . "0001";
                    }
                    $data['nama_sel'] = $row;
                    $this->sel_model->insert($data);
                }
            }
            foreach ($this->input->post("syafaat$value" . "_") as $value1) {
                $str = explode(",", $value1);
                foreach ($str as $row) {
                    $data['tugas'] = "SYAFAAT";
                    $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                    if (empty($data['id_sel'])) {
                        $data['id_sel'] = date("Ym") . "0001";
                    }
                    $data['nama_sel'] = $row;
                    $this->sel_model->insert($data);
                }
            }
            foreach ($this->input->post("pos$value" . "_") as $value1) {
                $str = explode(",", $value1);
                foreach ($str as $row) {
                    $data['tugas'] = "POS";
                    $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                    if (empty($data['id_sel'])) {
                        $data['id_sel'] = date("Ym") . "0001";
                    }
                    $data['nama_sel'] = $row;
                    $this->sel_model->insert($data);
                }
            }
            echo "<br/>";
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
            foreach ($this->sel_model->get_list3($model['tahun'], $model['bulan'], "SYAFAAT_MALAM1")->result() as $value) {
                $array2[] = $value->tanggal;
            }
            foreach ($this->sel_model->get_list3($model['tahun'], $model['bulan'], "SYAFAAT_MALAM2")->result() as $value) {
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
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "SYAFAAT_MALAM1");
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "SYAFAAT_MALAM2");

        $list_tanggal = $this->input->post("tanggal");
        for ($index = 0; $index < count($list_tanggal); $index++) {
            $value = $list_tanggal[$index];
            $data['tanggal'] = "2014-$bulan-$value";
            foreach ($this->input->post("pdb$value" . "_") as $value1) {
                $str = explode(",", $value1);
                foreach ($str as $row) {
                    $data['tugas'] = "PDB";
                    $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                    if (empty($data['id_sel'])) {
                        $data['id_sel'] = date("Ym") . "0001";
                    }
                    $data['nama_sel'] = $row;
                    $this->sel_model->insert($data);
                }
            }

            foreach ($this->input->post("syafaat1$value" . "_") as $value1) {
                $str = explode(",", $value1);
                foreach ($str as $row) {
                    $data['tugas'] = "SYAFAAT_MALAM1";
                    $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                    if (empty($data['id_sel'])) {
                        $data['id_sel'] = date("Ym") . "0001";
                    }
                    $data['nama_sel'] = $row;
                    $this->sel_model->insert($data);
                }
            }
            foreach ($this->input->post("syafaat2$value" . "_") as $value1) {
                $str = explode(",", $value1);
                foreach ($str as $row) {
                    $data['tugas'] = "SYAFAAT_MALAM2";
                    $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                    if (empty($data['id_sel'])) {
                        $data['id_sel'] = date("Ym") . "0001";
                    }
                    $data['nama_sel'] = $row;
                    $this->sel_model->insert($data);
                }
            }
        }

        redirect("admin/pelayanan");
    }

    public function add_english_mass() {
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
            foreach ($this->sel_model->get_list3($model['tahun'], $model['bulan'], "ENGLISH_MASS")->result() as $value) {
                $model['data_array'][] = explode("-", $value->tanggal)[2];
            }

            $this->load->view("admin/header", $data);
            $this->load->view("admin/english_mass_input", $model);
            $this->load->view("admin/footer");
        } else {
            redirect('login', 'refresh');
        }
    }

    public function insert_english_mass() {
        $tahun = $this->input->post("tahun");
        $bulan = sprintf('%02d', $this->input->post("bulan"));
        $this->sel_model->delete_by_tanggal($tahun, $bulan, "ENGLISH_MASS");

        $list_tanggal = $this->input->post("tanggal");
        for ($index = 0; $index < count($list_tanggal); $index++) {
            $value = $list_tanggal[$index];
            $data['tanggal'] = "2014-$bulan-$value";
            foreach ($this->input->post("english_mass$value" . "_") as $value1) {
                $str = explode(",", $value1);
                foreach ($str as $row) {
                    $data['tugas'] = "ENGLISH_MASS";
                    $data['id_sel'] = $this->sel_model->get_id()->row()->id;
                    if (empty($data['id_sel'])) {
                        $data['id_sel'] = date("Ym") . "0001";
                    }
                    $data['nama_sel'] = $row;
                    $this->sel_model->insert($data);
                }
            }
        }

        redirect("admin/pelayanan");
    }

}
