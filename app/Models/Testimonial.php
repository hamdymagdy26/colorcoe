<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_ar',
        'title_en',
        'content_ar',
        'content_en',
        'author',
        'source_ar',
        'source_en',
    ];

    protected $table = "testimonial";

    /**
     * Get the options for generating the slug.
     */
    protected static function boot() {
		
		parent::boot();
		
		static::addGlobalScope('testimonial', function(Builder $builder) {
			$builder->orderBy('created_at', 'desc')->where('deleted_at', NULL);
		});
	}
}
