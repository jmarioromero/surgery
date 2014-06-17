<?php

if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class Marketingm extends MY_Model
{

    public function Marketingm()
    {
        parent::__construct();
    }

    public function save($obj = NULL)
    {
        $res = getObjResponse(SUCCESS, lang('marketing.poll_created'));

        try
        {
            if ($obj)
            {
                if((isset($obj->document) && isset($obj->name))
                    && (!empty($obj->document) && !empty($obj->name)))
                {
                    $params = array(
                        'DOCUMENT' => $obj->document,
                        'NAME' => $obj->name,
                        'JSON_DATA' => json_encode($obj)
                    );
    
                    $this->executeInsert($params, TABLE_MARKETING);
                } else {
                    
                }
            }
        } catch (Exception $exc)
        {
            //throw new Exception($exc);
            $res = getObjResponse(ERROR, $exc);
        }

        return $res;
    }
}
