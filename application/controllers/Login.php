<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
		$this->load->model('AdminModel');
    }

    public function index()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $post = $this->input->post();
            $this->form_validation->set_rules('username','USER','required');
            $this->form_validation->set_rules('password','PASSWORD','required');

            if($this->form_validation->run()) {
                $login = $this->AdminModel->CekLogin($post['username'], sha1($post['password']));
                if ($login===true)
                {
                    $data = array(
                        'username'  => 'johndoe',
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data);
                    redirect('/admin/anak_magang/', 'refresh');
                }else{
                    $this->session->set_flashdata('gagal', 'User atau Password Salah!');
                    redirect('login');
                }
            }
        }

        $this->load->view('admin/login');
    }
}