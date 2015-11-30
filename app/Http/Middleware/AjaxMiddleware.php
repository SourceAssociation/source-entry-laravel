<?php

namespace App\Http\Middleware;

use Closure;
use App\EntrySetting;

class AjaxMiddleware
{
    protected $setting;

    public function __construct(EntrySetting $st)
    {
        $this->setting = $st;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $closed = $this->setting->getStatus();
        $results['error'] = 1004;
        $results['msg'][0]['key'] = '站点提示！';
        if ( !$closed ) {
            $results['msg'][0]['value'] = '站点未开启！请在开启期间操作！';
            return response()->json($results);
        }

        if ($request->ajax()) {
            return $next($request);
        }else{
            $results['msg'][0]['value'] = '该操作无效！';
            return response()->json($results);;
        }

    }
}
