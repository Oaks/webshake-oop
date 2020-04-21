<?php

require_once 'vendor/autoload.php';

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

$USER = 'MyProject\Models\Users\User';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

$user = new User;

Closure::bind(function() {$this->id = null;} , $user, $USER)();
Closure::bind(function($nickname) {$this->nickname = $nickname;} , $user, $USER)(lcfirst($faker->firstName));
Closure::bind(function($email) {$this->email = $email;} , $user, $USER)($faker->email);
Closure::bind(function($isConfirmed) {$this->isConfirmed = $isConfirmed;} , $user, $USER)($faker->boolean);
Closure::bind(function($role) {$this->role = $role;} , $user, $USER)($faker->boolean ? 'admin' : 'user');
Closure::bind(function($passwordHash) {$this->passwordHash = $passwordHash;} , $user, $USER) 
    ('$2y$10$217fthMDr6ChcKIJIABvNOi0G2fDtGD1QMOuPPjboetzY8mKVt7nq');
Closure::bind(function($authToken) {$this->authToken = $authToken;} , $user, $USER)('auth_token');
Closure::bind(function($createdAt) {$this->createdAt = $createdAt;} , $user, $USER)($faker->dateTime->format('Y-m-d H:i:s'), 'Europe/Kyiv');


$user->save();

var_export($user);

$article = new Article();
