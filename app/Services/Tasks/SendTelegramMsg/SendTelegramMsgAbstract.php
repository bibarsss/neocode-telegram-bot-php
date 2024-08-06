<?php

namespace App\Services\Tasks\SendTelegramMsg;

abstract class SendTelegramMsgAbstract
{
    private readonly string $telegramBotToken;

    public function __construct()
    {
        $this->telegramBotToken = env('TELEGRAM_BOT_TOKEN');
    }

    public function getTelegramBotToken(): string
    {
        return $this->telegramBotToken;
    }

    abstract public function run(string $msg, ?string $msgType, ?string $type);
}
