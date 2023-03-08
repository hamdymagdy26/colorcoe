<?php

namespace App\Models;

use App\Traits\UnixTimestampSerializable;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    use UnixTimestampSerializable;


    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
