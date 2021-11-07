<?php

namespace Domains\Course\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Domains\General\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends BaseModel
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'description',
    ];

    
    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function topics()
    {
        return $this->hasManyThrough(Topic::class, Level::class);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
