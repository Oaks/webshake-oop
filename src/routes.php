<?php

return [
        '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
        '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
        '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
        '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
        '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
        '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
       ];
