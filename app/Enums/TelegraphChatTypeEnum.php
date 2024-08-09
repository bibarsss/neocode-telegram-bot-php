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

    public static function getAllNames(): array
    {
        return [
            self::private->name,
            self::group->name,
            self::channel->name,
        ];
    }
}
