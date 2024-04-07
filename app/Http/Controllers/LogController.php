<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;


class LogController extends Controller
{
    public function index()
    {
        $logPath = storage_path('logs/laravel.log');

        $logs = File::get($logPath);
        return view('logs.index', compact('logs'));
    }
}
