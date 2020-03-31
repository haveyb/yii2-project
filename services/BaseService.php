<?php
declare(strict_types = 1);

namespace app\services;

class BaseService
{
    private static $_instance;

    /**
     * service统一访问接口
     *
     * @return static
     */
    final public static function service()
    {
        $class = get_called_class();
        if (!isset(self::$_instance[$class]) || !(self::$_instance[$class] instanceof BaseService)) {
            self::$_instance[$class] = new static();
        }
        return self::$_instance[$class];
    }

    /**
     * 统一响应给yar数据为json
     *
     * @param array $data
     * @return string
     */
    final public function response(array $data): string
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }


}