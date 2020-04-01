<?php
declare(strict_types = 1);

namespace app\modules\queue\test;

class TestBeanStalkQueue implements \yii\queue\JobInterface
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
        $redis->select(3); // 指定数据库
        $res = $redis->lPush($data['key'], ...$data['agent_id_array']);
        return $res;
    }

}