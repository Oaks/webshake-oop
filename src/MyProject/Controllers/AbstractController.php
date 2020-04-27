<?php

namespace MyProject\Controllers;

use MyProject\Models\Users\User;
use MyProject\Services\Logger;
use MyProject\Services\UsersAuthService;
use MyProject\View\View;

abstract class AbstractController
{
    use Logger;

    /** @var View */
    protected $view;

    /** @var User|null */
    protected $user;

    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();

        $templates = (require __DIR__ . '/../../settings.php')['templates'];
        $this->view = new View($templates);
        $this->view->setVar('user', $this->user);
    }
}
