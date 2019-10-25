<?php
Class Model_Dashboard extends CI_Model {

    public function CountPriority($table,$where) {
        $this->db->select('prioritas');
        $this->db->from($table);
        $this->db->where('prioritas', $where);
        return $this->db->get()->num_rows();
    }
}

?>