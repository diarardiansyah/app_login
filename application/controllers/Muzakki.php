<?php

class Muzakki extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Muzakki_model', 'muzakki');
    }

    public function index()
    {
        $data['title'] = 'Data Muzakki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['muzakki'] = $this->muzakki->getAllData();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('muzakki/index', $data);
        $this->load->view('templates/footer');
        
    }

    public function addDataMuzakki()
    {
        $data['title'] = 'Add Data Muzakki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        
        $this->form_validation->set_rules('nama_muzakki', 'Nama Muzakki', 'required|trim');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        
        if ( $this->form_validation->run() == FALSE ) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('muzakki/add-data', $data);
            $this->load->view('templates/footer');

        } else {

            $this->muzakki->addDataMuzakki();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Data muzakki successfully added.
            </div>');
            redirect('muzakki');
        }
    }

    public function deleteData($id_muzakki)
    {
        $this->muzakki->deleteDataMuzakki($id_muzakki);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data muzakki has been deleted.
        </div>');
        redirect('muzakki');
    }

    public function detail($id_muzakki)
    {
        $data['title'] = 'Detail Muzakki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['muzakki'] = $this->muzakki->getMuzakkiById($id_muzakki);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('muzakki/detail', $data);
        $this->load->view('templates/footer');
    }

}