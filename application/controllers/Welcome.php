<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller 
{
	function __construct()
		{
			parent::__construct();
			$this->load->model('Admin_dashboard');
			$this->load->database();
			$this->load->helper(array('form','url','captcha'));
			$this->load->library(array('session','form_validation','email'));
		}
	function index()
	    {
	    	$email_check = $this->session->userdata('email');
	    	if(empty($email_check))
	    		{
	    			$this->load->view('login');
	    		}
	    		else
    			{
    				redirect('Dashboard');
    			}
		}
	function login_from()
		{

			$data = array(
				'email' 	=> $this->input->post('email') ,
				'password' => $this->input->post('password')
			);
			
			$result = $this->Admin_dashboard->login($data);
			if($result)
				{
					$email = array('email'=>$this->input->post('email'));
					$this->session->set_userdata($email);
					redirect('Dashboard');
				}
				else
				{
					redirect('Welcome');
				}
		}
		function sign_out()
		{
			$this->session->unset_userdata('email');
			redirect('Welcome');
		}

	

	public function test_model()

	{

		// $ci=&get_instance();

		$this->load->library('mailclass');

		// $this->load->library('');

		$user_mail = 'parasharamantyagi@gmail.com';

		$message = 'you have a new order';

		$data = $this->mailclass->some_method($user_mail,$message);

		if($data){

			echo 'hii world';

		}else{

			echo 'die';

		}

	}

}

