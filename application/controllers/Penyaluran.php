<?php

class Penyaluran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penyaluran_model', 'penyaluran');
        $this->load->model('Zakat_model', 'zakat');
        $this->load->model('Mustahik_model', 'mustahik');
    }

    public function index()
    {
        $data['title'] = 'Data Penyaluran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penyaluran'] = $this->penyaluran->getAllData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penyaluran/index', $data);
        $this->load->view('templates/footer');
    }

    public function addNewData()
    {
        $data['title'] = 'Add Data Penyaluran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('jumlah_beras', 'Jumlah Beras', 'required|trim|numeric');
        $this->form_validation->set_rules('jumlah_uang', 'Jumlah Uang', 'required|trim');
        $this->form_validation->set_rules('status_penyaluran', 'Status Penyaluran', 'required|trim|numeric');

        if( $this->form_validation->run() == FALSE ) {
            
            $data['penyaluran'] = $this->penyaluran->getAllData();
            $data['zakat'] = $this->zakat->getAllDataZakat();
            $data['mustahik'] = $this->mustahik->getDataMustahik();
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penyaluran/add-data', $data);
            $this->load->view('templates/footer');
        } else {

            $this->penyaluran->addDataPenyaluran();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Data penyaluran successfully added!.
            </div>');
            redirect('penyaluran');
        }
    }

    public function changeData($id_penyaluran)
    {
        $data['title'] = 'Edit Data Penyaluran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('jumlah_beras', 'Jumlah Beras', 'required|trim|numeric');
        $this->form_validation->set_rules('jumlah_uang', 'Jumlah Uang', 'required|trim');
        $this->form_validation->set_rules('status_penyaluran', 'Status Penyaluran', 'required|trim|numeric');

        if( $this->form_validation->run() == FALSE ) {
            
            $data['penyaluran'] = $this->penyaluran->getDataPenyaluranById($id_penyaluran);
            $data['zakat'] = $this->zakat->getAllDataZakat();
            $data['mustahik'] = $this->mustahik->getDataMustahik();
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penyaluran/edit-data', $data);
            $this->load->view('templates/footer');
        } else {

            $this->penyaluran->changeDataPenyaluran();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Data penyaluran has been updated!.
            </div>');
            redirect('penyaluran');
        }
    }

    public function deleteData($id_penyaluran)
    {
        $this->penyaluran->deleteDataPenyaluran($id_penyaluran);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data penyaluran has been deleted!.
        </div>');
        redirect('penyaluran');

    }
}