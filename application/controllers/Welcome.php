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
		if (isset($_POST['login'])) {
			$this->form_validation->set_rules("email", "Email", "required");
			$this->form_validation->set_rules("password", "Password", "required");
		}
		if ($this->form_validation->run() == TRUE) {
			$email     = $_POST['email'];
			$password  = md5($_POST['password']);
			$query = $this->db->query("SELECT * FROM users WHERE uemail='" . $email . "' AND upassword='" . $password . "'");
			$result = $query->row_array();
			if ($result['uemail'] && $result['upassword']) {
				$this->session->set_flashdata("success", "Login Successfull");
				$_SESSION['user_logged'] = TRUE;
				$_SESSION['user'] = $result['uname'];
				$_SESSION['uid'] = $result['uid'];
				redirect("userHome/");
			} else {
				$this->session->set_flashdata("error", "Email or Password Incorrect . . .");
				redirect("welcome/login");
			}
		}
		$this->load->view('welcome/loginHeader');
		$this->load->view('welcome/login');
		$this->load->view('welcome/loginFooter');
	}
	public function signup()
	{
		if (isset($_GET)) {
			$data['email'] = $this->input->get('email');
		}
		if (isset($_POST['signup'])) {
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.uemail]');
			$this->form_validation->set_rules("fname", "Full name", "required");
			$this->form_validation->set_rules("password", "Password", "required|min_length[8]");

			$this->form_validation->set_message("is_unique", "{field} already exist");
		}
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'uemail'     => $_POST['email'],
				'uname'     => $_POST['fname'],
				'upassword'  => md5($_POST['password']),
			);
			$this->db->insert('users', $data);
			$this->session->set_flashdata("success", "Signup Successful! Login Now...");
			redirect("welcome/signup");
		}
		$this->load->view('welcome/signupHeader');
		$this->load->view('welcome/signup', $data);
		$this->load->view('welcome/signupFooter');
	}
	// public function password_check($str)
	// {
	// 	if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
	// 		return TRUE;
	// 	} else {
	// 		$this->form_validation->set_message("password_check", "{field} field must be aplha_numeric");
	// 		return FALSE;
	// 	}
	// }
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata("user");
		$this->session->unset_userdata("user_logged");
		redirect("welcome/login");
	}
}
