<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Domains\Course\Repositories\CourseRepository;

class ClassroomViewModel extends ViewModel
{
    private array $lessonDays = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday'
    ];

    public bool $isLessonDay = false;
    
    public function __construct(
        private CourseRepository $courseRepository,
        private string $courseSlug,
        private string $levelTitle,
        private string $topicSlug
    ){
        $this->setIsLessonDay();
        
        if ($this->isLessonDay) {
            $this->changeCurrentTopic();
        } else {
            
        }
    }

    private function setIsLessonDay()
    {
        $this->isLessonDay = in_array(now()->englishDayOfWeek, $this->lessonDays);
    }

    private function changeCurrentTopic() : void
    {    
        $this->userCourse()->userCompletedCourseTopics()
            ->where('level_id', $this->level()->id)
            ->update([
                'is_current' => false
            ]);

        $this->userCourse()->userCompletedCourseTopics()->firstOrCreate([
            'topic_id' => $this->topic()->id,
            'level_id' => $this->level()->id,
        ], [
            'time_visited' => now(),
            'is_current' => true
        ]);
    }

    public function course()
    {
        return $this->courseRepository->getByColumn($this->courseSlug, 'slug');
    }

    public function level()
    {
        $level = $this->course()->levels()->whereTitle($this->levelTitle)->first();

        if ($this->isLessonDay) {
            return $level;
        }
        
        if ($this->userCourse()->userCompletedCourseTopics()->where('level_id', $level->id)->count() > 0) {
            return $level;
        }
        
        return $this->course->levels()->first();
    }

    public function topic()
    {
        $topic = $this->level()->topics()->whereSlug($this->topicSlug)->first();
        
        if ($this->isLessonDay) {
            return $topic;
        }

        if ($this->userCourse()->userCompletedCourseTopics()->where('topic_id', $topic->id)->count() > 0) {
            return $topic;
        }

        return $this->level()->topics()->first();
    }

    public function userCourse()
    {
        return auth()->user()->courses()->where('course_id', $this->course()->id)->first();
    }

    public function availableTopics()
    {
        if ($this->isLessonDay) {
            return $this->level()->topics;
        }

        return $this->userCourse()->userCompletedCourseTopics()->where('level_id', $this->level()->id)->orderBy('id', 'ASC')->get();
    }
}
