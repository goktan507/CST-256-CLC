<?php
/*
 *  Project Name: CST-256-CLC - Version: 2.0 The End
 *    Group Name: IDK
 *   Module Name: Logging Module
 *   Programmers: Safa Bayraktar & Jacob Cauthren
 *          Date: 4/17/2021
 *
 *      Second MyLogger service that handles all the logging that is not
 *   specified to store logs in certain folders, used to view logs on 
 *   cloud hosting environment.
 */

namespace App\Services\Utility;

use Illuminate\Support\Facades\Log;

class MyLogger3 implements ILoggerService
{
    public function debug($message, $data=array())
    {
        Log::debug($message . (count($data) != 0 ? ' with data of ' . print_r($data, true) : ""));
    }

    public function info($message, $data=array())
    {
        Log::info($message . (count($data) != 0 ? ' with data of ' . print_r($data, true) : ""));
    }

    public function warning($message, $data=array())
    {
        Log::warning($message . (count($data) != 0 ? ' with data of ' . print_r($data, true) : ""));
    }

    public function error($message, $data=array())
    {
        Log::error($message . (count($data) != 0 ? ' with data of ' . print_r($data, true) : ""));
    }
}