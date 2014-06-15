<?php

function load_view($view=NULL, $vars=array())
{
    $CI = & get_instance();
    $CI->load->view($view, $vars);
}

function validateVars($vars=array())
{
    $default = array(
        'class' => '',
        'default' => '',
        'id' => '', 
        'icon' => '',
        'label' => '',
        'maxlength' => '',
        'name' => '',
        'placeholder' => '',
        'text' => '',
        'value' => ''
        );
    
    foreach($default as $key => $value) 
    {
        if(!isset($vars["{$key}"])) 
        {
            $vars["{$key}"] = '';
        }
    }        
    
    return $vars;
}

function datepicker($vars=array())
{
    if(!isset($vars['date_at']) || empty($vars['date_at']))
    {
        $vars['value'] = date(DATEPICKER_FORMAT);
    }
    
    load_view(VIEW_DATEPICKER, validateVars($vars));
}

function input($vars=array())
{
    load_view(VIEW_INPUT, validateVars($vars));
}

function select($vars=array())
{
    load_view(VIEW_SELECT, validateVars($vars));
}

function button($vars=array())
{
    load_view(VIEW_BUTTON, validateVars($vars));
}