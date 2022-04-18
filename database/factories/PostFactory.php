<?php

use Faker\Generator as Faker;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factory;


/** @var Factory $factory */
$factory->define(Post::class, function (Faker $faker){
    return [
        'user_id' => 1,
        'title' => $faker->sentence(3),
        'content' => $faker->text(mt_rand(5, 240))
    ];
});