<?php

namespace App\Enums;

enum TelegraphChatTypeEnum: string
{
    case private = 'Приватный';
    case group = 'Группа';
    case channel = 'Канал';

    public static function getChannelGroupNames(): array
    {
        return [
            self::group->name,
            self::channel->name,
        ];
    }
}
