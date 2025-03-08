<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class JobApplications extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'ats_job_applications';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'job_id',
        'status',
        'contract_type',
        'application_start_date',
        'application_end_date',
        'hired_by',
        'created_at',
        'updated_at'
    ];
}
