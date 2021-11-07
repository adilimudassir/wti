<?php

namespace Domains\Course\Repositories;

use Domains\Course\Models\Topic;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Http\Requests\TopicFormRequest;
use Domains\General\Exceptions\GeneralException;

class TopicRepository extends BaseRepository
{
    /**
     * create instance of the class.
     *
     * @param Topic $topic
     */
    public function __construct(Topic $topic)
    {
        $this->model = $topic;
    }

    public function create(TopicFormRequest $request): Topic
    {
        return DB::transaction(function () use ($request) {
            $newTopic = $this->model::create($this->fields($request->all()));

            if (!$newTopic) {
                throw new GeneralException('Topic could not be created at the moment');
            }
            
            return $newTopic;
        });
    }

    public function update(TopicFormRequest $request, Topic $topic): Topic
    {
        return DB::transaction(function () use ($request, $topic) {
            if (!$topic->update($this->fields($request->all()))) {
                throw new GeneralException('Topic Could not be updated');
            }

            return $topic;
        });
    }

    public function findBySlug(string $slug): Topic
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }
}
