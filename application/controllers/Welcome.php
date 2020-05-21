<?php
class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		redirect('welcome/intropage');
	}

	public function intropage()
	{
		$this->load->view('welcome/welcomeHeader');
		$this->load->view('welcome/welcomeIndex');
		$this->load->view('welcome/welcomeFooter');
	}
	public function login()
	{
		if ($this->session->userdata('error_msg')) {
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}
		// trim|required|valid_email|xss_clean
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['error_msg'] = 'Some problems occured, please try again.';
			$this->load->view('welcome/loginHeader');
			$this->load->view('welcome/login');
			$this->load->view('welcome/loginFooter');
		}
	}
	public function signup()
	{
		$this->load->view('welcome/signupHeader');
		$this->load->view('welcome/signup');
		$this->load->view('welcome/signupFooter');
	}
	public function userhomepage()
	{
		$this->load->view('userHomePage/userHomePageHeader');
		$this->load->view('userHomePage/userHomePage');
		$this->load->view('userHomePage/userHomePageFooter');
	}
}
