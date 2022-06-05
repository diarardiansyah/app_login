<?php

class Penerimaan_model extends CI_Model {

    public function getDataPenerimaan()
    {
        $this->db->select('*');
        $this->db->from('tbl_penerimaan');
        $this->db->join('tbl_jenis_zakat', 'tbl_jenis_zakat.id_jenis_zakat = tbl_penerimaan.id_jenis_zakat');
        $this->db->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_penerimaan.id_petugas');
        $this->db->join('tbl_muzakki', 'tbl_muzakki.id_muzakki = tbl_penerimaan.id_muzakki');

        return $this->db->get()->result_array();
    }

    public function addDataPenerimaan()
    {
        $data = [
            'id_jenis_zakat' => htmlspecialchars($this->input->post('id_jenis_zakat')),
            'id_petugas' => htmlspecialchars($this->input->post('id_petugas')),
            'id_muzakki' => htmlspecialchars($this->input->post('id_muzakki')),
            'zakat_beras' => htmlspecialchars($this->input->post('zakat_beras')),
            'zakat_mal' => htmlspecialchars($this->input->post('zakat_mal')),
            'infaq' => htmlspecialchars($this->input->post('infaq')),
            'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
            'status' => htmlspecialchars($this->input->post('status'))
        ];

        $this->db->insert('tbl_penerimaan', $data);
    }

    public function getDataPenerimaanById($id_penerimaan)
    {
        $this->db->select('*');
        $this->db->from('tbl_penerimaan');
        $this->db->join('tbl_jenis_zakat', 'tbl_jenis_zakat.id_jenis_zakat = tbl_penerimaan.id_jenis_zakat');
        $this->db->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_penerimaan.id_petugas');
        $this->db->join('tbl_muzakki', 'tbl_muzakki.id_muzakki = tbl_penerimaan.id_muzakki');
        $this->db->where('id_penerimaan', $id_penerimaan);

        return $this->db->get()->row_array();
    }

    public function changeData()
    {
        $data = [
            'id_jenis_zakat' => htmlspecialchars($this->input->post('id_jenis_zakat')),
            'id_petugas' => htmlspecialchars($this->input->post('id_petugas')),
            'id_muzakki' => htmlspecialchars($this->input->post('id_muzakki')),
            'zakat_beras' => htmlspecialchars($this->input->post('zakat_beras')),
            'zakat_mal' => htmlspecialchars($this->input->post('zakat_mal')),
            'infaq' => htmlspecialchars($this->input->post('infaq')),
            'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
            'status' => htmlspecialchars($this->input->post('status'))
        ];

        $this->db->where('id_penerimaan', $this->input->post('id_penerimaan'));
        $this->db->update('tbl_penerimaan', $data);
    }

    public function searchDataPenerimaan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_petugas', $keyword);
        $this->db->or_like('jenis_zakat', $keyword);
        return $this->getDataPenerimaan();
    }

    public function deleteDataPenerimaan($id_penerimaan)
    {
        $this->db->where('id_penerimaan', $id_penerimaan);
        $this->db->delete('tbl_penerimaan');
    }
}