<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model('user','',TRUE);
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('admin');
        } else {
            $this->load->view('login');
        }
    }

    function verify() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login2');
        } else {
            redirect('admin');
        }
    }

    function check_database($password) {
        $username = $this->input->post('username');
        $result = $this->user->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

}
