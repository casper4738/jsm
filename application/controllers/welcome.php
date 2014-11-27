<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index($id = 0) {
        $this->load->library('storage');
        $this->load->library('pagination');


        $config['base_url'] = 'http://localhost/jsm/welcome/';
        $config['total_rows'] = 200;
        $config['per_page'] = 7;
        $config['num_links'] = 2;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);


        $this->load->view('welcome_message');
    }

    public function page($id = 0) {
        $this->load->library('storage');
        $this->load->library('pagination');


        $config['base_url'] = 'http://localhost/jsm/welcome/page/';
        $config['total_rows'] = 200;
        $config['per_page'] = 1;
        $config['num_links'] = 2;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);


        $this->load->view('welcome_message');
    }

    public function pagination_demo($page = 1) {
        $this->load->library('pagination');
        try {
            $pagingConfig = $this->storage->initPagination("/jsm/welcome/", 200);
            $this->data["pagination_helper"] = $this->pagination;
            return $this->view();
        } catch (Exception $err) {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */