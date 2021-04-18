<?php
/*
 *  Project Name: CST-256-CLC - Version: 2.0 The End
 *    Group Name: IDK
 *   Module Name: Logging Module
 *   Programmers: Safa Bayraktar & Jacob Cauthren
 *          Date: 4/17/2021
 *
 *      First MyLogger service that handles all the logging into the local machine\
 *   for debugging and testing purposes.
 */

namespace App\Services\Utility;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class MyLogger1 implements ILogger
{

    private static $logger = null;

    static function getLogger()
    {
        if (self::$logger == null) {
            self::$logger = new Logger('CST256CLC');
            $stream = new StreamHandler('php://stdout', Logger::DEBUG);
            $stream = new StreamHandler('C:\MAMP\htdocs\CST-256-CLC\storage\logs\CST256CLC.log', Logger::DEBUG);
            // $stream = new StreamHandler('storage/logs/LaravelApp.log', Logger::DEBUG);
            $stream->setFormatter(new LineFormatter("%datetime% : %level_name% : %message% %context%\n", "g:iA n/j/Y"));
            self::$logger->pushHandler($stream);
        }
        return self::$logger;
    }

    public static function debug($message, $data = array())
    {
        self::getLogger()->debug($message, $data);
    }

    public static function info($message, $data = array())
    {
        self::getLogger()->info($message, $data);
    }

    public static function warning($message, $data = array())
    {
        self::getLogger()->warning($message, $data);
    }

    public static function error($message, $data = array())
    {
        self::getLogger()->error($message, $data);
    }
}