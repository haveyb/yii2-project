<?php
declare(strict_types = 1);

namespace app\modules\queue\test;

use yii\queue\JobInterface;

/**
 * 用于测试各种队列的有效使用
 *
 * Class TestQueue
 * @package app\modules\queue\controllers
 */
class TestRedisQueue implements JobInterface
{
    public $data;

    public function __construct($data = null)
    {
        if (!is_null($data)) {
            $this->data = $data;
        }
    }

    public function execute($queue)
    {
        $data = $this->data;
        $redis = new \Redis();
        $redis->connect('localhost', 6379);
        $redis->auth('yourPasswordSettings');
        $redis->select(9); // 指定数据库
        $res = $redis->lPush($data['key'], ...$data['user_id_array']);
        return $res;
    }

}