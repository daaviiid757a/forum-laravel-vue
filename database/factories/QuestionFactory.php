<?php

use Faker\Generator as Faker;
use App\Question;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(5, 10)), '.'),
        'body' => $faker->paragraphs(rand(3, 7), true),
        'views' => rand(0, 10),
        // 'answers_count' => rand(0, 10),
        // 'votes_count' => rand(-5, 10)
    ];
});
