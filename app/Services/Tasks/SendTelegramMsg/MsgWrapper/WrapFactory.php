<?php

namespace App\Services\Tasks\SendTelegramMsg\MsgWrapper;

use App\Enums\MsgTypeEnum;

class WrapFactory
{
    public function run(string $msg, string $msgType): string
    {
        return match ($msgType) {
            MsgTypeEnum::critical->name => app(CriticalWrapper::class)->run($msg),
            MsgTypeEnum::warning->name => app(WarningWrapper::class)->run($msg),
            default => $msg
        };
    }
}
