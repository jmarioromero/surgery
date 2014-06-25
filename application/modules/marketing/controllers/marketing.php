<?php

if (!defined('BASEPATH'))
{
    die();
}

class Marketing extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load constants helper.
        $this->load->helper('marketing');
        // load language file
        $this->lang->load('marketing');
        // Load models.
        $this->load->model('marketingm');        
    }

    public function index()
    {
        load_view(VIEW_HEADER);
        load_view(VIEW_MARKETING);
        load_view(VIEW_FOOTER);
    }

    public function poll()
    {
        $data['document_select'] = init_document_select();
        $data['entity_select'] = init_entity_select();
        $data['status_select'] = init_status_select();
        $data['agreement_select'] = init_agreement_select();

        load_view(VIEW_HEADER);
        load_view(VIEW_MARKETING_POLL, $data);
        load_view(VIEW_FOOTER);
    }

    public function search()
    {
        load_view(VIEW_HEADER);
        load_view(VIEW_CUSTOMER_SEARCH);
        load_view(VIEW_FOOTER);
    }

    
    public function save()
    {
        $values = $this->input->post('values');
        $res = $this->marketingm->save(json_decode($values));
        echo json_encode($res);
        exit;
    }
}
