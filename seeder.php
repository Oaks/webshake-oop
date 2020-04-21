<?php

require_once 'vendor/autoload.php';

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

$USER = 'MyProject\Models\Users\User';

/* function bindUser($user, $property, $value) { */
/*     Closure::bind(function($v) use ($property) {$this->{$property} = $v;} , $user, $USER)($value); */
/* } */

function bindObj($obj, $class) {
    return function($property, $value) use ($obj, $class) {
        Closure::bind(function($v) use ($property) {$this->{$property} = $v;} , $obj, $class)($value);
    };
}

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

$users = [];
for ($i = 0; $i < 2; $i++) {
    $user = new User;
    $bindUser = bindObj($user, $USER);

    $bindUser( 'id',            null);
    $bindUser( 'nickname',      lcfirst($faker->firstName));
    $bindUser( 'email',         $faker->email);
    $bindUser( 'isConfirmed',   $faker->boolean);
    $bindUser( 'role',          $faker->boolean ? 'admin' : 'user');
    $bindUser( 'passwordHash',  '$2y$10$217fthMDr6ChcKIJIABvNOi0G2fDtGD1QMOuPPjboetzY8mKVt7nq');
    $bindUser( 'auth_token',    'auth_token');
    $bindUser( 'createdAt',     $faker->dateTime->format('Y-m-d H:i:s'), 'Europe/Kyiv');

    $user->save();


    $users[] = $user;
}

echo count($users) . PHP_EOL;
var_export($users);

$article = new Article();
