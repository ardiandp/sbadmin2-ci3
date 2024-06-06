<?php
class Barang_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_barang()
    {
        $query = $this->db->get('barang');
        return $query->result_array();
    }

    public function get_barang($id)
    {
        $query = $this->db->get_where('barang', array('id' => $id));
        return $query->row_array();
    }

    public function insert_barang($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function update_barang($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('barang', $data);
    }

    public function delete_barang($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('barang');
    }
}
