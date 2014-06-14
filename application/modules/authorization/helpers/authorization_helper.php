<?php
/*************
 * CONSTANTS
 *************/
define('VIEW_SIGNFORM', 'signform');
define('VIEW_SIGNUPFORM', 'signform/signupform');
define('VIEW_LOGINFORM', 'signform/loginform');
define('GOTO_SIGNFORM', 'authorization/signform');
define('GOTO_FRONTPAGE', 'frontpage');
/*************
 * FUNCTIONS
 *************/
function logged_in()
{
    $CI = & get_instance();
    return $CI->session->userdata('logged_in');
}
