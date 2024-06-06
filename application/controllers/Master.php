<?php
class Master extends CI_Controller
{
    /* public function __construct()
    {
       parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        } 
    }*/

    public function index()
    {
        //$this->load->view('master');
    }

    public function produk()
    {
        $this->load->view('layout/header');
        $this->load->view('master/produk');
        $this->load->view('layout/footer');
    }

    public function kategori()
    {
        $this->load->view('master/kategori');
    }
}