<?php
declare(strict_types = 1);

namespace app\common;

use yii\base\Model;

class Helper
{
    /**
     * 消息统一返回
     *
     * @param int $status
     * @param string $msg
     * @param array|null $data
     * @return string
     */
    public static function msg(int $status, string $msg, array $data = null): string
    {
        $result = ['status' => (int)$status, 'msg' => $msg];
        if (!is_null($data)) {
            $result['data'] = $data;
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * get方式请求
     *
     * @param string $url
     * @param int $time
     * @return mixed
     * @throws \Exception
     */
    public static function httpGet(string $url, int $time = 5)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $time);//超时时间
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)'); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
        ));
        $responseText = curl_exec($curl);
        //返回结果
        if ($responseText) {
            curl_close($curl);
            return $responseText;
        } else {
            $error = curl_errno($curl);
            curl_close($curl);
            throw new \Exception("curl出错，错误码:$error");
        }
    }

    /**
     * 获取Model的第一个错误信息
     *
     * @param Model $model
     * @return mixed
     */
    public static function getFirstModelError(Model $model)
    {
        $errors = $model->getErrorSummary(false);
        return reset($errors);
    }

    /**
     * 对数组内的所有字符串进行左右去空
     *
     * @param $array
     * @return mixed
     */
    public static function trimAll(array $array)
    {
        if (empty($array) || !is_array($array)) {
            return $array;
        }
        $array = array_map(function ($v) {
            if (is_string($v)) {
                return trim($v, ' ');
            } else {
                return $v;
            }
        }, $array);
        return $array;
    }

    /**
     * 对时间戳进行格式化
     *
     * @param int $timestamp
     * @return false|string
     * @throws \Exception
     */
    public static function formatTime(int $timestamp)
    {
        if (!is_int($timestamp)) {
            throw new \Exception('时间戳传参必须是整数类型');
        }
        return date('Y-m-d H:i:s', $timestamp);
    }


}