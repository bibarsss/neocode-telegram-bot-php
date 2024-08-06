<?php

namespace App\Services\Tasks\SendTelegramMsg\MsgWrapper;

class WarningWrapper
{
    public static function run(string $message): string
    {
        return '⚠️' . $message . '⚠️';
        }
}
