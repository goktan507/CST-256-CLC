<?php
/*
 *  Project Name: CST-256-CLC - Version: 2.0 The End
 *    Group Name: IDK
 *   Module Name: Logging Module
 *   Programmers: Safa Bayraktar & Jacob Cauthren
 *          Date: 4/17/2021
 *
 *      Logging Interface
 */
namespace App\Services\Utility;

interface ILogger
{
    static function getLogger();
    public static function debug($message, $data);
    public static function info($message, $data);
    public static function warning($message, $data);
    public static function error($message, $data);
}