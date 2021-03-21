<?php

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
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
        User::create([
            'first_name' => 'Administrator',
            'last_name' => 'One',
            'email' => 'admin@gmail.com',
            'role_id' => 81,
            'password' => bcrypt('mmmm')
        ]);
        User::create([
            'first_name' => 'User',
            'last_name' => 'One',
            'email' => 'user@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('mmmm')
        ]);

        Role::create(
            ['name' => 'Contributor', 'id' => 3]
        );
        Role::create(
            ['name' => 'Administrator', 'id' => 81]
        );

        factory(User::class, 5)->create()->each(function ($user) {
            $user->posts()->saveMany(factory(Post::class, rand(2, 3))->make());
        });
    }
}
