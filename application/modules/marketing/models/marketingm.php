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
    
    public function documentExists($document = NULL)
    {
        $query = <<<EOF
SELECT COUNT(1) AS 'exist' FROM MARKETING m WHERE m.DOCUMENT = ? 
EOF;
        $res = $this->executeQuery($query, array($document));
        return $res->exist;
    }

    public function save($jsonObj = NULL)
    {
        $res = getObjResponse(ERROR, 'marketing.invalid_data');

        try
        {
            if ($jsonObj)
            {
                //validate();
                
                if($this->documentExists($jsonObj->document)) 
                {
                    $res = getObjResponse(ERROR, 'marketing.user_exists');
                } else {

                    $this->executeInsert(array(
                        'DOCUMENT' => $jsonObj->document,
                        'FULL_NAME' => $jsonObj->name . ' ' . $jsonObj->lastname,
                        'JSON_DATA' => json_encode($jsonObj),
                        'CREATE_AT' => getDateTime($jsonObj->polldate),
                        'UPDATE_AT' => getDateTime()
                    ), TABLE_MARKETING);
                    
                    $res = getObjResponse(SUCCESS, 'marketing.poll_created');
                }
            }
        } catch (Exception $exc)
        {
            //throw new Exception($exc);
            $res = getObjResponse(ERROR, $exc);
        }

        return $res;
    }
    
    public function find()
    {
        $query = <<<EOF
SELECT m.* FROM MARKETING m
EOF;
        $rows = $this->executeQuery($query);
        
        if($rows)
        {
            foreach($rows as $row)
            {
                $row->JSON_DATA = json_decode($row->JSON_DATA);
            }
        }

        return $rows;
    }    
}
