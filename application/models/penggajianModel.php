<?php

class PenggajianModel extends CI_model {

    public function get_data($table) {
        return $this->db->get($table);
    }

    public function insertData($data, $table) {
        $this->db->insert($table, $data);
    }

}

?>