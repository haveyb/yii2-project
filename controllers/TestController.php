<?php
declare(strict_types = 1);

namespace app\controllers;

use app\common\Helper;
use app\modules\manage\services\TestService;
use yii\base\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        echo 'this is website/test/index';
    }

    public function actionGet()
    {
        return Helper::msg(1, 'success', TestService::service()->getUserInfo());
    }


}