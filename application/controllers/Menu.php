<?php

class Menu  extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if( $this->form_validation->run() == FALSE ) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');

        } else {
            $data = ['menu' => $this->input->post('menu')];

            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            New Menu Successfully Added!.
            </div>');
            redirect('menu');
        }
        
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model');
        $data['submenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ( $this->form_validation->run() == FALSE ) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        
        } else { 

            $this->Menu_model->addSubMenu();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            New Submenu Successfully Added!.
            </div>');
            redirect('menu/submenu');

        }

    }
}