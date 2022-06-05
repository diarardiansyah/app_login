<?php

class Muzakki_model extends CI_Model {

    public function getAllData()
    {
        return $this->db->get('tbl_muzakki')->result_array();
    }

    public function addDataMuzakki()
    {
        $data = [
            'nama_muzakki' => htmlspecialchars($this->input->post('nama_muzakki')),
            'jumlah_jiwa' => htmlspecialchars($this->input->post('jumlah_jiwa')),
            'nama_anggota_keluarga' => htmlspecialchars($this->input->post('nama_anggota_keluarga')),
            'nomor_hp' => htmlspecialchars($this->input->post('nomor_hp')),
            'alamat' => htmlspecialchars($this->input->post('alamat'))
        ];

        $this->db->insert('tbl_muzakki', $data);
    }

    public function deleteDataMuzakki($id_muzakki)
    {
        $this->db->delete('tbl_muzakki', ['id_muzakki' => $id_muzakki]);
    }

    public function getMuzakkiById($id_muzakki)
    {
        return $this->db->get_where('tbl_muzakki', ['id_muzakki' => $id_muzakki])->row_array();
    }
}