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
        $result = $this->db->query("SELECT * from board_card WHERE board_id=$boardid;");
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
    function saveSubTask($subtasks)
    {
        return $this->db->insert("card_task", $subtasks);
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
        $this->db->query("UPDATE board_card SET card_name='" . $data[1] . "', description='" . $data[2] . "',color='" . $data[3] . "',due_date='" . date("Y-m-d H:i:s", strtotime($data[4])) . "' 
        WHERE board_card.id='" . $data[0] . "'");
        return true;
    }
}
