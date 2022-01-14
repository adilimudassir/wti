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

    public function userCourse()
    {
        return $this->belongsTo(UserCourse::class);
    }
}
