<?php

if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    public function executeQuery($sql = NULL, $params = NULL)
    {
        try
        {
            $result = $this->db->query($sql, $params);
            return $result->result();
        } catch (Exception $e)
        {
            throw new Exception($e);
        }
    }

    public function executeInsert($params = NULL, $table = NULL)
    {
        try
        {
            $this->db->insert($table, $params);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } catch (Exception $e)
        {
            throw new Exception($e);
        }
    }

    public function insertInBatch($values = NULL, $table = NULL)
    {
        $response = FALSE;

        try
        {
            $response = $this->db->insert_batch($table, $values);
        } catch (Exception $e)
        {
            throw new Exception($e);
        }

        return $response;
    }

    public function updateInBatch($values = NULL, $key = NULL, $table = NULL)
    {
        try
        {
            $this->db->update_batch($table, $values, $key);
        } catch (Exception $e)
        {
            throw new Exception($e);
        }

        return TRUE;
    }

    public function executeUpdate($params = NULL, $param_name = NULL, $param_value = NULL, $table = NULL)
    {
        try
        {
            $this->db->where($param_name, $param_value);

            $table = ($table == NULL) ? $this->table : $table;

            $this->db->update($table, $params);
            return $this->db->affected_rows();
        } catch (Exception $e)
        {
            throw new Exception($e);
        }
    }

    public function executeUpdateWhere($params = NULL, $where = NULL, $table = NULL)
    {
        try
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
            
            $this->db->update($table, $params);
            return $this->db->affected_rows();
        } catch (Exception $e)
        {
            throw new Exception($e);
        }
    }

    public function executeDelete($params = NULL, $table = NULL)
    {
        try
        {
            $table = ($table == NULL) ? $this->table : $table;

            $this->db->delete($table, $params);
            $affected_rows = $this->db->affected_rows();
            return $affected_rows;
        } catch (Exception $e)
        {
            throw new Exception($e);
        }
    }
}
