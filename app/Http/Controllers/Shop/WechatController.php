<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use EasyWeChat\Message\Text;
use EasyWeChat\Message\News;

use App\Models\Good, App\Models\Order, App\Models\Weixin_user;
use EasyWeChat;



class WechatController extends Controller
{

    public function serve()
    {

        // 从项目实例中得到服务端应用实例。
        $server = EasyWeChat::server();
        //return 123;
        $server->setMessageHandler(function ($message) {
            //事件处理
            if ($message->MsgType == 'event') {
                switch ($message->Event) {
                    //关注事件
                    case 'subscribe':
                        return new Text(['content' => '欢迎关注！\n亲, 还在等什么, 赶紧去小卖部买东西啊~']);
                        break;

                    //点击事件
                    case 'CLICK':
                        switch ($message->EventKey) {
                            case 'recommend':
                                return $this->is_recommend();
                                break;

                            case 'new':
                                return $this->is_new();
                                break;

                            case 'hot':
                                return $this->is_hot();
                                break;

                            case 'order':
                                return $this->order($message->FromUserName);
                                break;
                        }
                        break;
                }
            }


            //文本消息
            if ($message->MsgType == 'text') {
                switch ($message->Content) {
                    case '精选':
                    case '推荐':
                    case '精选推荐':
                    case 'recommend':
                        return $this->is_recommend();
                        break;

                    case '你好';
                        return 'hello';
                        break;
                    case '你叫什么名字';
                        return '这是个秘密！';
                        break;

                    case '新品':
                    case '新品到货':
                    case 'new':
                        return $this->is_new();
                        break;

                    case '人气':
                    case '热卖':
                    case '人气热卖':
                    case 'hot':
                        return $this->is_hot();
                        break;

                    case '我的订单':
                    case '订单':
                    case 'order':
                        return $this->order($message->FromUserName);
                        break;
                    default:
                        return $this->default_msg();
                }
            }

            //语音消息
            if ($message->MsgType == 'voice') {
                switch ($message->Recongnition) {
                    case '精选！':
                    case '推荐！':
                    case '精选推荐！':
                        return $this->is_recommend();
                        break;

                    case '新品！':
                    case '新品到货！':
                        return $this->is_new();
                        break;

                    case '人气！':
                    case '热卖！':
                    case '人气热卖！':
                        return $this->is_hot();
                        break;

                    case '订单！':
                    case '我的订单！':
                        return $this->order();
                        break;
                }
            }

        });

        return $server->serve();
    }


    //精选推荐
    private function is_recommend()
    {
        $goods = Good::where('best', true)
            ->orderBy('onsale', "desc")
            ->orderBy('created_at')
            ->take(6)
            ->get();

        $news = [];
        foreach ($goods as $p) {
            $news[] = new News([
                'title' => $p->name,
                'description' => $p->desc,
                'url' => 'http://mi.xnvalley.com/good/' . $p->id,
                'image' => 'http://mi.xnvalley.com/' . $p->thumb,
            ]);
        }
        return $news;
    }

    //人气热卖
    private function is_hot()
    {
        $goods = Good::where('hot', true)
            ->orderBy('onsale', "desc")
            ->orderBy('created_at')
            ->take(6)
            ->get();

        $news = [];
        foreach ($goods as $p) {
            $news[] = new News([
                'title' => $p->name,
                'description' => $p->desc,
                'url' => 'http://mi.xnvalley.com/good/' . $p->id,
                'image' => 'http://mi.xnvalley.com/' . $p->thumb,
            ]);
        }
        return $news;
    }

    //新品到货
    private function is_new()
    {
        $goods = Good::where('new_good', true)
            ->orderBy('onsale', "desc")
            ->orderBy('created_at')
            ->take(6)
            ->get();

        $news = [];
        foreach ($goods as $p) {
            $news[] = new News([
                'title' => $p->name,
                'description' => $p->desc,
                'url' => 'http://mi.xnvalley.com/good/' . $p->id,
                'image' => 'http://mi.xnvalley.com/' . $p->thumb,
            ]);
        }
        return $news;
    }

    function order($openid)
    {
        $weixin_user = Weixin_user::where('openid', $openid)->first();

        //如果用户还不存在,直接返回
        if (!$weixin_user) {
            return '你没有未完成的订单, 马上去购物吧~';
        }

        $order_status = config('shop_express.order_status');
        $orders = Order::where('status', '<', 5)
            ->where('weixin_user_id', $weixin_user->id)
            ->with('order_goods.good')
            ->orderBy('status')
            ->take(6)
            ->get();

        if ($orders->isEmpty()) {
            return '你没有未完成的订单, 马上去购物吧~';
        }

        $news = [];
        foreach ($orders as $order) {

            $news[] = new News([
                'title' => '订单号' . $order->id . " (" . $order_status[$order->status] . ")",
                'url' => 'http://mi.xnvalley.com/order/show/' . $order->id,
                'image' => 'http://mi.xnvalley.com/' . $order->order_goods->first()->good->thumb,
            ]);
        }
        return $news;
    }

    function default_msg()
    {
        return '我只是个宝宝！~';
    }
}