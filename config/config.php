<?php
/**
 * Created by PhpStorm.
 * User: ClownFish 187231450@qq.com
 * Date: 15-11-2
 * Time: 下午9:36
 */

return [
    'crontabdb' => [
        'host' => '192.168.1.203',
        'port' => 3306,
        'username' => 'root',
        'password' => '0987abc123',
        'dbname' => 'crontab',
        'charset' => 'utf8'
    ],
    '_back' => [
        'host' => '192.168.1.203',
        'port' => 3306,
        'username' => 'root',
        'password' => '0987abc123',
        'dbname' => 'jxqy_central',
        'charset' => 'utf8'
    ],
    '_actor' => [
        'host' => '192.168.1.203',
        'port' => 3306,
        'username' => 'root',
        'password' => '0987abc123',
        'dbname' => 'actor_jxqy',
        'charset' => 'utf8'
    ],
    '_redis_back' => [
        "host" => "192.168.1.246",    // redis ip
        "port" => 6379,           // redis端口
        "timeout" => 30,          // 链接超时时间
        "db" => 0,                // redis的db号
        "queue" => "abc"          // redis队列名
    ],        
    "log" => [
        "level" => "debug",
        "type" => "file",
        "log_path" => ROOT_PATH . "logs/",
    ]
];

