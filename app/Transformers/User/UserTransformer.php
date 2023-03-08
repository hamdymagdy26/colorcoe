<?php

namespace App\Transformers\User;

class UserTransformer 
{
    public static function transformToCreateSalonUser($user, $salonId)
    {
        return [
            'user_id' => $user->id,
            'salon_id' => $salonId
        ];
    }
}