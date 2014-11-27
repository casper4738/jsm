<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class galeri extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('galeri_model');
        $this->load->library('storage');
    }

    public function index() {
        $data['title'] = "Galeri";
        $model['list'] = $this->galeri_model->get_galeri(0);
        
        $this->load->library('pagination');
        $config = $this->storage->init_pagination("galeri/page/", 12, $this->galeri_model->get_count()->row()->id);
        $this->pagination->initialize($config);
        
        $this->load->view('gallery_header', $data);
        $this->load->view('gallery_content', $model);
        $this->load->view('footer');
    }
    
    public function page($val=0) {
        $data['title'] = "Galeri";
        $model['list'] = $this->galeri_model->get_galeri($val);
        
        $this->load->library('pagination');
        $config = $this->storage->init_pagination("galeri/page/", 12, $this->galeri_model->get_count()->row()->id);
        $this->pagination->initialize($config);
        
        $this->load->view('gallery_header', $data);
        $this->load->view('gallery_content', $model);
        $this->load->view('footer');
    }
    
    public function detail($id=0) {
        $data['title'] = "Galeri";
        $model['row'] = $this->galeri_model->get_detail($id)->row();
        
        $this->load->view('gallery_header', $data);
        $this->load->view('gallery_detail', $model);
        $this->load->view('footer');
    }

    public function foto($id = 0) {
        $galeri = $this->galeri_model->get_detail($id)->row();
        $image_properties = array(
            'src' => "./asset/eltre/elfinder/files/images/$galeri->id_galeri$galeri->file_ext",
        );
        echo img($image_properties);
    }

    public function add() {
        $data['title'] = "Galeri";
        $model = array(
            'id_galeri' => "",
            'judul_foto' => "",
            'tanggal_foto' => date("Y-m-d"),
            'keterangan' => "",
            'file_ext' => "",
            'error' => "",
        );
        $model['id_galeri'] = $this->galeri_model->get_id()->row()->id;
        if (empty($model['id_galeri'])) {
            $model['id_galeri'] = date("Ym") . "0001";
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/galeri_add', $model);
        $this->load->view('admin/event_footer');
    }

    public function edit($id = 0) {
        $data['title'] = "Galeri";
        $model['galeri'] = $this->galeri_model->get_detail($id)->row();
        $model['error'] = "";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/galeri_edit', $model);
        $this->load->view('admin/event_footer');
    }

    public function hal($val1, $val2) {
        $data['title'] = "Galeri";
        $model['album'] = $val1;
        $model['hal'] = $val2;
        $model['num_rows'] = $this->galeri_model->get_num_rows()->num_rows();
        $model['list'] = $this->galeri_model->get_galeri($val1, ($val2 - 1) * 9);
        $this->load->view('gallery_header', $data);
        $this->load->view('gallery_all_photo', $model);
        $this->load->view('footer');
    }

    public function insert() {
        $config['upload_path'] = './asset/eltre/elfinder/files/images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['overwrite'] = TRUE;
        $config['image_width'] = '800';
        $config['file_name'] = $this->input->post("string1");
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $data['title'] = "Galeri";
            $model = array(
                'id_galeri' => $this->input->post("string1"),
                'judul_foto' => $this->input->post("string2"),
                'tanggal_foto' => date("Y-m-d", strtotime($this->input->post("string3"))),
                'keterangan' => $this->input->post("string5"),
                'file_ext' => $file_data['file_ext'],
                'error' => $error['error'],
            );

            $this->load->view('admin/header', $data);
            $this->load->view('admin/galeri_add', $model);
            $this->load->view('admin/event_footer');
        } else {
            $file_data = $this->upload->data();
            $max_width = 800;
            if ($file_data['image_width'] > $max_width) {
                $config_image['image_library'] = 'gd2';
                $config_image['overwrite'] = TRUE;
                $config_image['image_library'] = 'gd2';
                $config_image['source_image'] = $file_data['full_path'];
                $config_image['new_image'] = './asset/eltre/elfinder/files/images/' . $file_data['file_name'] . "" . $file_data['file_ext'];
                $config_image['width'] = '800';
                $config_image['height'] = '1';
                $config_image['maintain_ratio'] = TRUE;
                $config_image['master_dim'] = 'width';
                $this->load->library('image_lib', $config_image);
                $this->image_lib->resize();
            }
            $data = array(
                'id_galeri' => $file_data['file_name'],
                'judul_foto' => $this->input->post("string2"),
                'tanggal_foto' => date("Y-m-d", strtotime($this->input->post("string3"))),
                'keterangan' => $this->input->post("string5"),
                'file_ext' => $file_data['file_ext'],
            );
            $this->galeri_model->insert($data);
            redirect("admin/galeri");
        }
    }

    public function update() {
        $config['upload_path'] = './asset/eltre/elfinder/files/images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['overwrite'] = TRUE;
        $config['image_width'] = '800';
        $config['file_name'] = $this->input->post("string1");
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $data['title'] = "Galeri";
            $model = array(
                'judul_foto' => $this->input->post("string2"),
                'tanggal_foto' => date("Y-m-d", strtotime($this->input->post("string3"))),
                'keterangan' => $this->input->post("string5"),
                'file_ext' => $file_data['file_ext'],
                'error' => $error['error'],
            );

            $str1 = trim($error['error']);
            $str2 = trim("You did not select a file to upload.");

            if (strpos($str1, $str2) >= 0) {
                $data = array(
                    'judul_foto' => $this->input->post("string2"),
                    'tanggal_foto' => date("Y-m-d", strtotime($this->input->post("string3"))),
                    'keterangan' => $this->input->post("string5")
                );

                print_r($data);

                $id = $this->input->post("string1");
                $this->galeri_model->update($data, $id);
                redirect("admin/galeri");
            } else {
                $this->load->view('admin/header', $data);
                $this->load->view('admin/galeri_add', $model);
                $this->load->view('admin/event_footer');
            }
        } else {
            $file_data = $this->upload->data();
            $max_width = 800;
            if ($file_data['image_width'] > $max_width) {
                $config_image['image_library'] = 'gd2';
                $config_image['overwrite'] = TRUE;
                $config_image['image_library'] = 'gd2';
                $config_image['source_image'] = $file_data['full_path'];
                $config_image['new_image'] = './asset/eltre/elfinder/files/images/' . $file_data['file_name'] . "" . $file_data['file_ext'];
                $config_image['width'] = '800';
                $config_image['height'] = '1';
                $config_image['maintain_ratio'] = TRUE;
                $config_image['master_dim'] = 'width';
                $this->load->library('image_lib', $config_image);
                $this->image_lib->resize();
            }
            $data = array(
                'judul_foto' => $this->input->post("string2"),
                'tanggal_foto' => date("Y-m-d", strtotime($this->input->post("string3"))),
                'keterangan' => $this->input->post("string5"),
                'file_ext' => $file_data['file_ext'],
            );
            $id = $this->input->post("string1");
            $this->galeri_model->update($data, $id);
            redirect("admin/galeri");
        }
    }

    public function delete($id = 0) {
        $this->galeri_model->delete($id);
        redirect("admin/galeri");
    }

}
