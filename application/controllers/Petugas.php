<?php

class Petugas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Petugas_model', 'petugas');
    }

    public function index()
    {
        $data['title'] = 'Data Amil Zakat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['petugas'] = $this->petugas->getAllData();

        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim');

        if ( $this->form_validation->run() == FALSE ) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('petugas/index', $data);
            $this->load->view('templates/footer');
        } else { 

            $this->petugas->addDataPetugas();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Data petugas successfully added.
            </div>');
            redirect('petugas');
        }

    }

    public function changeData($id_petugas)
    {
        $data['title'] = 'Change Data Petugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['petugas'] = $this->petugas->getDataById($id_petugas);

        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim');

        if ( $this->form_validation->run() == FALSE ) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('petugas/change-data', $data);
            $this->load->view('templates/footer');
        } else {

            $this->petugas->changeData();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Data petugas has been changed.
            </div>');
            redirect('petugas');
        }
    }

    public function deleteData($id_petugas)
    {
        $this->petugas->deletePetugas($id_petugas);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data petugas has been deleted.
        </div>');
        redirect('petugas');
    }
    
}