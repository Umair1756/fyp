<?php
class Userhome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('userHomes');
        if (!isset($_SESSION['user_logged'])) {
            $this->session->set_flashdata("error", "Session Destroyed. Login Again");
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
        $data = array();
        if (isset($_POST)) {
            $data = [
                'ptname' => $this->input->post('titlename'),
                'uid' => $_SESSION['uid']
            ];
            $result = $this->userHomes->insertTitle($data);
            // return $result;
            if ($result) {
                $data['msg'] = $this->session->set_flashdata("success", "Board is created, Now start your work");
                redirect('userHome/boardBegin', $data);
            }
        }
    }
    public function boardBegin()
    {
        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/boardHome');
        $this->load->view('userHomePage/userHomePageFooter');
    }
}
