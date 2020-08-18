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
    // boards save operation
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
    // board next window manage after creation 
    public function boardBegin($boardid)
    {
        // board detail e.g: boards, lists and cards
        $data['boards']     = $this->userHomes->getBoardNames($boardid);
        $data['allBoards']  = $this->userHomes->getAllBoards($boardid);
        $data['lists']      = $this->userHomes->getAllLists($boardid);
        $data['cards']      = $this->userHomes->getAllCards($boardid);
        $data['totalTasks'] = $this->userHomes->getTotalTasks();

        // $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('boardHome/boardHomeHeader');
        $this->load->view('boardHome/boardHome', $data);
        $this->load->view('boardHome/boardHomeFooter');
    }
    // save list
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
    // update list_name
    public function updateListName()
    {
        if (isset($_POST)) {
            $data = [
                "list_id"           => $this->input->post('list_id'),
                "board_id"          => $this->input->post('board_id'),
                "list_name"         => $this->input->post('txtListName'),
                "created_at"        =>  date('Y-m-d H:i:s'),
                "updated_at"        =>  date('Y-m-d H:i:s'),
                "uid"               => $_SESSION['uid']
            ];
            // die(print_r($data));
            $this->userHomes->updateListName($data);
            $data = [
                'list_name' => $this->input->post('txtListName'),
                'list_id'   => $this->input->post('list_id'),
            ];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
    }
    // delete list forever
    public function deleteList()
    {
        if (isset($_POST)) {
            $list_id = $this->input->post('list_id');
            $this->userHomes->deleteList($list_id);
            $result['list_id'] = $this->input->post('list_id');
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
        }
    }
    // save card
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
    // comments create and save
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
            $comments                   = $this->userHomes->saveComment($data);
            $result                     = $this->userHomes->getComment($comments);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
        }
    }
    // subtask save
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
            // die(print_r($responseData));
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($responseData));
        }
    }
    // card detail in modal
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
    // delete card
    public function deleteCard()
    {
        if (isset($_POST)) {
            $card_id = $this->input->post('card_id');
            $this->userHomes->deleteCard($card_id);
            $result['card_id'] = $this->input->post('card_id');
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
        }
    }
    // delete task
    public function deleteTask()
    {
        if (isset($_POST)) {
            $task_id = $this->input->post('task_id');
            $this->userHomes->deleteTask($task_id);
            $result['task_id'] = $this->input->post('task_id');
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
        }
    }
    // update card data
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
            // print_r($jsonData);
            $this->userHomes->deleteCardTag($card_id);
            $this->userHomes->saveCardTag($tagData);
            $this->userHomes->updateCardData($jsonData);
            $data = [
                'card_name'     => $jsonData[1],
                'card_id'       => $jsonData[0],
                'description'   => $jsonData[2],
                'color'         => $jsonData[3],
            ];
            // die(print_r($jsonData));
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
    }
    // update card data
    public function updateTask()
    {
        if (isset($_POST)) {
            // die(print_r($_POST));
            $this->userHomes->updateTask($_POST);

            $response = [
                'task_id'       => $_POST['task_id'],
                'card_id'       => $_POST['card_id'],
                'isCompleted'   => $_POST['isCompleted'],
            ];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }
    // update card data
    public function cardDragable()
    {
        if (isset($_POST)) {
            // die(print_r($_POST));
            $this->userHomes->cardDragable($_POST);

            $response = [
                'list_id'       => $_POST['list_id'],
                'card_id'       => $_POST['card_id'],
            ];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }
    // update card data
    public function createActivity()
    {
        if (isset($_POST)) {
            $_POST['uid']        = $_SESSION['uid'];
            $_POST['created_at'] = DATE('Y-m-d H:i:s');
            $_POST['updated_at'] = DATE('Y-m-d H:i:s');
            $this->userHomes->createActivity($_POST);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(1));
        }
    }
    // user profile
    public function userProfile()
    {
        $uid = $_SESSION['uid'];
        $data['user'] = $this->userHomes->getCurrentUser($uid);
        $data['activity'] = $this->userHomes->getUserActivity($uid);
        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/userProfile', $data);
        $this->load->view('userHomePage/userHomePageFooter');
    }
    //update user profile
    public function updateUserProfile()
    {
        if (isset($_POST['update-user-profile'])) {
            $data = [
                'uname'         => $this->input->post('fname'),
                'username'      => $this->input->post('uname'),
                'updated_at'    => DATE('Y-m-d H:i:s'),
                'uid'           => $_SESSION['uid'],
            ];
            $user = $this->userHomes->updateUserProfile($data);
            if ($user) {
                $data['msg'] = $this->session->set_flashdata("success", "Profile Info. has been updated . . . .");
                redirect('userhome/userProfile/', $data);
            }
        }
    }
    //change user password View
    public function changePassword()
    {
        $uid = $_SESSION['uid'];
        $data['user'] = $this->userHomes->getCurrentUser($uid);
        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/changePwd', $data);
        $this->load->view('userHomePage/userHomePageFooter');
    }
    //change password working
    public function updatePwd()
    {
        $uid = $_SESSION['uid'];
        $oldPwdDb = $this->userHomes->getCurrentPwd($uid);
        if (isset($_POST['update-pwd'])) {
            $data = [
                'oldPwd'        => md5($this->input->post('oldPwd')),
                'newPwd'        => md5($this->input->post('newPwd')),
                'reTypePwd'     => md5($this->input->post('reTypePwd')),
                'updated_at'    => DATE('Y-m-d H:i:s'),
                'uid'           => $_SESSION['uid'],
            ];
            if ($data['oldPwd'] == $oldPwdDb['upassword']) {
                if ($data['newPwd'] == $data['reTypePwd']) {
                    $pwd = $this->userHomes->updatePwd($data);
                } else {
                    $data['msg'] = $this->session->set_flashdata("error", "New passwords are not same . . . .");
                    redirect('userhome/changePassword/', $data);
                }
            } else {
                $data['msg'] = $this->session->set_flashdata("error", "Old password did'nt match . . . .");
                redirect('userhome/changePassword/', $data);
            }
            if ($pwd) {
                $data['msg'] = $this->session->set_flashdata("success", "Password has been updated . . . .");
                redirect('userhome/userProfile/', $data);
            }
        }
    }
}
