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

    public function save($values = NULL)
    {
        $response = FALSE;

        try
        {
            if ($values)
            {
                $params = array();

                foreach ($values as $obj)
                {
                    $params[] = array(
                        'DOCUMENT' => $obj->document,
                        'NAME' => $obj->name,
                        'JSON_DATA' => json_encode($obj)
                    );
                }

                $response = $this->insertInBatch($params, TABLE_MARKETING);
            }
        } catch (Exception $exc)
        {
            throw new Exception($exc);
        }

        return $response;
    }
}
