<?php

namespace App\Models;

use App\Models\User;
use App\Models\JobApplications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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
        'job_tasks',
        'status',
        'contract_type',
        'hiring_start_date',
        'hiring_end_date',
        'created_at',
        'updated_at'
    ];

    public function creator() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jobApplications() : HasManyThrough
    {
        return $this->hasManyThrough(JobApplications::class);
    }
}