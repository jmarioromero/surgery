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
    
    private function documentExists($document = NULL)
    {
        $query = <<<EOF
SELECT COUNT(1) AS 'exist' 
FROM MARKETING m 
WHERE m.DOCUMENT = ? 
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
                if($this->documentExists($jsonObj->document)) 
                {
                    $res = getObjResponse(ERROR, 'marketing.user_exists');
                } else {
                    $this->executeInsert(array(
                        'DOCUMENT' => $jsonObj->document,
                        'NAME' => $jsonObj->name,
                        'JSON_DATA' => json_encode($jsonObj)
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
}
