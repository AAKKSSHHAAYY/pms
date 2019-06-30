<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('projects_model');
        $this->load->model('Login_database');
        $this->load->model('user/Dashboard_model','dashboard_model');
        // Load form validation library
        $this->load->library('form_validation');
        $this->load->library('upload');
    }
    public function index()
    {
        $session_data = $this->session->userdata('logged_in');
        $result = $this->Login_database->get_user_information($session_data['email']);
        $user_data['projects_data'] = $this->projects_model->get_user_projects($result[0]->id);
        $this->load->view('dashboard/dashboard', $user_data);
    }
    public function upload()
    {
        $this->load->view('dashboard/project_submit');
    }
    public function save_project()
    {
        $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
        $this->form_validation->set_rules('decription', 'Project Description', 'trim|required');
        $this->form_validation->set_rules('made_by', 'Made by', 'trim|required');
        $this->form_validation->set_rules('written_in', 'written In language', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("dashboard/project_submit");  
        } else {
            $result = $this->Login_database->get_user_information($session_data['email']);
            $data = $this->input->post();
            $inser_data = array(
                'user_id'=>$result[0]->id,
                'project_name'=>$data['project_name'],
            );

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '100';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);            
        }
    }
}
