<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessageImage extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'chat_message_id',
        'name',
        'path',
    ];

    function message() : BelongsTo {
        return $this->belongsTo(ChatMessage::class, 'chat_message_id', 'id');
    }

}
