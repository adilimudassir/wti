<?php

namespace Domains\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'active',
        'start_date',
        'end_date',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function userCourses()
    {
        return $this->hasMany(UserCourse::class);
    }

    public function started()
    {
        return $this->start_date->lessThan(now());
    }

    public function ended()
    {
        return $this->end_date->lessThan(now());
    }

    public function isActive()
    {
        return $this->started() && !$this->ended(); 
    }
}
