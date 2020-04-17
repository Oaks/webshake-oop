<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Comment;
use MyProject\Services\Db;
use MyProject\View\View;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\AdminException;
use MyProject\Exceptions\InvalidArgumentException;
use ReflectionClass;

class ArticlesController extends AbstractController
{
    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        $this->view->renderHtml('articles/view.php', [ 'article' => $article ]);
    }

    public function edit(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $article->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function add(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $article = Article::createFromArray($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/add.php');
    }

    public function delete(int $articleId)
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!$this->user->isAdmin() ) {
            throw new AdminException("У вас нет прав администратора");
        }

        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        $article->delete();

        header('Location: /' , true);
        exit();
    }

    public function comments(int $articleId) {
        if ($_POST) {
            $article = Article::getById($articleId);

            if ($article === null) {
                throw new NotFoundException();
            }

            if ($this->user === null) {
                throw new UnauthorizedException();
            }
            /* $this->user = new User(); */
            /* $reflectionClass = new ReflectionClass('MyProject\Models\Users\User'); */
            /* $property = $reflectionClass->getProperty('id'); */
            /* $property->setAccessible(true); */
            /* $property->setValue($this->user, 1); */

            try {
                $comment = Comment::create($_POST, $article, $this->user);
            } catch(InvalidArgumentException $e) {
                $this->view->renderHtml("articles/view.php", [
                    'error' => $e->getMessage(),
                    'article' => $article
                ]);

                return;
            }
            header("Location: " . "/articles/{$article->getId()}/#comment_{$comment->getId()}");
            exit();
        }

        http_response_code(405);
    }

}
