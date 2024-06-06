<?php
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = $this->Barang_model->get_all_barang();
        echo json_encode($data);
    }

    public function view($id)
    {
        $data = $this->Barang_model->get_barang($id);
        if (empty($data)) {
            show_404();
        }
        echo json_encode($data);
    }

    public function create()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array('status' => 'error', 'message' => validation_errors()));
        } else {
            $data = array(
                'kode' => $this->input->post('kode'),
                'nama_barang' => $this->input->post('nama_barang'),
                'harga' => $this->input->post('harga')
            );
            $this->Barang_model->insert_barang($data);
            echo json_encode(array('status' => 'success', 'message' => 'Data barang berhasil ditambahkan'));
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array('status' => 'error', 'message' => validation_errors()));
        } else {
            $data = array(
                'kode' => $this->input->post('kode'),
                'nama_barang' => $this->input->post('nama_barang'),
                'harga' => $this->input->post('harga')
            );
            $this->Barang_model->update_barang($id, $data);
            echo json_encode(array('status' => 'success', 'message' => 'Data barang berhasil diperbarui'));
        }
    }

    public function delete($id)
    {
        $this->Barang_model->delete_barang($id);
        echo json_encode(array('status' => 'success', 'message' => 'Data barang berhasil dihapus'));
    }


}