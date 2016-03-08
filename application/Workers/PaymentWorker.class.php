<?php
/**
 * ReadBookWorker.php.
 * Author: yeweijian
 * E-mail: yeweijian@hoolai.com
 * Date: 2016/2/15
 * Time: 15:49
 */

namespace App\Workers;

use EasyCron\EasyDB;
use EasyCron\Log;
use App\Models\DataDealModel;
use EasyCron\DB;

class PaymentWorker extends Base
{
    private $db;
    private $table = 'st_payment_detail';
    /**
     * 运行入口
     * @param $task
     * @return mixed
     */
    public function run($data)
    {
        $this->detail($data);

    }
    public function __construct()
    {   //同步 mysql
        $this->db = DB::instance('_back', false);
                
    }    
    private function detail($data)
    {
        $data = json_decode($data,true);
        if($data){
            //重组数据
            $new_data = array();
            $key = 0;
            $new_data[$key]['pay_date'] = $data['logdate'];
            $new_data[$key]['pay_account'] = $data['account'];
            $new_data[$key]['pay_amount'] = $data['amount'];
            $new_data[$key]['pay_gold'] = $data['gold'];
            $new_data[$key]['server_id'] = $data['serverid'];
            $new_data[$key]['pay_orderid'] = $data['transactionid'];
            $new_data[$key]['pay_count'] = 1;
            $new_data[$key]['pfrom_id'] = $data['pfrom_id'];
            $this->payFirstCheck($new_data,$data['pfrom_id']);
            //写入日志  
            log::async_file($new_data,'payment/payment');                        
        }
    }
    private function payFirstCheck($data,$pfrom_id){
        $model = new  DataDealModel();
        //条件字段
        $ck_data = array();
        $ck_data[] = 'pay_orderid';     
        //需要更改字段
        $up_data = array();
        $up_data[] = 'pay_amount';
        $up_data[] = 'pay_gold';
        $up_data[] = 'pay_date';
        $up_data[] = 'pay_account';
        $up_data[] = 'pay_count';

        $table = $this->table;
        $log_flag = array();
        $log_flag['add_ok'] = 0;
        $log_flag['add_fail'] = 0;
        $log_flag['up_ok'] = 0;
        $log_flag['up_fail'] = 0;

        if($data){
            echo "执行过程: ";
            foreach($data as $key => $value){
                //需要检查的条件
                $tmp = array();
                $tmp['pfrom_id'] = $pfrom_id;
                foreach ($value as $k => $v) {
                    if(in_array($k, $ck_data)){
                        $tmp[$k] = $v;
                    }
                }
                //检查是否首充
                $t = array();
                $t['pay_account'] = $value['pay_account'];
                $t['pfrom_id'] = $pfrom_id;
                $fchk = 0;
                $fchk = $model->checkIsExt($table, $t);

                if(!$fchk){
                    //如果不存在表示首充
                    $fchk = 1;
                }

                $value['pfrom_id'] = $pfrom_id;
                if($fchk == 1){
                    $value['first_pay'] = 1;    
                }
                $f = $model->addData($table, $value);
                if($f){
                    echo ' add_ok ';
                    $log_flag['add_ok'] += 1;
                }else{
                    echo ' add_fail ';
                    $log_flag['add_fail'] += 1;
                }
            }
        }
        echo "\r\n运行结果: ";
        echo $log_flag['add_ok']."条记录，添加成功; ";
        echo $log_flag['add_fail']."条记录，添加失败; ";
        echo $log_flag['up_ok']."条记录，更新成功; ";
        echo $log_flag['up_fail']."条记录，更新失败; ";
        echo "end\r\n";
    }    
}