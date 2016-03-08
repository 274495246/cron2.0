<?php
return [
    // 'taskid1' =>
    //     [
    //         'taskname' => 'detail',  //任务名称
    //         'rule' => '*/10 * * * * *',//定时规则
    //         "unique" => 1, //排他数量，如果已经有这么多任务在执行，即使到了下一次执行时间，也不执行
    //         'execute' => 'RunTask',//命令处理类
    //         'args' =>
    //             [
    //                 'class' => App\Controllers\PaymentController::class,//命令
    //                 'func' => 'detail',//附加属性
    //                 'params' => ['a' => 'test1' . PHP_EOL]
    //             ],
    //     ],
    // 'taskid2' =>
    //     [
    //         'taskname' => 'Test2',  //任务名称
    //         'rule' => '*/5 * * * * *',//定时规则
    //         "unique" => 1, //排他数量，如果已经有这么多任务在执行，即使到了下一次执行时间，也不执行
    //         'execute' => 'RunTask',//命令处理类
    //         'args' =>
    //             [
    //                 'class' => App\Tasks\TestTask::class,//命令
    //                 'func' => 'runSync',//附加属性
    //                 'params' => ['a' => 'test2' . PHP_EOL]
    //             ],
    //     ],
    // 'taskid3' =>
    //     [
    //         'taskname' => 'Test3',  //任务名称
    //         'rule' => '*/5 * * * * *',//定时规则
    //         "unique" => 1, //排他数量，如果已经有这么多任务在执行，即使到了下一次执行时间，也不执行
    //         'execute' => 'RunTask',//命令处理类
    //         'args' =>
    //             [
    //                 'class' => App\Controllers\PaymentController::class,//命令
    //                 'func' => 'test',//附加属性
    //                 'params' => ['a' => 'test2' . PHP_EOL]
    //             ],
    //     ],        
//    'taskid2' =>
//        [
//            'taskname' => 'test',  //任务名称
//            'rule' => ["22:30", "22:22:58", "22:24:36"],
//            "unique" => 1, //排他数量，如果已经有这么多任务在执行，即使到了下一次执行时间，也不执行
//            "execute" => "Gather",
//            'args' =>
//                [
//                    'cmd' => 'gather',//命令
//                    'ext' => '',//附加属性
//                ],
//        ],
    // 'taskid2' =>
    //     [
    //         'taskname' => 'Test2',  //任务名称
    //         'rule' => '*/10 * * * * *',//定时规则
    //         "unique" => 1, //排他数量，如果已经有这么多任务在执行，即使到了下一次执行时间，也不执行
    //         'execute' => 'RunTask',//命令处理类
    //         'args' =>
    //             [
    //                 'class' => App\Tasks\TestTask::class,//命令
    //                 'func' => 'test',//附加属性
    //                 'params' => ['a' => '秒测试' . PHP_EOL]
    //             ],
    //     ],
    // 'taskid3' =>
    //     [
    //         'taskname' => 'Test2',  //任务名称
    //         'rule' => '* */2 * * * *',//定时规则
    //         "unique" => 1, //排他数量，如果已经有这么多任务在执行，即使到了下一次执行时间，也不执行
    //         'execute' => 'RunTask',//命令处理类
    //         'args' =>
    //             [
    //                 'class' => App\Tasks\TestTask::class,//命令
    //                 'func' => 'test',//附加属性
    //                 'params' => ['a' => '分测试' . PHP_EOL]
    //             ],
    //     ],                  
];
