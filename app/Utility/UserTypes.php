<?php

namespace App\Utility;

class UserTypes
{
    const TYPE_ADMIN = 1;
    const TYPE_SALON = 2;
    const TYPE_CUSTOMER = 3;

    public static function types(): array
    {
        return [
            self::TYPE_ADMIN,
            self::TYPE_SALON,
            self::TYPE_CUSTOMER,
        ];
    }

    public static function typeName()
    {
        return [
            self::TYPE_ADMIN => 'Admin',
            self::TYPE_SALON => 'Salon',
            self::TYPE_CUSTOMER => 'Customer',
        ];
    }

    public static function spanClass()
    {
        return [
            self::TYPE_ADMIN => 'success',
            self::TYPE_SALON => 'warning',
            self::TYPE_CUSTOMER => 'info',
        ];
    }
}