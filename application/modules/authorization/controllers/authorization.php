<?php

if (!defined('BASEPATH'))
{
    die();
}

class Authorization extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load constants helper.
        $this->load->helper('authorization');
        // load language file
        $this->lang->load('authorization');        
    }

    public function index()
    {
        redirect(logged_in() ? GOTO_FRONTPAGE : GOTO_SIGNFORM);
    }

    public function signform()
    {
        $this->load->view(VIEW_HEADER);
        $this->load->view(VIEW_SIGNFORM);
        $this->load->view(VIEW_FOOTER);
    }

}
