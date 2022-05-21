<?php

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->goToDefaultPage();

        if ( $this->form_validation->run() == FALSE ) {
            
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
            
        } else {

            // panggil method private login 
            $this->_login();
        }
    }

    public function goToDefaultPage()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        } else if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        } else if ($this->session->userdata('role_id') > 2) {// jika ada yang role_idnya lebih dari 2 isikan ini:  
            redirect('linknya');
        }
    }

    private function _login() 
    {
        //panggil email dan password nya
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Cek apakah user terdaftar
        if( $user ) 
        {
            // cek apakah user aktif
            if ( $user['is_active'] == 1 ) {

                // jika aktif cek password nya
                if ( password_verify($password, $user['password'])) {

                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    if ( $user['role_id'] == 1 ) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }

                } else {

                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
                    Wrong password!.
                    </div>');
                    redirect('auth');
                }
                
            } else  {

                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
                Your email has not been activated!.
                </div>');
                redirect('auth');
            }

        } else {

            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
            Email has not been registered!!.
            </div>');
            redirect('auth');
        }
    }
    
    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email already registered!!, Try with another email'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[4]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|min_length[4]|matches[password1]');
        
        $this->goToDefaultPage();
        
        if ( $this->form_validation->run() == FALSE ) {

            $data['title'] = 'Registration Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        
        } else {

            //Siapkan token untuk user aktivasi dengan bilangan random
            $token = base64_encode(random_bytes(32));
            $data_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'date_created' => time()
            ];
            
            $this->db->insert('user_token', $data_token);
            $this->Auth_model->addUser();
            

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Congratulation your account successfully added, Please activated your account!.
            </div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ardiansyahdiar8@gmail.com',
            'smtp_pass' => 'Bakso_3241',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        // Load library email dari CI
        $this->email->initialize($config); 

        $this->email->from('ardiansyahdiar8@gmail.com', 'Diar A');
        $this->email->to($this->input->post('email'));

        if ( $type == 'verify' ) {
            $this->email->subject('Email Activation');
            $this->email->message('Click this link for verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ( $type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link for reset your password : <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return TRUE;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {   
        // Ambil data email data token yang berada di URL
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // Query ke table user untuk mendaptkan email user yang terdaftar
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Cek jika email user yang terdaftar sudah benar
        if ( $user ) {

            $token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ( $token ) {

                if ( time() - $token['date_created'] < (60 * 60 * 24)) {

                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
                    ' . $email .' has been activated!, Please login.
                    </div>');
                    redirect('auth');
                    
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
                    This token expired!!.
                    </div>');
                    redirect('auth'); 
                }

            } else {
                
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
                Invalid token!!.
                </div>');
                redirect('auth'); 
            }

        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
            Email has not been activated!!.
            </div>');
            redirect('auth');         
        }
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ( $this->form_validation->run() == FALSE ) {
            
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            
            // Cek email dari inputan user
            $email = $this->input->post('email');
            //query ke tabel user untuk mengambil email
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ( $user ) {

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
                Please check your email for reset your password.
                </div>');
                redirect('auth/forgotPassword');

            } else {

                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
                Email has not registered and activated!!.
                </div>');
                redirect('auth/forgotPassword');         
            }
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Your account has been logged out.
        </div>');
        redirect('auth');
    }

    public function forbidden()
    {
        $data['title'] = 'Forbidden Page';
        $this->load->view('templates/header', $data);
        $this->load->view('auth/forbidden');
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ( $user ) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ( $user_token) {

                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();

            } else {

                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
                Reset Password Failed!. Because token unknown! .
                </div>');
                redirect('auth');
            }

        } else {

            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
            Reset Password Failed!. Your email has not been registered!.
            </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        // Cek jika tidak ada session reset_email, maka paksa direct ke halaman auth, session hanya dijalankan jika click link yg dikirim melalui email
        if ( !$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'New password', 'trim|required|min_length[4]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat password', 'trim|required|min_length[4]|matches[password1]');

        if ( $this->form_validation->run() == FALSE ) {
            
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {

            //encrypt password nya 
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Your password has been changed. Please login
            </div>');
            redirect('auth');

        }
    }
}