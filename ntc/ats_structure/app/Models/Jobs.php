<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jobs extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'ats_jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'creator_id',
        'job_code',
        'job_title',
        'job_description',
        'status',
        'contract_type',
        'hiring_start_date',
        'hiring_end_date',
        'created_at',
        'updated_at'
    ];
}