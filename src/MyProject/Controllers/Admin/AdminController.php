<?php

namespace MyProject\Controllers\Admin;

use MyProject\Controllers\AbstractController;

class AdminController extends AbstractController
{
    public function index()
    {
        /* $this->log($this->templates); */
        echo file_get_contents($this->templates . '/admin/layouts/starter.html');
    }
}
