<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'model_type',
        'model_id'
    ];

    protected $table = "medias";

    protected static function boot() {
		
		parent::boot();
		
		static::addGlobalScope('medias', function(Builder $builder) {
			$builder->orderBy('created_at', 'desc')->where('deleted_at', NULL);
		});
	}
}
