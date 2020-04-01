<?php
declare(strict_types = 1);
// 消息队列
return [
    # -----------------------  redis-queue  ----------------------

    'class' => \yii\queue\redis\Queue::class,
    'as log' => \yii\queue\LogBehavior::class, // 错误日志 默认为 console/runtime/logs/app.log
    'redis' => 'redis', // 连接组件或它的配置（这里读取的是在config/redis.php中配置的信息）
    'channel' => 'queue', // Queue channel key


    # -----------------------  beanstalk-queue  ----------------------
    // doc https://www.haveyb.com/article/208
    /*
    'class' => \yii\queue\beanstalk\Queue::class,
    'host' => 'localhost',
    'port' => 11300,
    'tube' => 'queue',
    */

    # -----------------------  rabbitMq-queue  ----------------------
//    'class' => \yii\queue\amqp_interop\Queue::class,
//    'host' => '127.0.0.1',
//    'port' => 5672,
//    'user' => 'xls',
//    'password' => '3NxUotUeLzRq',
//    'queueName' => 'test',
//    'vhost' => 'xrabbit',
//    'attempts' => 2,
//    'serializer' => \yii\queue\serializers\JsonSerializer::class,
//    'driver' => yii\queue\amqp_interop\Queue::ENQUEUE_AMQP_LIB,

];