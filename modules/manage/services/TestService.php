<?php
declare(strict_types = 1);

namespace app\modules\manage\services;

use app\services\BaseService;

class TestService extends BaseService
{
    public function getUserInfo()
    {
        $data =  [
            'age' => '28',
            'domain' => 'https://www.haveyb.com'
        ];
        return $data;
    }

}