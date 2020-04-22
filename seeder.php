<?php

require_once 'vendor/autoload.php';

use MyProject\Models\Articles\Article;
use MyProject\Models\Articles\Comment;
use MyProject\Models\Users\User;

$TIMEZONE = 'Europe/Kyiv';

function bindObj( $class) {
    return function($obj, $property, $value) use ( $class) {
        Closure::bind(function($v) use ($property) {$this->{$property} = $v;} , $obj, $class)($value);
    };
}

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

//  Generate users

$users = [];

for ($i = 0; $i < 2; $i++) {
    $user = new User;
    $bindUser = bindObj('MyProject\Models\Users\User');

    $bindUser( $user, 'id',            null);
    $bindUser( $user, 'nickname',      lcfirst($faker->firstName));
    $bindUser( $user, 'email',         $faker->email);
    $bindUser( $user, 'isConfirmed',   $faker->boolean);
    $bindUser( $user, 'role',          $faker->boolean ? 'admin' : 'user');
    $bindUser( $user, 'passwordHash',  '$2y$10$217fthMDr6ChcKIJIABvNOi0G2fDtGD1QMOuPPjboetzY8mKVt7nq');
    $bindUser( $user, 'auth_token',    'auth_token');
    $bindUser( $user, 'createdAt',     $faker->dateTime()->format('Y-m-d H:i:s'), 'Europe/Kyiv');

    $user->save();
    $users[] = $user;
}

/* var_export($users); */

// Generate articles

$articles = [];

array_walk($users, function($user) use (&$articles, $faker) {
    for ($i = 0; $i < 2; $i++) {
        $article = new Article();
        $bindArticle = bindObj('MyProject\Models\Articles\Article');

        $bindArticle($article, 'id',        null);
        $bindArticle($article, 'name',      $faker->sentence);
        $bindArticle($article, 'text',      $faker->paragraph);
        $bindArticle($article, 'authorId',  $user->getId());
        $bindArticle($article, 'createdAt', $faker->dateTimeBetween($user->getCreatedAt())->format('Y-m-d H:i:s'), $TIMEZONE);

        $article->save();
        $articles[] = $article;
    }
});

/* print_r($article); */

// Generate comments

$comments = [];

foreach ($articles as $article) {
    foreach ($users as $user) {
        $comment = new Comment;
        $bindComment = bindObj('MyProject\Models\Users\User');

        $bindComment( $comment, 'id',           null);
        $bindComment( $comment, 'comment',      $faker->paragraph);
        $bindComment( $comment, 'articleId',    $article->getID());
        $bindComment( $comment, 'authorId',     $user->getID());
        $bindComment( $comment, 'createdAt',    $faker->dateTime()->format('Y-m-d H:i:s'), $TIMEZONE);
        $bindComment( $comment, 'createdAt',    $faker->dateTimeBetween($article->getCreatedAt())->format('Y-m-d H:i:s'), $TIMEZONE);

        $comment->save();
        $comments[] = $comment;

    }
}

/* print_r($comments); */

echo "Generated:" . PHP_EOL;
echo count($users) . " users" . PHP_EOL;
echo count($articles). " articles" . PHP_EOL;
echo count($comments). " comments" . PHP_EOL;
