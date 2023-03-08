<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use App\Utility\UserTypes;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $demoUser = User::create([
            'name'              => $faker->name,
            'mobile'            => $faker->phoneNumber,
            'type'              => UserTypes::TYPE_ADMIN,
            'email'             => 'demo@demo.com',
            'image'             => 'test',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'api_token'         => Hash::make('demo@demo'),
        ]);

        $demoUser2 = User::create([
            'name'        => $faker->name,
            'mobile'            => $faker->phoneNumber,
            'email'             => 'admin@demo.com',
            'type'              => UserTypes::TYPE_ADMIN,
            'image'             => 'test',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'api_token'         => Hash::make('admin@demo'),
        ]);
    }
}
