<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends BaseModel
{
    use SoftDeletes, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_ar',
        'title_en',
        'file',
        'content_ar',
        'content_en',
        'location_ar',
        'location_en',
        'scope_ar',
        'scope_en',
        'client',
        'date',
        'slug'
    ];

    protected $table = "projects";

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_en')
            ->saveSlugsTo('slug');
    }

    protected static function boot() {
		
		parent::boot();
		
		static::addGlobalScope('projects', function(Builder $builder) {
			$builder->orderBy('created_at', 'desc')->where('deleted_at', NULL);
		});
	}
}
