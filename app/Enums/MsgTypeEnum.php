<?php

namespace App\Enums;

enum MsgTypeEnum: string
{
    case critical = 'Критическая';
    case warning = 'Предупреждение';
}
