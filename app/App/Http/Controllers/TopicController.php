<?php

namespace App\Http\Controllers;

use Domains\Course\Models\Course;
use App\Http\Requests\TopicFormRequest;
use Domains\Course\Repositories\TopicRepository;

class TopicController extends Controller
{
    /**
     *
     * Create a new controller instance.
     */
    public function __construct(private TopicRepository $topicRepository)
    {
        $this->middleware('auth');
    }

    /**
     *
     * Create a new topic.
     */
    public function create($slug)
    {
        $course = Course::where('slug', $slug)->first();
        return view('topics.create', [
            'course' => $course,
            'levels' => $course->levels->pluck('title', 'id'),
            'topics' => $course->topics->pluck('title', 'id')
        ]);
    }

    /**
     *
     * Store a newly created topic in storage.
     */
    public function store(TopicFormRequest $request)
    {
        $topic = $this->topicRepository->create($request);

        return redirect()
            ->route('topics.show', [$topic->slug, 'course' => $topic->level?->course?->slug])
            ->withFlashSuccess('Topic Added Successfully!');
    }

    /**
     *
     * display a topic.
     */
    public function show($slug)
    {
        return view('topics.show', [
            'topic' => $this->topicRepository->findBySlug($slug)
        ]);
    }

    /**
     *
     * show the form for editing the specified topic.
     */
    public function edit($id)
    {
        $topic = $this->topicRepository->getById($id);

        $course = $topic->level?->course;

        return view('topics.edit', [
            'course' => $course,
            'topic' => $topic,
            'levels' => $course->levels->pluck('title', 'id'),
            'topics' => $course->topics->pluck('title', 'id')
        ]);
    }

    /**
     *
     * Update the specified topic in storage.
     */
    public function update(TopicFormRequest $request, $id)
    {
        $topic = $this->topicRepository->getById($id);

        $this->topicRepository->update($request, $topic);

        return redirect()
            ->route('topics.show', [$topic->slug, 'course' => $topic->level?->course?->slug])
            ->withFlashSuccess('Topic Updated Successfully!');
    }

    /**
     *
     * Remove the specified topic from storage.
     */
    public function destroy($id)
    {
        $topic = $this->topicRepository->getById($id);

        $topic->delete();

        $course = $topic->level?->course;

        return redirect()
            ->route('courses.overview', $course->slug)
            ->withFlashSuccess('Topic Deleted Successfully!');
    }
}
