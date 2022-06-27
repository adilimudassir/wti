<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ClassSchedulesViewModel extends ViewModel
{
    use LectureDays;

    public function dayOfTheWeek()
    {
        return [
            'day' => now()->englishDayOfWeek,
            'description' => match ($this->isLectureDay()) {
                true => 'Study Day',
                false => 'Review Day'
            }
        ];
    }

    public function totalLectureDays()
    {
        return @$this->lectureWeeks[$this->level()?->name] * count($this->lectureDays);
    }

    public function totalTopics()
    {
        return $this->level()?->topics->count();
    }

    public function totalTopicsPerDay()
    {
        return floor($this->totalTopics() / max($this->totalLectureDays(), 1));
    }

    public function level()
    {
        return session('userCourse')?->activeTopic()->level;
    }

    public function topicsDoneAlready()
    {
        return session('userCourse')
            ?->userCompletedCourseTopics()
            ->where('level_id', $this->level()?->id)
            ->get();
    }

    public function topicsDoneToday()
    {
        return session('userCourse')
            ?->userCompletedCourseTopics()
            ->where('level_id', $this->level()?->id)
            ->whereDate('created_at', Carbon::today()->toDateString())
            ->get();
    }

    public function hasMoreTopicsForTheDay()
    {
        return $this->topicsDoneToday()?->count() < $this->totalTopicsPerDay();
    }
}
