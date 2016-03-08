<?php


namespace App\Models;


use EasyCron\DB;
use App\Models\ServerModel;

class DataDealModel
{
    private $db;

    public function __construct()
    {
        $this->db = DB::instance('_back', false);
    }

	//添加数据
	function addData($table, $row){
		try{
	   		return $this->db->insert($table, $row);		 
		}catch(Exception $e){
			return false;
		}
	}
	//数据检查
	function checkIsExt($table, $row){
		if(empty($row)){
			return false;
		}
		$where = "1=1";
		foreach ($row as $key => $value) {
			$where .= " AND `{$key}` = '{$value}'";
		}
		try{
			$sql = "SELECT * FROM {$table} WHERE {$where}";
			echo $sql."\r\n";
			return $this->db->queryOne($sql);
		}catch(Exception $e){ 
			return false;
		}
	}
	//更改数据
	function updateData($table, $row){
		try{
			$where = "id={$row['id']}";
			unset($row['id']);
	   		return $this->db->update($table, $row, $where);
		}catch(Exception $e){ 
			return false;
		}
	}

}

