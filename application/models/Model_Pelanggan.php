<?php
Class Model_Pelanggan extends CI_Model {

    // Read data using username and password
    public function ShowPelanggan($table) {
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->get()->result_array();
    }

    public function showPelangganPrioritas($table,$prioritas) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('prioritas', $prioritas);
        return $this->db->get()->result_array();
    }

    public function ShowProfilePelanggan($id_pelanggan,$table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('idpelanggan', $id_pelanggan);
        return $this->db->get()->result_array();
    }

    public function ShowProfilePelangganArray($id_pelanggan,$table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('idpelanggan', $id_pelanggan);
        return $this->db->get()->row();
    }

    public function SaveProfileData($data,$id_pelanggan,$table){
        $this->db->where('idpelanggan', $id_pelanggan);
        $this->db->update($table, $data);
    }

    public function getNamaPelanggan(){
        $this->db->select('name, idpelanggan');
        $this->db->from('pelanggan');
        return $this->db->get()->result_array();
    }

    public function gantiDiscUltah($id_pelanggan, $data){
        $this->db->where('idpelanggan', $id_pelanggan);
        $this->db->update('pelanggan', $data);
    }

    public function getDiskonUltah($id_pelanggan) {
        $this->db->select('disc_birthday');
        $this->db->from('pelanggan');
        $this->db->where('idpelanggan', $id_pelanggan);
        return $this->db->get()->row();
    }

    public function getPrioritas($id_pelanggan) {
        $this->db->select('prioritas');
        $this->db->from('pelanggan');
        $this->db->where('idpelanggan', $id_pelanggan);
        return $this->db->get()->row();
    }

    public function getJumlahTransaksi($id_pelanggan) {
        $this->db->select('disc_counter');
        $this->db->from('pelanggan');
        $this->db->where('idpelanggan', $id_pelanggan);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->row();
        }
    }

    public function getTransaksi($id_pelanggan) {
        $this->db->select('transaction_count');
        $this->db->from('pelanggan');
        $this->db->where('idpelanggan', $id_pelanggan);
        return $this->db->get()->row();
    }  
    
    public function getLastTransaksi($id_pelanggan) {
        $this->db->select('order_date');
        $this->db->from('order');
        $this->db->where('idpelanggan', $id_pelanggan);
        $this->db->order_by('order_date', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function getNama($id_pelanggan) {
        $this->db->select('name');
        $this->db->from('pelanggan');
        $this->db->where('idpelanggan', $id_pelanggan);
        return $this->db->get()->row();
    }

    public function addData($data) {
        $this->db->insert('pelanggan', $data);
    }
}

?>