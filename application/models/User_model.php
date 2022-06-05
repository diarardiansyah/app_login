<?php

class User_model extends CI_Model {

    public function getSumInfaq()
    {
        return $this->db->query("SELECT SUM(infaq) AS total_infaq, SUM(zakat_mal) AS total_zakat_mal, SUM(zakat_beras) AS jumlah_zakat_beras FROM tbl_penerimaan")->result_array();
    }

    public function getSumMustahik()
    {
        return $this->db->query("SELECT COUNT(nama_mustahik) AS total_mustahik FROM tbl_mustahik")->result_array();
    }
}

