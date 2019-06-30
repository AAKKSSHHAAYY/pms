<?php

//  session_start(); //we need to start session in order to access it through CI

class User_dashboard extends CI_Controller
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
    }
    public function show()
    {
        $this->load->view('dashboard/project_submit');
    }
    
}
