<?php


namespace App\Models;


use EasyCron\DB;

class ServerModel
{
    private $db;

    public function __construct()
    {
        $this->db = DB::instance('_back', false);
    }

    public function getAgentAll()
    {
        return $this->db->queryAll('select pfrom_id from t_agent');
    }

    public function getServerAllByPfromId($pfrom_id)
    {
    	$sql = "select * from t_server_config where pfrom_id={$pfrom_id}";
        return $this->db->queryAll($sql);
    }
}

