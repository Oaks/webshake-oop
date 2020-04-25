<?php

return [
        '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
        '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
        '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
        '~^users/login~' => [\MyProject\Controllers\UsersController::class, 'login'],
        '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
        '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
        '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
        '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
        '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\ArticlesController::class, 'addComment'],
        '~^comments/(\d+)/edit$~' => [\MyProject\Controllers\CommentsController::class, 'edit'],
        '~^admin/users$~' => [\MyProject\Controllers\Admin\AdminController::class, 'users'],
        '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
       ];
