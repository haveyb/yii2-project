<?php
declare(strict_types = 1);

namespace app\modules\manage\controllers;

use app\modules\queue\test\TestBeanStalkQueue;
use app\modules\queue\test\TestRedisQueue;
use yii\base\Controller;
use Yii;

class TestController extends Controller
{
    public function actionIndex()
    {
        echo 666;
    }

    /**
     * redis-queue 测试（配置 config/queue.php 和 config/redis.php）
     *
     * @return mixed
     * @website http://queue.haveyb.com/manage/test/redis-queue
     */
    public function actionRedisQueue()
    {
        $data = [
            'key' => 'sec_kill',
            'user_id_array' => [69, 73, 25, 15]
        ];
        return Yii::$app->queue->push(new TestRedisQueue($data));
    }

    /**
     * beanstalk-queue 测试 (配置config/queue.php)
     *
     * @return mixed
     * @website http://queue.haveyb.com/manage/test/beanstalk-queue
     */
    public function actionBeanstalkQueue()
    {
        $data = [
            'key' => 'beanstalk_queue_test',
            'agent_id_array' => [1009, 9901, 4507]
        ];
        return Yii::$app->queue->push(new TestBeanStalkQueue($data));
    }

    public function actionRabbitMqQueue()
    {
        $data = [
            'key' => 'rabbit_mq_queue_test',
            'agent_id_array' => [69, 33, 45, 77, 66, 85]
        ];
        return Yii::$app->queue->push(new TestBeanStalkQueue($data));
    }


}