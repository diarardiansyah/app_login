<?php

class Penerimaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penerimaan_model', 'penerimaan');
        $this->load->model('Zakat_model', 'zakat');
        $this->load->model('Petugas_model', 'petugas');
        $this->load->model('Muzakki_model', 'muzakki');
    }

    public function index()
    {
        $data['title'] = 'Data Penerimaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            
        $data['penerimaan'] = $this->penerimaan->getDataPenerimaan();
    
        if ( $this->input->post('keyword')) {
                
            $data['penerimaan'] = $this->penerimaan->searchDataPenerimaan();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penerimaan/index', $data);
        $this->load->view('templates/footer');

    }

    public function addNewData()
    {
        $data['title'] = 'Add New Data Penerimaan Zakat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('zakat_beras', 'Zakat Beras', 'required|trim');
        $this->form_validation->set_rules('zakat_mal', 'Zakat Mal', 'required|trim');
        $this->form_validation->set_rules('infaq', 'Infaq', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim|numeric');

        if ( $this->form_validation->run() == FALSE ) {
            
            $data['zakat'] = $this->zakat->getAllDataZakat();
            $data['petugas'] = $this->petugas->getAllData();
            $data['muzakki'] = $this->muzakki->getAllData();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/add-data', $data);
            $this->load->view('templates/footer');
        } else {

            $this->penerimaan->addDataPenerimaan();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Data penerimaan successfully added!.
            </div>');
            redirect('penerimaan');
        }
    }

    public function invoice($id_penerimaan) 
    {
        $data['title'] = 'Data Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['penerimaan'] = $this->penerimaan->getDataPenerimaanById($id_penerimaan);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penerimaan/invoice', $data);
        $this->load->view('templates/footer');
    }

    public function cetakInvoice($id_penerimaan)
    {
        $data['title'] = 'Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['penerimaan'] = $this->penerimaan->getDataPenerimaanById($id_penerimaan);

        $this->load->view('templates/header', $data);
        $this->load->view('penerimaan/cetak-invoice', $data);
    }

    public function changeData($id_penerimaan)
    {
        $data['title'] = 'Ubah Data Penerimaan Zakat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penerimaan'] = $this->penerimaan->getDataPenerimaanById($id_penerimaan);
        $data['zakat'] = $this->zakat->getAllDataZakat();
        $data['petugas'] = $this->petugas->getAllData();
        $data['muzakki'] = $this->muzakki->getAllData();

        $this->form_validation->set_rules('zakat_beras', 'Zakat Beras', 'required|trim');
        $this->form_validation->set_rules('zakat_mal', 'Zakat Mal', 'required|trim');
        $this->form_validation->set_rules('infaq', 'Infaq', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim|numeric');

        if ( $this->form_validation->run() == FALSE ) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/edit-data', $data);
            $this->load->view('templates/footer');

        } else {

            $this->penerimaan->changeData();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Data penerimaan has been changed.
            </div>');
            redirect('penerimaan');
        }
    }

    public function deleteData($id_penerimaan)
    {
        $this->penerimaan->deleteDataPenerimaan($id_penerimaan);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data penerimaan has been deleted.
        </div>');
        redirect('penerimaan');
    }
}