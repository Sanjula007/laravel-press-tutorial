<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 6:01 PM
 */

use Illuminate\Support\Str;

$factory->define(\sanjula007\Press\Post::class, function (\Faker\Generator $faker) {
    return [
        'identifier' => Str::random(12),
        'slug'       => str_slug($faker->sentence),
        'title'      => $faker->sentence,
        'body'       => $faker->paragraph,
        'extra'      => json_encode([]),
    ];
});
