<?php
declare(strict_types = 1);

namespace app\modules\manage\controllers;

use yii\base\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        echo 666;
    }
}