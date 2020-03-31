<?php
declare(strict_types = 1);

namespace app\controllers;

use yii\base\Controller;

class TestController extends Controller
{
    public function actionAa()
    {
        phpinfo();
    }
}