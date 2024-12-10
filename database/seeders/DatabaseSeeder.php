<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Pasha',
                'email' => 'www@PashkaPASS555777',
                //         'password' => '555777',
                'email_verified_at' => NULL,
                // hash ниже
                'password' => '$2y$12$px9y5AgGxGjSOMKZ9vATN.6dDSYJ0UV6gsDns8YHbdEsLmcKSHd0W',
                'remember_token' => NULL,
            ],
            [
                'name' => 'Dany',
                'email' => 'www@DanykaPASS123123',
                //         'password' => '123123',
                'email_verified_at' => NULL,
                // hash ниже
                'password' => '$2y$12$JYokrB8a7Fe53.VUL3V3EesskuSb5luO8F/pz3OB8SjHxdxRKS9.G',
                'remember_token' => NULL,
            ],
            [
                'name' => 'Vova',
                'email' => 'www@VovanPass365365',
                //         'password' =>'365365',
                'email_verified_at' => NULL,
                // hash ниже
                'password' => '$2y$12$AQqA5EpxrCzML8XnEwbb3O7QkSu5hYHJLKMEuwYOkcOKDlxSnq5D.',
                'remember_token' => NULL,
            ],
        ];
        for ($i=0; $i < count($users); $i++) {
            User::factory(1, [
                'name' => $users[$i]['name'],
                'email' => $users[$i]['email'],
                'email_verified_at' => $users[$i]['email_verified_at'],
                // 'password' => static::$password ??= Hash::make('password'),
                'password' => $users[$i]['password'],
                'remember_token' => $users[$i]['remember_token'],
            ])
            ->hasPosts(1, function (array $attributes, User $user) {
                return [
                    'title' => $user->name,
                ];
            })->create();
        }
    }
}
