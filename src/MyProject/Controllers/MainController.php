<?php

namespace MyProject\Controllers;

use MyProject\Services\Logger;
use MyProject\View\View;
use MyProject\Models\Articles\Article;

class MainController extends AbstractController
{
    use Logger;
    
    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php', ['name' => $name]);
    }
}
