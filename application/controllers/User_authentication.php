<?php

//  session_start(); //we need to start session in order to access it through CI

class User_Authentication extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('Login_database');

        // load projects model
      
    }

    // Show login page
    public function index()
    {
        $this->load->view('login_form');
    }

    // Show registration page
    public function user_registration_show()
    {
        $this->load->view('registration_form');
    }

    // Validate and store registration data in database
    public function new_user_registration()
    {
        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration_form');
        } else {
            if ($this->input->post('Password') != $this->input->post('password_confirm')) {
                $data['message'] = 'Password do not match';
                $this->load->view('registration_form', $data);
            }
            $data = array(
                'user_name' => $this->input->post('username'),
                'user_email' => $this->input->post('email_value'),
                'user_password' => $this->input->post('password')
            );
            $result = $this->Login_database->registration_insert($data);
            if ($result == TRUE) {
                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('login_form', $data);
            } else {
                $data['message_display'] = 'Username already exist!';
                $this->load->view('registration_form', $data);
            }
        }
    }

    // Check for user login process
    public function user_login_process()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                redirect('user/dashboard/index','location');
            } else {
                $this->index();
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->Login_database->login($data);
            if ($result == TRUE) {

                $username = $this->input->post('username');
                $result = $this->Login_database->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->user_name,
                        'email' => $result[0]->user_email,
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    
                    redirect('user/dashboard/index');
                   
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login_form', $data);
            }
        }
    }

    // Logout from admin page
    public function logout()
    {
        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
       redirect('/user_authentication/index') ;
               // $this->load->view('login_form', $data);
    }
    public function test()
    {

        $this->load->view('rege');
    }
}
