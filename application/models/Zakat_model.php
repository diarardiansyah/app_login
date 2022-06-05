<?php

class Zakat_model extends CI_Model {

    public function getAllDataZakat()
    {
        return $this->db->get('tbl_jenis_zakat')->result_array();
    }

    public function addDataZakat()
    {
        $data = [ 
            'jenis_zakat' => htmlspecialchars($this->input->post('jenis_zakat'))
        ];

        $this->db->insert('tbl_jenis_zakat', $data);
    }

    public function deleteDataJenis($id_jenis_zakat)
    {
        $this->db->delete('tbl_jenis_zakat', ['id_jenis_zakat' => $id_jenis_zakat]);
    }
}