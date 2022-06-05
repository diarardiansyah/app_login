<?php

class Penyaluran_model extends CI_Model {

    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('tbl_penyaluran');
        $this->db->join('tbl_jenis_zakat', 'tbl_jenis_zakat.id_jenis_zakat = tbl_penyaluran.id_jenis_zakat');
        $this->db->join('tbl_mustahik', 'tbl_mustahik.id_mustahik = tbl_penyaluran.id_mustahik');

        return $this->db->get()->result_array();
    }

    public function getDataPenyaluranById($id_penyaluran)
    {
        $this->db->select('*');
        $this->db->from('tbl_penyaluran');
        $this->db->join('tbl_jenis_zakat', 'tbl_jenis_zakat.id_jenis_zakat = tbl_penyaluran.id_jenis_zakat');
        $this->db->join('tbl_mustahik', 'tbl_mustahik.id_mustahik = tbl_penyaluran.id_mustahik');
        $this->db->where('id_penyaluran', $id_penyaluran);

        return $this->db->get()->row_array();
    }

    public function addDataPenyaluran()
    {
        $data = [
            'id_jenis_zakat' => htmlspecialchars($this->input->post('id_jenis_zakat')),
            'id_mustahik' => htmlspecialchars($this->input->post('id_mustahik')),
            'tanggal_penyaluran' => htmlspecialchars($this->input->post('tanggal_penyaluran')),
            'jumlah_beras' => htmlspecialchars($this->input->post('jumlah_beras')),
            'jumlah_uang' => htmlspecialchars($this->input->post('jumlah_uang')),
            'status_penyaluran' => htmlspecialchars($this->input->post('status_penyaluran'))
        ];

        $this->db->insert('tbl_penyaluran', $data);
    }

    public function changeDataPenyaluran()
    {
        $id_penyaluran = $this->input->post('id_penyaluran');
        $data = [
            'id_jenis_zakat' => htmlspecialchars($this->input->post('id_jenis_zakat')),
            'id_mustahik' => htmlspecialchars($this->input->post('id_mustahik')),
            'tanggal_penyaluran' => htmlspecialchars($this->input->post('tanggal_penyaluran')),
            'jumlah_beras' => htmlspecialchars($this->input->post('jumlah_beras')),
            'jumlah_uang' => htmlspecialchars($this->input->post('jumlah_uang')),
            'status_penyaluran' => htmlspecialchars($this->input->post('status_penyaluran'))
        ];

        $this->db->where('id_penyaluran', $id_penyaluran);
        $this->db->update('tbl_penyaluran', $data);
    }

    public function deleteDataPenyaluran($id_penyaluran)
    {
        $this->db->delete('tbl_penyaluran', ['id_penyaluran' => $id_penyaluran]);
    }
}