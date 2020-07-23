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
    function fetchUsers($user)
    {
        $result = $this->db->query("SELECT * from users WHERE uid='" . $user['uid'] . "'");
        return $result->row_array();
    }
    function fetchBoards()
    {
        $result = $this->db->query("SELECT * from projecttitle ORDER BY ptid DESC LIMIT 3");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
}
