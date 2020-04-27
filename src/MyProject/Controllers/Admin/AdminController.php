<?php

namespace MyProject\Controllers\Admin;

use MyProject\Controllers\AbstractController;

class AdminController extends AbstractController
{
    public function index()
    {
        $this->log("Admin");
    }
}
