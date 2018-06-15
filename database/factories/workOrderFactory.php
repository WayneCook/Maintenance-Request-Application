<?php

use Faker\Generator as Faker;

$factory->define(App\workOrder::class, function (Faker $faker) {
    return [

      'name' => $faker->name,
      'unit_number' => rand(100, 199 ),
      'category' => $faker->word,
      'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
      'comments' => $faker->sentences($nb = 3, $asText = true),
      'permission_to_enter' => rand(0, 1),
      'created_at' => NOW()
    ];
});
