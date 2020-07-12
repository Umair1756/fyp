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
}
