<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use DB, Cache;
use App\Http\Requests;
use App\Models\Order;
use App\Models\Order_good;
use App\Models\Good;
class SearchController extends CommonController
{
    private $month_start;
    private $month_end;

    function __construct()
    {
        $this->month_start = mktime(0, 0, 0, date("m"), 1, date("Y"));
        $this->month_end = mktime(23, 59, 59, date("m"), date("t"), date("Y"));
    }

    function good_search()
    {
        DB::enableQueryLog();
        $start = date("Y-m-d H:i:s", $this->month_start);
        $end = date("Y-m-d H:i:s", $this->month_end);
        //本月订单的id
        $order = Order::whereBetween('created_at', [$start, $end])->lists('id');


        //对应热门商品,前10名. 语句较复杂,请自己return sql出来看
        $good = Order_good::with('good')
            ->select('good_id', DB::raw('sum(number) as sum_number'))
            ->whereIn('order_id', $order)
            ->groupBy('good_id')
            ->orderBy(DB::raw('sum(number)'), 'desc')
            ->take(10)
            ->paginate(6);

        return view('shop.search')->with('good',$good);
    }

    function search(Request $request)
    {
        $keyword = "%".$request->keyword."%";
        $goods = Good::where("name","like",$keyword)->get();
        return view('shop.good_list')->with('goods',$goods);
    }
}
