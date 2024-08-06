<?php

namespace App\Http\Controllers;


use App\Enums\MsgTypeEnum;
use App\Models\User;
use App\Services\Tasks\SendTelegramMsg\SendTelegramMsgTask;

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

    public function critical()
    {
        $this->sendTelegramMsgTask->run('owibka', MsgTypeEnum::critical->name);
    }

    public function warning()
    {
        $this->sendTelegramMsgTask->run('owibka', MsgTypeEnum::warning->name);
    }
}
