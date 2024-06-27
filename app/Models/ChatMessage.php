<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatMessage extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'chat_id',
        'user_id',
        'message',
    ];

    function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function chat() : BelongsTo {
        return $this->belongsTo(Chat::class, 'chat_id', 'id');
    }

    function images() : HasMany {
        return $this->hasMany(ChatMessageImage::class, 'chat_message_id', 'id');
    }

}
