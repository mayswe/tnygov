<?php

namespace App\Http\Middleware;

use App\SiteStatistic;
use Closure;
use Illuminate\Support\Facades\View;

class TrackSiteVisitor
{
    public function handle($request, Closure $next)
    {
        $stat = SiteStatistic::firstOrCreate(
            ['key' => 'total_visitors'],
            ['value' => 0]
        );

        if ($request->isMethod('get') && ! $request->is('admin/*') && ! $request->session()->has('site_visitor_counted')) {
            $stat->increment('value');
            $request->session()->put('site_visitor_counted', true);
            $stat->refresh();
        }

        View::share('totalVisitors', $stat->value);

        return $next($request);
    }
}
