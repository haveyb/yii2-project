<?php
declare(strict_types = 1);

namespace app\modules\wap\services;


use app\extensions\Constant;
use app\extensions\Helper;
use app\extensions\WithinConstant;
use app\models\Product;
use app\models\ProductBuyLimit;
use app\models\WithinProduct;
use app\services\CommonService;

/**
 * 商品模块脚本
 *
 * @author cyf
 * Class ProductScriptService
 * @package app\modules\wap\services
 */
class ProductScriptService extends CommonService
{
    /**
     * 常规商品自动上架【每分钟执行一次】
     *
     * @author cyf
     * @return string
     */
    public function autoUpShelvesRoutineProduct() :string
    {
        $number = Product::updateAll(
            ['product_status' => Constant::ON_SALE, 'auto_up_shelves_time' => 0],
            [
                'and',
                ['product_status' => Constant::OFF_SHELF],
                ['<=', 'auto_up_shelves_time', time()]
            ]
        );
        return $this->response(Helper::msg(1, '自动上架'.$number.'款常规商品成功'."\r\n"));
    }

    /**
     * 常规商品自动下架【每分钟执行一次】
     *
     * @author cyf
     * @return string
     */
    public function autoDownShelvesRoutineProduct() : string
    {
        $number = Product::updateAll(
            ['product_status' => Constant::OFF_SHELF, 'auto_down_shelves_time' => 0],
            [
                'and',
                ['product_status' => Constant::ON_SALE],
                ['<=', 'auto_down_shelves_time', time()]
            ]
        );
        return $this->response(Helper::msg(1, '自动下架'.$number.'款常规商品成功'."\r\n"));
    }

    /**
     * 内购商品自动上架【每分钟执行一次】
     *
     * @author cyf
     * @return string
     */
    public function autoUpShelvesWithinProduct() : string
    {
        $number = WithinProduct::updateAll(
            ['product_status' => WithinConstant::ON_SALE, 'auto_up_shelves_time' => 0],
            [
                'and',
                ['product_status' => WithinConstant::OFF_SHELF],
                ['<=', 'auto_up_shelves_time', time()]
            ]
        );
        return $this->response(Helper::msg(1, '自动上架'.$number.'款内购商品成功'."\r\n"));
    }

    /**
     * 内购商品自动下架【每分钟执行一次】
     *
     * @author cyf
     * @return string
     */
    public function autoDownShelvesWithinProduct() : string
    {
        $number = WithinProduct::updateAll(
            ['product_status' => WithinConstant::OFF_SHELF, 'auto_down_shelves_time'],
            [
                'and',
                ['product_status' => WithinConstant::ON_SALE],
                ['<=', 'auto_down_shelves_time', time()]
            ]
        );
        return $this->response(Helper::msg(1, '自动下架'.$number.'款内购商品成功'."\r\n"));
    }

    /**
     * 改变符合条件的阶段限购数据到待开始或已结束状态
     *
     * @author cyf
     * @return string
     */
    public function changeBuyLimitDataStatus() : string
    {

        // 改变指定条件限购数据到待开始状态
        ProductBuyLimit::updateAll(
            ['limit_status' => Constant::LIMIT_TO_BE_OPEN, 'update_time' => time()],
            [
                'and',
                ['is_delete' => 0],
                ['>=', 'start_time', time()],
                ['in', 'type', [Constant::STAGE_MIN_LIMIT, Constant::STAGE_MAX_LIMIT]]
            ]
        );
        // 改变指定条件限购数据到已结束状态
        ProductBuyLimit::updateAll(
            ['limit_status' => Constant::LIMIT_HAS_ENDED, 'update_time' => time()],
            [
                'and',
                ['is_delete' => 0],
                ['<=', 'end_time', time()],
                ['in', 'type', [Constant::STAGE_MIN_LIMIT, Constant::STAGE_MAX_LIMIT]]
            ]
        );
        return $this->response(Helper::msg(1, 'success', [time()]));
    }

}