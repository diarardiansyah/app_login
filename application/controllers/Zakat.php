<?php

class Zakat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Zakat_model', 'zakat');
    }

    public function index()
    {
        $data['title'] = 'Jenis Zakat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('jenis_zakat', 'Jenis Zakat', 'required|trim');

        if( $this->form_validation->run() == FALSE ) {
            $data['zakat'] = $this->zakat->getAllDataZakat();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('zakat/index', $data);
            $this->load->view('templates/footer');

        } else {
            $this->zakat->addDataZakat();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Data jenis zakat successfully added.
            </div>');
            redirect('zakat');
        }
    }

    public function delete_type($id_jenis_zakat)
    {
        $this->zakat->deleteDataJenis($id_jenis_zakat);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data jenis zakat has been deleted!.
        </div>');
        redirect('zakat');
    }

}