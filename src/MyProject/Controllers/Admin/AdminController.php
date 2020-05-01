<?php

namespace MyProject\Controllers\Admin;

use MyProject\Controllers\AbstractController;
use MyProject\View\adminView;

class AdminController extends AbstractController
{
    public function __construct() {
        $this->view = new adminView('admin/layouts/starter.html');
    }
    public function index()
    {
        /* $this->log($this->templates); */
        return $this->view->renderHtml('admin/starter-content.html', []);
    }
}
