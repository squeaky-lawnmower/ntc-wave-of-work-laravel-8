<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class UserAbout extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'ats_user_about';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'about',
        'created_at',
        'updated_at'
    ];
}
