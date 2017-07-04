<?php
/**
 * Created by PhpStorm.
 * User: cheney
 * Date: 2017/7/4
 * Time: 22:15
 */
namespace App\Http\Middleware;
use Closure;
class Activity
{
    public function handle($request,Closure $next)
    {
        //如果当前时间小于活动时间，跳转到活动宣传页面
        if(time()<strtotime('2017-07-02'))
        {
            return redirect('student/activity0');
        }

        //否则执行下一个请求
        return $next($request);
    }
}