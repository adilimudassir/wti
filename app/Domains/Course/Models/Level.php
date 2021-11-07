<?php

namespace Domains\Course\Models;

use Domains\Course\Models\Course;
use Domains\General\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends BaseModel
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'title',
        'description',
        'course_id'
    ];

    /**
     * Get the course that owns the level.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the topics for the level.
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
