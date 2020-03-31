<?php
declare(strict_types = 1);
// 消息队列
return [
    'class' => \yii\queue\amqp_interop\Queue::class,
    'host' => '118.178.106.224',
    'port' => 5672,
    'user' => 'xls',
    'password' => '3NxUotUeLzRq',
    'queueName' => 'goods',
    'vhost' => 'xrabbit',
    'attempts' => 0,
    'serializer' => \yii\queue\serializers\JsonSerializer::class,
    'driver' => yii\queue\amqp_interop\Queue::ENQUEUE_AMQP_LIB,
];