<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyJob extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'company_id',
        'category_id',
        'about',
        'salary',
        'skill_level',
        'location',
        'type',
        'is_open',
        'thumbnail'
    ];

    // Relasi dengan perusahaan
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relasi dengan kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi dengan responsibilities
    public function responsibilities()
    {
        return $this->hasMany(JobResponsibility::class);
    }

    // Relasi dengan candidates
    public function candidates()
    {
        return $this->hasMany(JobCandidate::class);
    }

    // Relasi dengan qualifications
    public function qualifications()
    {
        return $this->hasMany(JobQualification::class);
    }
}
