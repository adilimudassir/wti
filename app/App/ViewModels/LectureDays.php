<?php

namespace App\ViewModels;

trait LectureDays
{
    public array $lectureDays = [
        'Monday',
        'Tuesday',
        'Wednesday',
    ];

    public array $lectureWeeks = [
        '100' => 3,
        '200' => 3,
        '300' => 4
    ];

    public function isLectureDay()
    {
        return in_array(now()->englishDayOfWeek, $this->lectureDays);
    }

    public function batchOngoing()
    {
        return $this->userCourse()?->batch?->isActive();
    }

    public function userCourse()
    {
        return session('userCourse');
    }
}
