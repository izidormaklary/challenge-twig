<?php

namespace App\Services;

class Logger
{
    public function log(string $message)
    {
            error_log($message."\n", 3, './log.info');
    }
}