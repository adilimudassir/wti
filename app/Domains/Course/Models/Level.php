<?php

namespace Domains\Course\Models;

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

    /**
     * Check User Level Progress
     */
    public function userLevelProgress(UserCourse $userCourse)
    {
        $user_course_topic = UserCourseTopic::where('user_course_id', $userCourse?->id)
            ->whereIn('topic_id', $this->topics()->pluck('id')->toArray())
            ->get();

        return collect([
            'total' => $this->topics()->count(),
            'completed' => $user_course_topic->count(),
            'percentage' => $user_course_topic->count() / ($this->topics()->count() ?: 1) * 100
        ]);
    }

    /**
     * Get The current level of the user
     */
    public function currentLevelTopic(UserCourse $userCourse)
    {
        $user_course_topic = UserCourseTopic::where('user_course_id', $userCourse->id)
            ->where('level_id', $this->id)
            ->where('is_current', true)
            ->first();

        return [
            'topic' => filled($user_course_topic) ? $user_course_topic->topic : $this->topics->first(),
            'level' => filled($user_course_topic) ? $user_course_topic->level : $this
        ];
    }
}
