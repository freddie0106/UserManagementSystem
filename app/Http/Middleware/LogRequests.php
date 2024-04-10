<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;


class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $requestData = [
            'IP' => $request->ip(),
            'User Agent' => $request->header('User-Agent'),
            'User Type' => auth()->check() ? 'Authenticated' : 'Guest',
            'User ID' => auth()->id(),
            'RequestId' => uniqid(),
            'Input' => $request->all(),
            'Route' => $request->route()->getName(),
        ];

        // JSON格式化输出
        //Log::info("Request Logged:\n" . json_encode($requestData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        Log::info("Request Logged: " . json_encode($requestData, JSON_UNESCAPED_SLASHES));

        return $next($request);
    }
}
