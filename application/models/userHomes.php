<?php
class Userhomes extends CI_Model
{

    function __construct()
    {
    }

    function insertBoard($boards)
    {
        $query = $this->db->insert('board', $boards);
        return $query;
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
}
