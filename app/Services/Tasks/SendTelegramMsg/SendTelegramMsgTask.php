<?php

namespace App\Services\Tasks\SendTelegramMsg;

use App\Enums\MsgTypeEnum;
use App\Enums\TelegraphChatTypeEnum;
use App\Services\Tasks\SendTelegramMsg\MsgWrapper\WrapFactory;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Support\Facades\Http;
use Mockery\Exception;

class SendTelegramMsgTask extends SendTelegramMsgAbstract
{
    public function run(string $msg, ?string $msgType = MsgTypeEnum::critical->name, ?string $type = TelegraphChatTypeEnum::private->name)
    {
        $botId = $this->getTelegramBotToken();
        $bot   = TelegraphBot::query()
            ->with(['chats'])
            ->where('token', $botId)
            ->first();

        if (!$bot) {
            throw new Exception('Bot not found');
        }

        $msg   = app(WrapFactory::class)->run($msg, $msgType);
        $chats = $bot
            ->chats()
            ->when(in_array($type, TelegraphChatTypeEnum::getAllNames(), true), function ($query) use ($type) {
                $query->where('type', $type);
            })
            ->get();
        foreach ($chats as $chat) {
            $chat_id = $chat->chat_id;
            Http::get("https://api.telegram.org/bot$botId/sendMessage?chat_id=$chat_id&text=$msg");
        }
    }
}
