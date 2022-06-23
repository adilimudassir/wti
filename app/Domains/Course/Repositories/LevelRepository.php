<?php

namespace Domains\Course\Repositories;

use Domains\Course\Models\Level;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Http\Requests\LevelFormRequest;
use Domains\General\Exceptions\GeneralException;

class LevelRepository extends BaseRepository
{
    /**
     * create instance of the class.
     *
     * @param Level $level
     */
    public function __construct(Level $level)
    {
        $this->model = $level;
    }

    public function create(LevelFormRequest $request): Level
    {
        return DB::transaction(function () use ($request) {
            $newLevel = $this->model::create($this->fields($request->all()));

            if (!$newLevel) {
                throw new GeneralException('Level could not be created at the moment');
            }

            return $newLevel;
        });
    }

    public function update(LevelFormRequest $request, Level $level): Level
    {
        return DB::transaction(function () use ($request, $level) {
            if (!$level->update($this->fields($request->all()))) {
                throw new GeneralException('Level Could not be updated');
            }

            return $level;
        });
    }
}
