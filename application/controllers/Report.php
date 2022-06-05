<?php

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model', 'report');
    }

    public function index()
    {
        $data['title'] = 'Report Zakat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['report'] = $this->report->getDataZakat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/footer');
    }
}