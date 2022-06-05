<?php

class Mustahik extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Mustahik_model', 'mustahik');
    }

    public function index()
    {
        $data['title'] = 'Data Mustahik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['mustahik'] = $this->mustahik->getDataMustahik();

        $this->form_validation->set_rules('nama_mustahik', 'Nama Mustahik', 'required|trim');
        $this->form_validation->set_rules('alamat_mustahik', 'Alamat Mustahik', 'required|trim');

        if ( $this->form_validation->run() == FALSE ) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mustahik/index', $data);
            $this->load->view('templates/footer');
        } else {
            
            $this->mustahik->addDataMustahik();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Data mustahik successfully added.
            </div>');
            redirect('mustahik');
        }
    }
}