<?php
declare(strict_types = 1);

namespace app\modules\queue;

class Queue extends \yii\base\Module
{

    public $controllerNamespace = 'app\modules\queue\controllers';

    public function init()
    {
        parent::init();
    }

}
