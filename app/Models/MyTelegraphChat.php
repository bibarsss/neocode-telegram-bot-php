<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphChat;

class MyTelegraphChat extends TelegraphChat
{
    protected $table = 'telegraph_chats';
    protected $fillable = [
        'chat_id',
        'name',
        'type'
    ];
}
