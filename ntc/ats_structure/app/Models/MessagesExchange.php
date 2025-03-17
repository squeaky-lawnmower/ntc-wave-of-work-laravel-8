<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MessagesExchange extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'ats_messages_exchange';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'message_id',
        'sender_id',
        'message',
        'created_at',
        'updated_at'
    ];

    public function sender() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

}
