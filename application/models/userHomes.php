<?php
class Userhomes extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_logged'])) {
            $this->session->set_flashdata("error", "You are no longer log in .!! Login Again");
            redirect("welcome/login", "refresh");
        }
    }

    function insertBoard($boards)
    {
        return $this->db->insert('board', $boards);
    }
    function fetchBoards($userId)
    {
        $result = $this->db->query("SELECT * from board WHERE uid='" . $userId['uid'] . "' ORDER BY id DESC LIMIT 3 ");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
    function fetchRecentBoards($userId)
    {
        $result = $this->db->query("SELECT * from board WHERE uid='" . $userId['uid'] . "' ORDER BY created_at DESC LIMIT 3 ");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
    function getBoardNames($boardid)
    {
        $result = $this->db->query("SELECT * from board WHERE id=$boardid;");
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return false;
        }
    }
    function getAllBoards($boardid)
    {
        $result = $this->db->query("SELECT * from board WHERE id=$boardid;");
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return false;
        }
    }
    function getAllLists($boardid)
    {
        $result = $this->db->query("SELECT * from board_list WHERE board_id=$boardid;");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
    function getAllCards($boardid)
    {
        $result = $this->db->query("SELECT COUNT(comment.id) AS totalComments, board_card.*,users.uname
        FROM board_card
        INNER JOIN users ON board_card.uid=users.uid
        LEFT JOIN comment ON comment.card_id=board_card.id
        GROUP BY board_card.id");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
    function getTotalTasks()
    {
        $result = $this->db->query("SELECT COUNT(card_task.id) AS totalTasks, board_card.*,users.uname
        FROM board_card
        INNER   JOIN users      ON board_card.uid   = users.uid
        LEFT    JOIN card_task  ON board_card.id    = card_task.card_id
        GROUP BY board_card.id");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
    function saveList($listData)
    {
        $this->db->insert("board_list", $listData);
        $id = $this->db->insert_id();
        $query = $this->db->get_where('board_list', array('id' => $id));
        return $query->row_array();
    }
    function updateListName($data)
    {
        $query = $this->db->query("UPDATE board_list SET list_name='" . $data['list_name'] . "', board_id='" . $data['board_id'] . "',uid='" . $data['uid'] . "',created_at='" . date("Y-m-d H:i:s") . "',updated_at='" . date("Y-m-d H:i:s") . "' 
        WHERE id='" . $data['list_id'] . "'");
        return $query;
    }
    function deleteList($list_id)
    {
        $this->db->delete('board_list', array('id' => $list_id));
        return true;
    }
    function saveCard($cardData)
    {
        $this->db->insert("board_card", $cardData);
        $id = $this->db->insert_id();
        $query = $this->db->get_where('board_card', array('id' => $id));
        return $query->row_array();
    }
    function getCard($card_id)
    {
        $query = $this->db->get_where('board_card', array('id' => $card_id));
        return $query->row_array();
    }
    function deleteCard($card_id)
    {
        $this->db->delete('board_card', array('id' => $card_id));
        return true;
    }
    function deleteTask($task_id)
    {
        $this->db->delete('card_task', array('id' => $task_id));
        return true;
    }
    function saveComment($comments)
    {
        $this->db->insert("comment", $comments);
        $id = $this->db->insert_id();
        $query = $this->db->get_where('comment', array('id' => $id));
        return $query->row_array();
    }
    function getComment($comments)
    {
        $query = $this->db->query("SELECT comment.*, users.uname FROM comment 
        INNER JOIN users ON comment.uid=users.uid 
        WHERE comment.id='" . $comments['id'] . "'");
        return $query->row_array();
    }
    function getCardComments($card_id)
    {
        $query = $this->db->query("SELECT comment.*, users.uname FROM comment 
        INNER JOIN users ON comment.uid=users.uid 
        WHERE comment.card_id='" . $card_id . "' ORDER BY comment.id DESC");
        return $query->result_array();
    }
    function totalComments($id)
    {
        $query = $this->db->query("SELECT comment.*,COUNT(comment.id) AS totalComments, users.uname FROM comment 
        INNER JOIN users ON comment.uid=users.uid 
        LEFT JOIN board_card ON comment.card_id=board_card.id
        WHERE comment.card_id='" . $id . "'");
        return $query->result_array();
    }
    function saveSubTask($subtasks)
    {
        $this->db->insert("card_task", $subtasks);
        $id = $this->db->insert_id();
        $query = $this->db->get_where('card_task', array('id' => $id));
        return $query->row_array();
    }
    function getSubgTasks($card_id)
    {
        $query = $this->db->query("SELECT * FROM card_task WHERE card_id =$card_id ORDER BY card_task.id DESC");
        return $query->result_array();
    }
    function totalTasks($card_id)
    {
        $query = $this->db->get_where('card_task', array('card_id' => $card_id));
        return $query->num_rows();
    }
    function totalTasksCompleted($card_id)
    {
        $query = $this->db->get_where('card_task', array('card_id' => $card_id, 'is_completed' => 1));
        return $query->num_rows();
    }
    function saveCardTag($tagData)
    {
        $tagSeperate = explode(",", $tagData['tag_title']);
        foreach ($tagSeperate as $tags) {
            $this->db->insert('card_tag', [
                "card_id"       => $tagData['card_id'],
                "tag_title"    => $tags,
                "created_at"    => $tagData['created_at'],
                "updated_at"    => $tagData['updated_at'],
            ]);
        }
        return true;
    }
    function getCardTag($card_id)
    {
        $query = $this->db->get_where('card_tag', array('card_id' => $card_id));
        return $query->result_array();
    }
    function deleteCardTag($card_id)
    {
        return $this->db->delete('card_tag', array('card_id' => $card_id));
    }
    function updateCardData($data)
    {
        return $this->db->query("UPDATE board_card SET card_name='" . $data[1] . "', description='" . $data[2] . "',color='" . $data[3] . "',due_date='" . date("Y-m-d H:i:s", strtotime($data[4])) . "' 
        WHERE board_card.id='" . $data[0] . "'");
    }
    function updateTask($data)
    {
        $this->db->query("UPDATE card_task SET card_id='" . $data['card_id'] . "', is_completed='" . $data['isCompleted'] . "',updated_at='" . DATE("Y-m-d H:i:s") . "' 
        WHERE id='" . $data['task_id'] . "'");
        return true;
    }
    function cardDragable($data)
    {
        $this->db->query("UPDATE board_card SET list_id='" . $data['list_id'] . "',updated_at='" . DATE("Y-m-d H:i:s") . "' 
        WHERE id='" . $data['card_id'] . "'");
        return true;
    }
    function createActivity($data)
    {
        $this->db->insert("user_activity", $data);
        $id = $this->db->insert_id();
        $query = $this->db->get_where('user_activity', array('id' => $id));
        return $query->row_array();
    }
    function getUserActivity($uid)
    {
        $query = $this->db->query("SELECT user_activity.*, users.uname FROM user_activity 
        INNER JOIN users ON user_activity.uid=users.uid 
        WHERE user_activity.uid='" . $uid . "' ORDER BY user_activity.id DESC");
        return $query->result_array();
    }
    function getCurrentUser($user)
    {
        $query = $this->db->get_where('users', array('uid' => $user));
        return $query->row_array();
    }
    function updateUserProfile($data)
    {
        $this->db->query("UPDATE users SET uname='" . $data['uname'] . "',username='" . $data['username'] . "',updated_at='" . $data['updated_at'] . "' 
        WHERE uid='" . $data['uid'] . "'");
        return true;
    }
    function getCurrentPwd($uid)
    {
        $query = $this->db->query("SELECT upassword FROM users
        WHERE uid='" . $uid . "'");
        return $query->row_array();
        // return true;
    }
    function updatePwd($data)
    {
        $this->db->query("UPDATE users SET upassword='" . $data['reTypePwd'] . "',updated_at='" . $data['updated_at'] . "' 
        WHERE uid='" . $data['uid'] . "'");
        return true;
    }
    function inviteLink($data)
    {
        $this->db->insert("board_permission", $data);
        $id = $this->db->insert_id();
        $query = $this->db->get_where('board_permission', array('id' => $id));
        $qData = $query->row_array();
        return $qData['id'];
    }
    function getInviteLink()
    {
        $query = $this->db->query('SELECT * FROM board_permission');
        return $query->result_array();
    }
    function getUserInfo($uid)
    {
        $query = $this->db->get_where('users', array('uid' => $uid));
        return $query->row_array();
    }
}
