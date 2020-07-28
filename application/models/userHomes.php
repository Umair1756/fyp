<?php
class Userhomes extends CI_Model
{

    function __construct()
    {
    }

    function insertTitle($titles)
    {
        $query = $this->db->insert('boardtitle', $titles);
        return $query;
    }
    function fetchBoards($userId)
    {
        $result = $this->db->query("SELECT * from boardtitle WHERE uid='" . $userId['uid'] . "' ORDER BY ptid DESC LIMIT 3 ");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
    function fetchRecentBoards($userId)
    {
        $result = $this->db->query("SELECT * from boardtitle WHERE uid='" . $userId['uid'] . "' ORDER BY created_at DESC LIMIT 3 ");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
    function getBoardNames($boardtitleid)
    {
        $result = $this->db->query("SELECT * from boardtitle WHERE ptid=$boardtitleid;");
        if ($result->num_rows() > 0) {
            return $result->row_array();
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
}
