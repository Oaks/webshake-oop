<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Comment;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\InvalidArgumentException;

class CommentsController extends AbstractController
{
    public function edit(int $commentId)
    {
        $comment = Comment::getById($commentId);
        
        if ($comment === null) {
            throw new NotFoundException();
        }

        if (empty($this->user) 
            || !($comment->isCommentator($this->user) || $this->user->IsAdmin())
        ) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $comment->update($_POST);
                header("Location: /articles/{$comment->getArticle()->getId()}#comment_{$comment->getId()}");
                exit();
            } catch(InvalidArgumentException $e) {
                $this->view->renderHtml("comments/edit.php", [
                    'error' => $e->getMessage(),
                    'comment' => $comment
                ]);

                return;
            }
        }

        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);
    }
}
