<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialMedia extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'link',
        'image'
    ];

    protected $table = "social_medias";

    protected static function boot() {
		
		parent::boot();
		
		static::addGlobalScope('social_medias', function(Builder $builder) {
			$builder->orderBy('created_at', 'desc')->where('deleted_at', NULL);
		});
	}
}
