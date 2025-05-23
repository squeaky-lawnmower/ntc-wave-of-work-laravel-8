<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserExperience extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'ats_user_experience';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'company',
        'position',
        'description',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'created_at',
        'updated_at'
    ];
}
