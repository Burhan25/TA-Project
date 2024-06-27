<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'replied',
        'created_by',
        'title',
        'category'
    ];

    function user() : BelongsTo {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    function messages() : HasMany {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'id');
    }
}
