<?php

namespace App\ViewModels;

use Domains\Course\Models\Level;
use Domains\Course\Models\Topic;
use Domains\Course\Repositories\CourseRepository;

class ClassroomViewModel extends ClassSchedulesViewModel
{
    public function __construct(
        private CourseRepository $courseRepository,
        private string $courseSlug,
        private string $levelTitle,
        private string $topicSlug
    ) {
    }

    public function course()
    {
        return $this->courseRepository->getByColumn($this->courseSlug, 'slug');
    }

    public function level()
    {
        $level = $this->course()->levels()->whereTitle($this->levelTitle)->first();

        if (!$this->canTakeNewLecture($level)) {
            // toast("There is no new lecture today");
            return $this->userCourse()?->activeTopic()->level;
        }

        if (!$this->canStartNewLevel($level)) {
            // toast("You need to complete previous levels first!");
            return $this->userCourse()?->activeTopic()->level;
        }

        return $level;
    }

    public function topic()
    {
        $topic = $this->level()->topics()->whereSlug($this->topicSlug)->first();

        if (empty($topic)) {
            return $this->level()->currentLevelTopic($this->userCourse())['topic'];
        }

        if (! $this->canTakeNewTopic($topic)) {
            if ($this->userCourse()->userCompletedCourseTopics()->where('topic_id', $topic?->id)->doesntExist()) {
                return $this->level()->currentLevelTopic($this->userCourse())['topic'];
            } else {
                return $topic;
            }
        }

        return $topic;
    }

    public function availableTopics()
    {
        if ($this->isLectureDay()) {
            return $this->level()->topics;
        }

        return $this->userCourse()
            ->userCompletedCourseTopics()
            ->where('level_id', $this->level()->id)
            ->orderBy('id', 'ASC')
            ->get();
    }

    public function changeCurrentTopic(): void
    {
        $this->userCourse()->userCompletedCourseTopics()
            ->where('level_id', $this->level()->id)
            ->where('is_current', true)
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

    private function previousLevelsCompleted(Level $currentLevel)
    {
        return match ($currentLevel->name) {
            '100' => true,
            '200' => Level::whereIn('name', ['100'])->get()->every(fn ($level) => $level->completed()),
            '300' => Level::whereIn('name', ['100', '200'])->get()->every(fn ($level) => $level->completed()),
            '400' => Level::whereIn('name', ['100', '200', '300'])->get()->every(fn ($level) => $level->completed())
        };
    }

    public function canTakeNewLecture(Level $level)
    {
        return
            $this->userCourse()->userCompletedCourseTopics()->where('level_id', $level->id)->doesntExist() &&
            $this->isLectureDay();
    }

    public function canStartNewLevel(Level $level)
    {
        return
            $this->userCourse()->userCompletedCourseTopics()->where('level_id', $level->id)->doesntExist() &&
            $this->previousLevelsCompleted($level);
    }

    public function canTakeNewTopic(Topic $topic)
    {
        return
            $this->userCourse()->userCompletedCourseTopics()->where('topic_id', $topic?->id)->doesntExist() &&
            $this->isLectureDay() &&
            $this->hasMoreTopicsForTheDay();
    }
}
