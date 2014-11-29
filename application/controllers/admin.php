<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('storage');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $this->berita();
        } else {
            redirect('login', 'refresh');
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('beranda', 'refresh');
    }

    public function pelayanan() {
        $this->load->model('sel_model');
        $data['title'] = "Jadwal";

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

        $this->load->view("admin/header", $data);
        $this->load->view("admin/jadwal_content", $model);
        $this->load->view("admin/footer");
    }

    public function doa_malam() {
        $this->load->model('sel_model');
        $data['title'] = "Jadwal";

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


        $this->load->view("admin/header", $data);
        $this->load->view("admin/doa_malam_content", $model);
        $this->load->view("admin/footer");
    }

    public function slider() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('slider_model');
            $model['slider1'] = $this->slider_model->get_detail('file1')->row();
            $model['slider2'] = $this->slider_model->get_detail('file2')->row();
            $model['slider3'] = $this->slider_model->get_detail('file3')->row();
            $model['slider4'] = $this->slider_model->get_detail('file4')->row();
            $model['error1'] = "";
            $model['error2'] = "";
            $model['error3'] = "";
            $model['error4'] = "";

            if ($this->input->post("simpan")) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '0';
                $config['max_height'] = '0';
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);

                if (!empty($_FILES['file1']['tmp_name'])) {
                    $config['file_name'] = "file1";
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload($config['file_name'])) {
                        $error1 = $this->upload->display_errors();
                        $model['error1'] = "ERROR : " . $error1;
                    } else {
                        $model['error1'] = "";
                        $file_data = $this->upload->data();
                        $data = array(
                            'id_file' => $config['file_name'],
                            'file_ext' => $file_data['file_ext'],
                        );
                        $this->slider_model->update($data);
                        $config_image['image_library'] = 'gd2';
                        $config_image['overwrite'] = TRUE;
                        $config_image['image_library'] = 'gd2';
                        $config_image['source_image'] = $file_data['full_path'];
                        $config_image['new_image'] = './uploads/' . $file_data['file_name'];
                        $config_image['width'] = '830';
                        $config_image['height'] = '431';
                        $config_image['maintain_ratio'] = FALSE;
                        $this->load->library('image_lib', $config_image);
                        $this->image_lib->resize();
                    }
                }

                if (!empty($_FILES['file2']['tmp_name'])) {
                    $config['file_name'] = "file2";
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload($config['file_name'])) {
                        $error2 = $this->upload->display_errors();
                        $model['error2'] = "ERROR : " . $error2;
                    } else {
                        $model['error2'] = "";
                        $file_data = $this->upload->data();
                        $data = array(
                            'id_file' => $config['file_name'],
                            'file_ext' => $file_data['file_ext'],
                        );
                        $this->slider_model->update($data);
                        $config_image['image_library'] = 'gd2';
                        $config_image['overwrite'] = TRUE;
                        $config_image['image_library'] = 'gd2';
                        $config_image['source_image'] = $file_data['full_path'];
                        $config_image['new_image'] = './uploads/' . $file_data['file_name'];
                        $config_image['width'] = '830';
                        $config_image['height'] = '431';
                        $config_image['maintain_ratio'] = FALSE;
                        $this->load->library('image_lib', $config_image);
                        $this->image_lib->resize();
                    }
                }

                if (!empty($_FILES['file3']['tmp_name'])) {
                    $config['file_name'] = "file3";
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload($config['file_name'])) {
                        $error3 = $this->upload->display_errors();
                        $model['error3'] = "ERROR : " . $error3;
                    } else {
                        $model['error3'] = "";
                        $file_data = $this->upload->data();
                        $data = array(
                            'id_file' => $config['file_name'],
                            'file_ext' => $file_data['file_ext'],
                        );
                        $this->slider_model->update($data);
                        $config_image['image_library'] = 'gd2';
                        $config_image['overwrite'] = TRUE;
                        $config_image['image_library'] = 'gd2';
                        $config_image['source_image'] = $file_data['full_path'];
                        $config_image['new_image'] = './uploads/' . $file_data['file_name'];
                        $config_image['width'] = '830';
                        $config_image['height'] = '431';
                        $config_image['maintain_ratio'] = FALSE;
                        $this->load->library('image_lib', $config_image);
                        $this->image_lib->resize();
                    }
                }

                if (!empty($_FILES['file4']['tmp_name'])) {
                    $config['file_name'] = "file4";
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload($config['file_name'])) {
                        $error4 = $this->upload->display_errors();
                        $model['error4'] = "ERROR : " . $error4;
                    } else {
                        $model['error4'] = "";
                        $file_data = $this->upload->data();
                        $data = array(
                            'id_file' => $config['file_name'],
                            'file_ext' => $file_data['file_ext'],
                        );
                        $this->slider_model->update($data);
                        $config_image['image_library'] = 'gd2';
                        $config_image['overwrite'] = TRUE;
                        $config_image['image_library'] = 'gd2';
                        $config_image['source_image'] = $file_data['full_path'];
                        $config_image['new_image'] = './uploads/' . $file_data['file_name'];
                        $config_image['width'] = '830';
                        $config_image['height'] = '431';
                        $config_image['maintain_ratio'] = FALSE;
                        $this->load->library('image_lib', $config_image);
                        $this->image_lib->resize();
                    }
                }
            }


            $data['title'] = "Slider";
            $this->load->view('admin/header', $data);
            $this->load->view('admin/slider_content', $model);
            $this->load->view('admin/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function tentang() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('content_model');
            $data['title'] = "Tentang JSM";
            $model['content'] = $this->content_model->get_detail(1)->row();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/about_content', $model);
            $this->load->view('admin/about_footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function berita() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('berita_model');
            $data['title'] = "Berita";
            $model['list'] = $this->berita_model->get_all_berita();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/news_content', $model);
            $this->load->view('admin/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function kategori() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('berita_model');
            $data['title'] = "Kategori";
            $model['list'] = $this->berita_model->get_list_kategori();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/kategori_content', $model);
            $this->load->view('admin/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function event() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('event_model');
            $data['title'] = "Event";
            $model['list'] = $this->event_model->get_list();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/event_content', $model);
            $this->load->view('admin/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function korbid($string = "music") {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('korbid_model');
            $data['title'] = "Korbid";

            $model['korbid'] = $this->korbid_model->get_detail($string)->row();
            $model['id'] = $string;

            $this->load->view('admin/header', $data);
            $this->load->view('admin/korbid_content', $model);
            $this->load->view('admin/about_footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function sel($string = "A") {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('sel_model');
            $data['title'] = "Sel " . $string;
            $this->load->view('admin/header', $data);
            $model['par1'] = "Sel " . $string;
            $model['par2'] = "Jadwal Tugas POS, Shafaat Komunitas, Shafaat DF";
            $model['par3'] = $string;
            $model['list'] = $this->sel_model->get_list($string);
            $this->load->view('admin/sel_content', $model);
            $this->load->view('admin/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function galeri() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('galeri_model');
            $data['title'] = "Galeri";
            $model['list'] = $this->galeri_model->get_list();
            $model['error'] = "";
            $this->load->view('admin/header', $data);
            $this->load->view('admin/galeri_content', $model);
            $this->load->view('admin/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

}
