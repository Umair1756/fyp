<?php
class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// $this->load->model('users');
		// $this->load->model('finanicalyears');
		// $this->load->model('setting_configurations');
	}

	function index()
	{
		redirect('welcome/intro_page');
	}

	public function intro_page()
	{

		// Redirect user if logged in.
		// auth_secure();

		// $data['finanicalyears'] = $this->finanicalyears->fetchAll();

		// $data['fn_id'] = $this->setting_configurations->fetchfn();

		// $this->load->library('form_validation');

		// $this->form_validation->set_rules('uname', 'Username', 'required');
		// $this->form_validation->set_rules('pass', 'Password', 'required');
		// $this->form_validation->set_rules('fn_dropdown', 'fn_dropdown', 'required');

		// // $this->form_validation->set_rules('mob_code', 'MobileCode', 'required|callback_has_match');

		// if ($this->form_validation->run() == false) {
		// 	// validation failed
		// 	//die(print($data['fn_id']));
		// 	$data['errors'] = isset($_POST['submit']) ? true : false;
		// 	$data['wrapper_class'] = 'login';
		// $this->load->view('template/loginheader');
		// $this->load->view('user/login');
		// $this->load->view('template/loginfooter');

		$this->load->view('welcome/welcomeHeader');
		$this->load->view('welcome/welcomeIndex');
		$this->load->view('welcome/welcomeFooter');
		// } else {

		// 	$response = $this->users->login_user($_POST);
		// 	// die(print_r($response));
		// 	$this->output
		// 		->set_content_type('application/json')
		// 		->set_output(json_encode($response));

		// 	// redirect('user/dashboard');
		// }
	}
	public function login()
	{
		$this->load->view('welcome/welcomeHeader');
		$this->load->view('welcome/login');
		$this->load->view('welcome/welcomeFooter');
	}
	public function signup()
	{
		$this->load->view('welcome/welcomeHeader');
		$this->load->view('welcome/signup');
		$this->load->view('welcome/welcomeFooter');
	}
	public function userhomepage()
	{
		$this->load->view('userHomePage/userHomePageHeader');
		$this->load->view('userHomePage/userHomePage');
		$this->load->view('userHomePage/userHomePageFooter');
	}
}
