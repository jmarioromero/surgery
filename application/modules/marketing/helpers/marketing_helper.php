<?php
/*************
 * CONSTANTS
 *************/
define('VIEW_MARKETING', 'marketing');
define('VIEW_MARKETING_SEARCH', 'marketing_search');
define('VIEW_MARKETING_POLL', 'marketing_poll');
define('VIEW_DOCUMENT_TYPE', 'shares/document_type');
define('VIEW_POLL_ACTIONS', 'poll_actions');
define('VIEW_POLL_PERSONALDATA', 'poll_personaldata');
define('VIEW_POLL_CONTACTDATA', 'poll_contactdata');
define('VIEW_POLL_HEALTHDATA', 'poll_healthdata');
define('TABLE_MARKETING', 'MARKETING');
/*************
 * FUNCTIONS
 *************/
function init_document_select()
{
    return array(
        'label' => 'marketing.doctype_label',
        'name' => 'document',        
        'options' => array(
            '1' => 'marketing.doctype_option1'
        )
    );
}

function init_entity_select()
{
    return array(
        'label' => 'marketing.healthentity_label',
        'name' => 'healthentity',
        'options' => array(
            '1' => 'Caf&eacute;Salud',
            '2' => 'Coomeva',
            '3' => 'Saludcoop'
        )
    );
}

function init_status_select()
{
    return array(
        'label' => 'marketing.agreement_label',
        'name' => 'agreement',
        'options' => array(
            '0' => 'Inactivo',
            '1' => 'Activo'
        )
    );
}

function init_agreement_select()
{
    return array(
        'label' => 'marketing.status_label',
        'name' => 'status',
        'options' => array(
            '1' => 'Comfandi',
            '2' => 'Comfenalco POS',
            '3' => 'Nueva EPS'
        )
    );
}
