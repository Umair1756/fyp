<?php
class Userhome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_logged'])) {
            $this->session->set_flashdata("error", "Session Destroyed. Login Again");
            redirect("welcome/login", "refresh");
        }
    }

    function index()
    {
        $this->load->view('userHomePage/userHomePageHeader');
        $this->load->view('userHomePage/userHomePage');
        $this->load->view('userHomePage/userHomePageFooter');
    }
}
