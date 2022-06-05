<?php

class Petugas_model extends CI_Model {

    public function getAllData()
    {
        return $this->db->get('tbl_petugas')->result_array();
    }

    public function getDataById($id_petugas) 
    {
        return $this->db->get_where('tbl_petugas', ['id_petugas' => $id_petugas])->row_array();
    }

    public function addDataPetugas()
    {
        $data = [
            'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas')),
            'nomor_hp' => htmlspecialchars($this->input->post('nomor_hp'))
        ];

        $this->db->insert('tbl_petugas', $data);
    }

    public function changeData()
    {
        $id_petugas = $this->input->post('id_petugas');
        $data = [
            'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas')),
            'nomor_hp' => htmlspecialchars($this->input->post('nomor_hp'))
        ];
        
        $this->db->where('id_petugas', $id_petugas);
        $this->db->update('tbl_petugas', $data);
    }

    public function deletePetugas($id_petugas)
    {
        $this->db->delete('tbl_petugas', ['id_petugas' => $id_petugas]);
    }
}