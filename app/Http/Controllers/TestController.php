<?php

namespace App\Http\Controllers;


use App\Enums\MsgTypeEnum;
use App\Enums\TelegraphChatTypeEnum;
use App\Models\User;
use App\Services\Tasks\SendTelegramMsg\SendTelegramMsgTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function __construct(
        private SendTelegramMsgTask $sendTelegramMsgTask,
    )
    {
    }

    public function __invoke()
    {
        $this->sendTelegramMsgTask->run('test');
    }

    public function critical(Request $request): void
    {
        $type = $request->type;
        $this->sendTelegramMsgTask->run('critical text', MsgTypeEnum::critical->name, $type);
    }

    public function warning(Request $request): void
    {
        $type = $request->type;
        $this->sendTelegramMsgTask->run('warning text', MsgTypeEnum::warning->name, $type);
    }
}
