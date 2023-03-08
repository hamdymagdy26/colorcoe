<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'footer_info_ar',
        'footer_info_en',
        'who_are_we_ar',
        'who_are_we_en',
        'vision_ar',
        'vision_en',
        'mission_ar',
        'mission_en',
        'about_us_ar',
        'about_us_en',
        'projects_no',
        'clients_no',
        'testomnials_no',
        'profile',
        'address_ar',
        'address_en',
        'phone',
        'email'
    ];

    protected $table = "system_settings";
}
