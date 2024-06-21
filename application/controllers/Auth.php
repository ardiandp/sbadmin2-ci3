<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function login() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/login1');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $admin = $this->Admin_model->login($username, $password);

            if ($admin) {
                $admin_data = array(
                    'id' => $admin->id,
                    'username' => $admin->username,
                    'nama' => $admin->nama,
                    'email' => $admin->email,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($admin_data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
