<?php
class Beranda extends CI_Controller
{
    public function index()
    {
        $data['judul']=" Halaman Beranda";
        $this->load->view('layout/header'); // ini adalah template header
        $this->load->view('beranda');
        $this->load->view('layout/footer'); // ini adalah template footer
    }

    public function biodata()
    {
        $data['judul']=" Halaman Beranda";
        $this->load->view('layout/header'); // ini adalah template header
        $this->load->view('beranda', $data);
        $this->load->view('layout/footer'); // ini adalah template footer
    }
}