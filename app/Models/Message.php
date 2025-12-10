<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Channel;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'content',
        'user_id',
        'channel_id',
    ];

    /**
     * Get the user who sent the message.
     */

    public function user(): BelongsTo

    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user who sent the message.
     */

    public function channel(): BelongsTo

    {
        return $this->belongsTo(Channel::class);
    }

}
