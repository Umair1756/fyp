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
		// email get from url and post it in the "Email field"
		if (isset($_GET)) {
			$data['email'] = $this->input->get('email');
		}

		// 
		if (isset($_POST['signup'])) {
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.uemail]');
			$this->form_validation->set_rules("fname", "Full name", "required");
			$this->form_validation->set_rules("username", "Username", "required|is_unique[users.username]");
			$this->form_validation->set_rules("password", "Password", "required|min_length[8]");

			$this->form_validation->set_message("is_unique", "{field} already exist");
		}

		// 
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'uemail'     => $_POST['email'],
				'uname'     => $_POST['fname'],
				'username'     => $_POST['username'],
				'upassword'  => md5($_POST['password']),
			);
			$this->db->insert('users', $data);
			$this->session->set_flashdata("success", "Signup Successful! Login Now...");
			redirect("welcome/signup");
		}

		// 
		$this->load->view('welcome/signupHeader');
		$this->load->view('welcome/signup', $data);
		$this->load->view('welcome/signupFooter');
	}
	public function authEmail($email, $subject, $msg, $token, $from)
	{
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '60';

		$config['smtp_user']    = 'promag321347@gmail.com';  //Important
		$config['smtp_pass']    = 'tkkfmbdhnhslensk';        //Important

		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html';                           // or html
		$config['validation'] = TRUE;                           // bool whether to validate email or not

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->from($from);
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($msg);

		if ($this->email->send()) {
			// do nothing
		} else {
			show_error($this->email->print_debugger());
		}
	}
	public function resetEmail()
	{
		$this->load->view('welcome/welcomeHeader');
		$this->load->view('welcome/resetEmailPage');
		$this->load->view('welcome/welcomeFooter');
	}
	public function resetLink()
	{
		$email = $this->input->post('email');
		$from = "promag321347@gmail.com";
		$getEmail = $this->db->query("SELECT * FROM users WHERE uemail='" . $email . "'")->result_array();

		if (count($getEmail) > 0) {
			$token = rand(1000, 9999);
			$this->db->query("UPDATE users SET upassword=$token WHERE uemail='" . $email . "'");

			$msg = "<div style='background: #5abe7e; padding: .75rem 1.25rem;margin-bottom: 1rem;border-radius: .25rem;color: white;text-align: center;'><h1>ProMag</h1><p>Click on link to <br><a style='color: #fff' href='" . base_url("index.php/welcome/reset?tokenIs=") . $token . "'>Reset Password</a></p></div>";

			$this->authEmail($email, 'Reset Password', $msg, $token, $from);
			$this->session->set_flashdata("success", "Check your Email...");

			return redirect("welcome/resetEmail");
		} else {
			$this->session->set_flashdata("error", "This Email " . $email . " is not associated with any account");
			return redirect("welcome/resetEmail");
		}
	}
	public function reset()
	{
		$data['token'] = $this->input->get('tokenIs');
		$_SESSION['token'] = $data['token'];

		$this->load->view("welcome/resetPasswordPage");
	}
	public function updatePassword()
	{
		$_SESSION['token'];
		$data = $this->input->post();
		if (md5($data['password']) == md5($data['reTypePassword'])) {
			$this->db->query("UPDATE users SET upassword='" . md5($data['password']) . "' WHERE upassword='" . $_SESSION['token'] . "'");
		}
		$this->session->set_flashdata("success", "Password has been reset...");
		redirect("welcome/login");
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata("user");
		$this->session->unset_userdata("user_logged");
		redirect("welcome/login");
	}
}
