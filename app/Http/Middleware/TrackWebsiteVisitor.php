<?php

namespace App\Http\Middleware;

use App\Models\WebsiteVisitor;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackWebsiteVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // hanya track GET request
        if (! $request->isMethod('get')) {
            return $response;
        }

        // skip admin / auth / filament
        if (
            $request->is('admin*') ||
            $request->is('dashboard*') ||
            $request->is('login') ||
            $request->is('register') ||
            $request->is('logout') ||
            $request->is('filament*')
        ) {
            return $response;
        }

        $ip = $request->ip();
        $today = Carbon::today(); // 2026-07-07 00:00:00

        $alreadyVisited = WebsiteVisitor::where('ip_address', $ip)
            ->where('visited_at', $today)
            ->exists();

        if (! $alreadyVisited) {
            WebsiteVisitor::create([
                'ip_address' => $ip,
                'user_agent' => $request->userAgent(),
                'visited_at' => $today,
            ]);
        }

        return $response;
    }
}