<?php
/**
 * Log.php.
 * Author: yeweijian
 * E-mail: yeweijian@hoolai.com
 * Date: 2016/2/15
 * Time: 13:58
 */

namespace EasyCron;


use EasyCron\Crontab;

class Log
{
    /**
     * 记录日志
     * @param $message
     */
    static public function log_write($message)
    {
        $now = date("H:i:s");
        if (Crontab::$daemon) {
            $destination = Crontab::$log_path . "sys_log_" . date("Y-m-d") . ".log";
            error_log("{$now} : {$message}\r\n", 3, $destination, '');
        }
        echo "{$now} : {$message}\r\n";
    }

    static public function async_file($message, $filename = '')
    {
        if (empty($filename)) {
            $filename = "user_log_" . date("Y-m-d") . ".log";
        }else{
            $filename = $filename ."_". date("Y-m-d") . ".log";
        }

        if (!is_string($message)) {
            $message = json_encode($message);
        }
        $now = date("H:i:s");
        $file = ROOT_PATH . 'logs/' . $filename;
        if (!file_exists($file)) {
            touch($file);
        }
        swoole_async_write($file, "{$now} : {$message}\r\n",$offset = -1);
    }
}