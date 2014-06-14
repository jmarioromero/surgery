<?php

if (!defined('BASEPATH'))
{
    die();
}

class Frontpage extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load constants helper.
        $this->load->helper('constants');
        // load language file
        $this->lang->load('frontpage');
    }    
    
    public function index()
    {
        $this->load->view(VIEW_HEADER);
        $this->load->view(VIEW_FRONTPAGE);
        $this->load->view(VIEW_FOOTER);
    }
}
