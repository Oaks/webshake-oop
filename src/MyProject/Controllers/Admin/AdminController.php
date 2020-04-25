<?php

namespace MyProject\Controllers\Admin;

use MyProject\Controllers\AbstractController;
use MyProject\Exceptions\AdminException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Users\User;
use MyProject\Services\Logger;

class AdminController extends AbstractController
{
    public function __construct() {
        parent::__construct();
        if (empty($this->user)) {
            throw new UnauthorizedException();
        }

        if ( !$this->user->isAdmin()) {
            throw new AdminException("У вас нет прав администратора");
        }
    }

    public function users()
    {
        /* $this->log(sprintf("\n%s\n%s", "Logged user", print_r($this->user,true))); */
        $users = User::findAll();
        /* $this->log(sprintf("%s",  print_r($users,true))); */
        $this->view->renderHtml('admin/users.php', ['users' => $users]);

    }
}
