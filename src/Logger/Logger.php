<?php

namespace TheHeroGame\Logger;

final class Logger
{
    private static ?Logger $instance = null;
    private $logs;

    public static function getInstance(): Logger
    {
        if (null == static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function log($message)
    {
        $this->log[] = $message;
    }

    public function printLogs()
    {
        foreach($this->logs as $message) print($message);
    }

    /** its not allowed to call from outside */
    private function __construct()
    {
    }

    /** prevent from being unserialized (which would create a second instance of it) */
    private function __wakeup()
    {
    }

    /** prevent from being cloned (which would create a second instance of it) */
    private function __clone()
    {
    }
}