<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Weixin_user;

/**
 * Class OAuthAuthenticate
 */
class WechatAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $wechat = app('EasyWeChat\\Foundation\\Application');


        if (!session('weixin_user')) {
            if ($request->has('state') && $request->has('code')) {
                $user = $wechat->oauth->user()->original;
                $check = Weixin_user::where("openid", $user['openid'])->first();

                if (!$check) {
                    $weixin_user = Weixin_user::create([
                        'openid' => $user['openid'],
                        'sex' => $user['sex'],
                        'nickname' => $user['nickname'],
                        'city' => $user['city'],
                        'province' => $user['province'],
                        'headimgurl' => $user['headimgurl']
                    ]);
                } else {
                    //如果数据库中已经有了当前用户
                    $weixin_user = $check;
                }
                session()->put('weixin_user', $weixin_user);
                return redirect()->to($this->getTargetUrl($request));
            }
            return $wechat->oauth->redirect($request->fullUrl());
        }

        return $next($request);
    }

    /**
     * Build the target business url.
     *
     * @param Request $request
     *
     * @return string
     */
    public function getTargetUrl($request)
    {
        $queries = array_except($request->query(), ['code', 'state']);
        return $request->url() . (empty($queries) ? '' : '?' . http_build_query($queries));
    }
}
