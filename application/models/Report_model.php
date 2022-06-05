<?php

class Report_model extends CI_Model {

    public function getDataZakat()
    {
        $tgl_dari = $this->input->get('tgl_dari');
        $sampai_tgl = $this->input->get('sampai_tgl');

        // $this->db->select('*');
        // $this->db->from('tbl_penerimaan');
        // $this->db->join('tbl_jenis_zakat', 'tbl_jenis_zakat.id_jenis_zakat = tbl_penerimaan.id_jenis_zakat');
        // $this->db->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_penerimaan.id_petugas');
        // $this->db->join('tbl_muzakki', 'tbl_muzakki.id_muzakki = tbl_penerimaan.id_muzakki');
        // $this->db->where(date('tanggal_pembayaran') > $tgl_dari);
        // $this->db->where(date('tanggal_pembayaran') < $sampai_tgl);

        // return $this->db->get()->result_array();

        return $this->db->query("SELECT tbl_penerimaan.*, tbl_penerimaan.id_penerimaan, tbl_jenis_zakat.        jenis_zakat, tbl_petugas.nama_petugas, tbl_muzakki.nama_muzakki 
        FROM tbl_penerimaan 
        INNER JOIN tbl_jenis_zakat ON tbl_penerimaan.id_jenis_zakat = tbl_jenis_zakat.id_jenis_zakat 
        INNER JOIN tbl_petugas ON tbl_penerimaan.id_petugas = tbl_petugas.id_petugas 
        INNER JOIN tbl_muzakki ON tbl_penerimaan.id_muzakki = tbl_muzakki.id_muzakki 
        AND DATE(tanggal_pembayaran) >= '$tgl_dari' 
        AND DATE(tanggal_pembayaran) <= '$sampai_tgl'")->result_array();
    }
}