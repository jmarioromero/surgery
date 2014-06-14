<?php
function isset_at($obj=NULL, $default='') 
{
    return (isset($obj) ? $obj : $default);
}

function unset_at($args=[])
{
    foreach($args as $arg)
    {
        global $arg;
        unset($arg);
    }
}

function load_view($view=NULL, $vars=array())
{
    $CI = & get_instance();
    $CI->load->view($view, $vars);
}

function validateVars($vars=array())
{
    $default = array(
        'id' => '', 
        'class' => '',
        'label' => '',
        'text' => '',
        'icon' => '',
        'date_at' => '',
        'placeholder' => '',
        'maxlength' => '',
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
        $vars['date_at'] = date(DATEPICKER_FORMAT);
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