<?php

namespace App\Models;

use App\Models\Jobs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'application_start_date',
        'application_end_date',
        'hired_by',
        'created_at',
        'updated_at'
    ];

    public function jobDetails() : HasOne
    {
        return $this->hasOne(Jobs::class, 'id', 'job_id');
    }
}
