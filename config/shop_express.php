<?php

return [
    'page_size' => 10,
    'order_status' => array(
        1=> '待支付',       //下单
        2=> '待发货',       //付款
        3=> '配货中',       //配货
        4=> '待收货',       //出库
        5=> '已收货',       //交易成功
//        '待退货',
//        '已发送，等到管理员收货',
//        '管理员已收货',
//        '已退款',
//        '已换货'
    ),
    'expresses' => array(
        'shentong'=>'申通快递',
        'shunfeng'=>'顺丰快递',
        'yuantong'=>'圆通快递',
        'yunda' => '韵达快递',
        'zhongtong' => '中通快递'
    ),
    'debug'  => env('DEBUG', 'false'),         // 调试模式
];
