<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $imageUrl = 'https://preview.colorlib.com/theme/magdesign/images/';
    return [
        'title' => $faker->words(rand(3, 5), true),
        'category_id' => rand(1, 5),
        'description' => $faker->paragraph,
        'image' => $faker->randomElement([$imageUrl . 'img_3.jpg', $imageUrl . 'img_4.jpg', $imageUrl . 'img_5.jpg', $imageUrl . 'img_6.jpg'])
    ];
});
