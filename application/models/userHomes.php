<?php
class Userhomes extends CI_Model
{

    function __construct()
    {
    }

    function insertTitle($titles)
    {
        $query = $this->db->insert('projecttitle', $titles);
        return $query;
    }
    function fetchBoards($userId)
    {
        $result = $this->db->query("SELECT * from projecttitle WHERE uid='" . $userId['uid'] . "' ORDER BY ptid DESC LIMIT 3 ");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
}
