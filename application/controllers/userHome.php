<?php
class Userhome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('userHomes');
        if (!isset($_SESSION['user_logged'])) {
            $this->session->set_flashdata("error", "Session Destroyed. Login Account....");
            redirect("welcome/login", "refresh");
        }
    }

    public function index()
    {
        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/userHomePage');
        $this->load->view('userHomePage/userHomePageFooter');
    }
    public function saveTitle()
    {
        if (isset($_POST['btnBoard'])) {
            $this->form_validation->set_rules("titlename", "Title name", "required|is_unique[projecttitle.ptname]");
        }

        if ($this->form_validation->run() == TRUE) {
            $data = array();
            $data = [
                'ptname' => $this->input->post('titlename'),
                'uid' => $_SESSION['uid']
            ];
            // die(print_r($data));

            $result = $this->userHomes->insertTitle($data);
            // return $result;
            if ($result) {
                $data['msg'] = $this->session->set_flashdata("success", "Board is created, Now start your work");
                redirect('userHome/boardBegin', $data);
            }
        } else {
            $this->session->set_flashdata("error", "Board Name Can't be empty");
            redirect('userHome/');
        }
    }
    public function boardBegin()
    {
        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/boardHome');
        $this->load->view('userHomePage/userHomePageFooter');
    }
}
