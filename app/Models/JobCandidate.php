<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobCandidate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'candidate_id',
        'message',
        'resume',
        'is_hired',
        'company_job_id'
    ];

    // Relasi dengan user (candidate)
    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    // Relasi dengan job
    public function job()
    {
        return $this->belongsTo(CompanyJob::class, 'company_job_id');
    }
}
