<?php
if(!defined('BASEPATH')) exit('No Direct Script Access Allowed');
class Login extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        
    }
/*---------------------------------------------------------------------------------------------
|Function to login users
------------------------------------------------------------------------------------------------*/
    public function index()
    {
        $data   =   array();
        if($this->input->post('loginbtn'))
        {
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $userdata   = $this->login_model->selectuser($username,$password);
            if($userdata->num_rows()>0)
            {
                $row    =   $userdata->row();
                $user_details   =   array('username'    =>  $row->username,
                                            'firstname' =>  $row->firstname,
                                            'lastname' =>  $row->lastname,
                                            'id'        =>  $row->id,
                                            'is_logged_in'=>true
                );
                $this->session->set_userdata($user_details);
                redirect('admin');
            }
            else 
            {
                $this->session->set_flashdata('error', 'The username/password combination is not correct, please try again !!');
                redirect('login');
            }
        }
        $data['logo']   =   '';
        $this->load->view('login/login');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}


?>