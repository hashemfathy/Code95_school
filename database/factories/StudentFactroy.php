<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'parent_phone'=>$faker->e164PhoneNumber ,
        'user_id'=>'151',
        'classroom_id'=>'5',
        'level_id'=>'2',
    ];
});
