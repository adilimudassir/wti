<?php

namespace Domains\Course\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Domains\General\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends BaseModel
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'title',
        'description',
        'cost',
        'duration',
        'outline',
        'allow_partial_payments',
        'partial_payments_allowed',
        'is_active',
        'partial_payments',
    ];

    protected $casts = [
        'partial_payments' => 'array',
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

    /**
     * Get Payable Course Cost
     */
    public function getPayableCost($paymentType = 'Complete')
    {
        if ($this->allow_partial_payments && $paymentType === 'Partial') {
            return $this->cost / $this->partial_payments_allowed;
        }

        return $this->cost;
    }

    /**
     * Get Course Batches
     */
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    public function userCourses()
    {
        return $this->hasMany(UserCourse::class);
    }
}
