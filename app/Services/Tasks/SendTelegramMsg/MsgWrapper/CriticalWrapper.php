<?php

namespace App\Services\Tasks\SendTelegramMsg\MsgWrapper;

class CriticalWrapper
{
    public static function run(string $message): string
    {
        return '🚨' . $message . '🚨';
    }
}
