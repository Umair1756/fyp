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
        $data['recentBoards'] = $this->userHomes->fetchRecentBoards($data);

        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/userHomePage', $data);
        $this->load->view('userHomePage/userHomePageFooter');
    }
    public function saveTitle()
    {
        if (isset($_POST['btnBoard'])) {
            $this->form_validation->set_rules("titlename", "Title name", "required|is_unique[boardtitle.ptname]");
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
                redirect('userHome/', $data);
            }
        } else {
            $this->session->set_flashdata("error", "Board name can't be <u>Empty</u> or <u>Same</u>");
            redirect('userHome/');
        }
    }
    public function boardBegin($boardtitleid)
    {
        $data['boards'] = $this->userHomes->getBoardNames($boardtitleid);

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
    public function saveListName()
    {
        if (isset($_POST)) {
            $data = [
                "list_name"         => $this->input->post('input_list_name'),
                "boardtitle_id"     => $this->input->post('board_id'),
                'uid'               => $_SESSION['uid']
            ];
            $result = array();
            $result = $this->userHomes->saveList($data);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
        }
    }
}
