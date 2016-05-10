<?php

namespace App\Http\Controllers\Admin;
use DB, Cache;
use App\Http\Requests;
use App\Models\Order;
use App\Models\Order_good;
class VisualController extends CommonController
{
    private $week_start;
    private $week_end;

    private $month_start;
    private $month_end;

    function __construct()
    {
        $this->week_start = mktime(0, 0, 0, date("m"), date("d") - date("w") + 1, date("Y"));
        $this->week_end = mktime(23, 59, 59, date("m"), date("d") - date("w") + 7, date("Y"));

        $this->month_start = mktime(0, 0, 0, date("m"), 1, date("Y"));
        $this->month_end = mktime(23, 59, 59, date("m"), date("t"), date("Y"));
    }


    //本周销售额
    function sales_amount()
    {
        return Cache::remember('Admin_visual_sales_amount', 60, function () {
        $amount = [];
        for ($i = 0; $i < 7; $i++) {
            $start = date('Y-m-d H:i:s', strtotime("+" . $i . " day", $this->week_start));
            $end = date('Y-m-d H:i:s', strtotime("+" . ($i + 1) . " day", $this->week_start));
            $amount['create'][] = Order::whereBetween('created_at', [$start, $end])->where('status', 1)->sum('total_price');
            $amount['pay'][] = Order::whereBetween('pay_time', [$start, $end])->where('status', '>', 1)->sum('total_price');
        }

        $data = [
            'week_start' => date("Y年m月d日", $this->week_start),
            'week_end' => date("Y年m月d日", $this->week_end),
            'amount' => $amount,
        ];
        return $data;
        });
    }


    /**
     * 本周销量
     * @return array
     */
    function sales_count()
    {
        return Cache::remember('Admin_visual_sales_count', 60, function () {
        $count = [];
        for ($i = 0; $i < 7; $i++) {
            $start = date('Y-m-d H:i:s', strtotime("+" . $i . " day", $this->week_start));
            $end = date('Y-m-d H:i:s', strtotime("+" . ($i + 1) . " day", $this->week_start));
            $count['pay'][] = Order::whereBetween('pay_time', [$start, $end])->where('status', 1)->count();
        }

        $data = [
            'week_start' => date("Y年m月d日", $this->week_start),
            'week_end' => date("Y年m月d日", $this->week_end),
            'count' => $count,
        ];
        return $data;
        });
    }

    /**
     * 本月热门销量
     */
    function top()
    {

        DB::enableQueryLog();
        $start = date("Y-m-d H:i:s", $this->month_start);
        $end = date("Y-m-d H:i:s", $this->month_end);



        //本月订单的id
        $order = Order::whereBetween('created_at', [$start, $end])->lists('id');


        //对应热门商品,前10名. 语句较复杂,请自己return sql出来看
        $goods = Order_good::with('good')
            ->select('good_id', DB::raw('sum(number) as sum_number'))
            ->whereIn('order_id', $order)
            ->groupBy('good_id')
            ->orderBy(DB::raw('sum(number)'), 'desc')
            ->take(10)
            ->get();

     /*   return $goods;
     return DB::getQueryLog();*/

        $data = [
            'month_start' => date("Y年m月d日", $this->month_start),
            'month_end' => date("Y年m月d日", $this->month_end),
            'goods' => $goods,
        ];
        return $data;
    }
}
