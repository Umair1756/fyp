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

    // user login default page returns
    public function index()
    {
        $data['uid']            = $_SESSION['uid'];
        $data['boards']         = $this->userHomes->fetchBoards($data);
        $data['recentBoards']   = $this->userHomes->fetchRecentBoards($data);

        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/userHomePage', $data);
        $this->load->view('userHomePage/userHomePageFooter');
    }

    public function saveBoard()
    {
        if (isset($_POST['btnBoard'])) {
            $this->form_validation->set_rules("boardname", "Board name", "required|is_unique[board.name]");
        }

        if ($this->form_validation->run() == TRUE) {
            $data = array();
            $data = [
                'name'          => $this->input->post('boardname'),
                'created_at'    =>  date('Y-m-d H:i:s'),
                'updated_at'    =>  date('Y-m-d H:i:s'),
                'uid'           => $_SESSION['uid']
            ];

            $result = $this->userHomes->insertBoard($data);

            if ($result) {
                $data['msg'] = $this->session->set_flashdata("success", "Board is created, Now start your work");
                redirect('userHome/', $data);
            }
        } else {
            $this->session->set_flashdata("error", "Board name can't be <u>Empty</u> or <u>Same</u>");
            redirect('userHome/');
        }
    }
    public function boardBegin($boardid)
    {
        // board detail e.g: boards, lists and cards
        $data['boards']     = $this->userHomes->getBoardNames($boardid);
        $data['allBoards']  = $this->userHomes->getAllBoards($boardid);
        $data['lists']      = $this->userHomes->getAllLists($boardid);
        $data['cards']      = $this->userHomes->getAllCards($boardid);

        $this->load->view('boardHome/boardHomeHeader');
        $this->load->view('boardHome/boardHome', $data);
        $this->load->view('boardHome/boardHomeFooter');
    }
    public function saveList()
    {
        if (isset($_POST)) {
            $data = [
                "list_name"         => $this->input->post('list_name'),
                "board_id"          => $this->input->post('board_id'),
                "created_at"        =>  date('Y-m-d H:i:s'),
                "updated_at"        =>  date('Y-m-d H:i:s'),
                "uid"               => $_SESSION['uid']
            ];
            $result = $this->userHomes->saveList($data);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
        }
    }
    public function saveCard()
    {
        if (isset($_POST)) {
            $data = [
                "list_id"           => $this->input->post('list_id'),
                "board_id"          => $this->input->post('board_id'),
                "card_name"         => $this->input->post('cardtitle'),
                "due_date"          =>  date('Y-m-d H:i:s'),
                "created_at"        =>  date('Y-m-d H:i:s'),
                "updated_at"        =>  date('Y-m-d H:i:s'),
                "uid"               => $_SESSION['uid']
            ];
            $result = $this->userHomes->saveCard($data);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
        }
    }
    public function saveComment()
    {
        if (isset($_POST)) {
            $data = [
                "card_id"               =>  $this->input->post('card_id'),
                "comment_description"   =>  $this->input->post('txtComment'),
                "created_at"            =>  date('Y-m-d H:i:s'),
                "updated_at"            =>  date('Y-m-d H:i:s'),
                "uid"                   =>  $_SESSION['uid']
            ];
            $comments   = $this->userHomes->saveComment($data);
            $result     = $this->userHomes->getComment($comments);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
        }
    }
    public function saveSubTask()
    {
        if (isset($_POST)) {
            $data = [
                "card_id"               =>  $this->input->post('card_id'),
                "task_title"            =>  $this->input->post('txtSubtask'),
                "is_completed"          =>  0,
                "created_at"            =>  date('Y-m-d H:i:s'),
                "updated_at"            =>  date('Y-m-d H:i:s'),
            ];
            $responseData = [
                'subtasks'          => $this->userHomes->saveSubTask($data),
                'totalSubTasks'     => $this->userHomes->totalTasks($data['card_id']),
                'completeSubTasks'  => $this->userHomes->totalTasksCompleted($data['card_id']),
            ];
            die(print_r($responseData));
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($responseData));
        }
    }
    public function getCardDetail()
    {
        if (isset($_POST)) {
            $card_id = $this->input->post('card_id');
            $data = [
                'comments'  => $this->userHomes->getCardComments($card_id),
                'labels'    => $this->userHomes->getCardTag($card_id),
                'tasks'     => $this->userHomes->getSubgTasks($card_id),
                'getCard'   => $this->userHomes->getCard($card_id),
            ];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
    }
    public function updateCardData()
    {
        if (isset($_POST)) {
            $jsonData = $_POST['data'];
            $card_id = $jsonData[0];
            $tagData = [
                "card_id"       => $card_id,
                "tag_title"     => $jsonData[5],
                "created_at"    =>  date('Y-m-d H:i:s'),
                "updated_at"    =>  date('Y-m-d H:i:s'),
            ];
            $this->userHomes->deleteCardTag($card_id);
            $this->userHomes->saveCardTag($tagData);
            $this->userHomes->updateCardData($jsonData);
            $data['cardId']     = $jsonData[0];
            $data['cardTitle']  = $jsonData[1];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
    }
    public function userProfile()
    {
        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/userProfile');
        $this->load->view('userHomePage/userHomePageFooter');
    }
    public function userActivity()
    {
        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/userActivity');
        $this->load->view('userHomePage/userHomePageFooter');
    }
}
