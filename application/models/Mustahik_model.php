<?php

class Mustahik_model extends CI_Model {

    public function getDataMustahik()
    {
        return $this->db->get('tbl_mustahik')->result_array();
    }

    public function addDataMustahik()
    {
        $data = [
            'nama_mustahik' => htmlspecialchars($this->input->post('nama_mustahik')),
            'alamat_mustahik' => htmlspecialchars($this->input->post('alamat_mustahik'))
        ];

        $this->db->insert('tbl_mustahik', $data);
    }
}