<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSkill extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'ats_user_skill';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'skill_name',
        'created_at',
        'updated_at'
    ];
}
