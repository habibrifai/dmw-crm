<?php
Class Model_Transaksi extends CI_Model {

    public function getDataTransaksi($table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('order_date', 'desc');
        return $this->db->get()->result_array();
    }

    public function addDataTransaksi($data) {
        $this->db->insert('order', $data);
    }

    public function ganti_status($id_order,$data) {
    	$this->db->where('idorder', $id_order);
        $this->db->update('order', $data);
    }
}

?>