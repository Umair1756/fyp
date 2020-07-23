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
        $data['uid'] = $_SESSION['uid'];
        $data['ptitles'] = $this->userHomes->fetchBoards($data);
        // die(print_r($_SESSION['uid']));
        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/userHomePage', $data);
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

            $result = $this->userHomes->insertTitle($data);

            if ($result) {
                $data['msg'] = $this->session->set_flashdata("success", "Board is created, Now start your work");
                redirect('userHome/boardBegin', $data);
            }
        } else {
            $this->session->set_flashdata("error", "Board name can't be <u>Empty</u> or <u>Same</u>");
            redirect('userHome/');
        }
    }
    public function boardBegin()
    {
        $data['ptitles'] = $this->userHomes->fetchBoards();

        $this->load->view('boardHome/boardHomeHeader');
        $this->load->view('boardHome/boardHome', $data);
        $this->load->view('boardHome/boardHomeFooter');
    }
    public function userProfile()
    {
        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/userProfile');
        $this->load->view('userHomePage/userHomePageFooter');
    }
}
