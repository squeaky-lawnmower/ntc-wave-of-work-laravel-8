<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Messages extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'ats_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'original_sender_id',
        'original_receiver_id',
        'created_at',
        'updated_at'
    ];

    public function sender() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'original_sender_id');
    }

    public function receiver() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'original_receiver_id');
    }
}
