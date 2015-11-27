<?php

namespace App\Http\Middleware;

use Closure;
use App\EntrySetting;

class DateMiddleware
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
        $start = $this->setting->getStartDate();
        $end = $this->setting->getEndDate();
        $notice = html_entity_decode($this->setting->getNotice());
        $closed = $this->setting->getStatus();

        if ( !$closed ) {
            return view('welcome', compact('start', 'end', 'notice'));
        }
        return $next($request);
    }
}
