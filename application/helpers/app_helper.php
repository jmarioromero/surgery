<?php

function load_view($view = NULL, $vars = array())
{
    $CI = & get_instance();
    $CI->load->view($view, $vars);
}

function validateVars($vars = array())
{
    $default = array(
        'class' => '',
        'default' => '',
        'href' => '',
        'id' => '', 
        'icon' => '',
        'label' => '',
        'maxlength' => '',
        'innergroup' => TRUE,
        'name' => '',
        'placeholder' => '',
        'text' => '',
        'type' => 'text',
        'value' => ''
        );
    
    foreach($default as $key => $value) 
    {
        if(!isset($vars["{$key}"])) 
        {
            $vars["{$key}"] = $value;
        }
    }        
    
    return $vars;
}

function button($vars=array())
{
    load_view(VIEW_BUTTON, validateVars($vars));
}

function datepicker($vars = array())
{
    $vars = validateVars($vars);
    
    $vars['value'] = empty($vars['value']) ? date(DATEPICKER_FORMAT) : $vars['value'];
    
    load_view(VIEW_DATEPICKER, validateVars($vars));
}

function input($vars=array())
{
    load_view(VIEW_INPUT, validateVars($vars));
}

function alink($vars=array())
{
    load_view(VIEW_LINK, validateVars($vars));
}

function select($vars=array())
{
    load_view(VIEW_SELECT, validateVars($vars));
}

function getObjResponse($code = NULL, $description = NULL)
{
    $res = new stdClass();
    $res->code = $code;
    $res->description = lang($description);
    return $res;
}

function validate($obj, $mod_name, $except)
{
    
    foreach ($obj as $key => $value) {
        echo "$key => $value\n";
    }
    
    
}