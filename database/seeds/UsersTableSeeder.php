<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \DB::table('users')->insert(
//            [
//                'name' => 'Administrator',
//                'email' => 'admin@marketplace.com',
//                'email_verified_at' => now(),
//                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//                'remember_token' => '$2y$10$92IXUNpkjO0rOQ5byMi',
//            ]
//        );
        factory(User::class, 40)->create()->each(function ($user) {
            $user->store()->save(factory(\App\Store::class)->make());
        });
    }
}
