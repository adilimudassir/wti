<?php

namespace Domains\Course\Models;

use Spatie\Sluggable\HasSlug;
use Domains\Course\Models\Level;
use Spatie\Sluggable\SlugOptions;
use Domains\General\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends BaseModel
{
    use HasFactory, HasSlug;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'level_id'
    ];
    
    /**
     * Get the level that owns the topic.
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
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
