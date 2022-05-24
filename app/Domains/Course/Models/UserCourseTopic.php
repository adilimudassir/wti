<?php

namespace Domains\Course\Models;

use Domains\Course\Models\Topic;
use Domains\Course\Models\UserCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCourseTopic extends Model
{
    use HasFactory;

    /**
     * Properties that are mass assignable
     */
    protected $fillable = [
        'user_course_id',
        'topic_id',
        'level_id',
        'time_visited',
        'is_current'
    ];

    /**
     * Get Topic
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * Get Level
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function userCourse()
    {
        return $this->belongsTo(UserCourse::class);
    }
}
