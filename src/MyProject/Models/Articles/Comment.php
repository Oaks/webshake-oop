<?php

namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Exceptions\InvalidArgumentException;

class Comment extends ActiveRecordEntity
{
    /** @var string */
    protected $comment;

    /** @var int */
    protected $articleId;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment) :void
    {
        $this->comment = $comment;
    }

    public function setAuthor(User $author) :void
    {
        $this->authorId = $author->getId();
    }

    public function getAuthor() : ?User
    {
        return User::getById($this->authorId);
    }

    public function setArticle(Article $article) :void
    {
        $this->articleId = $article->getId();
    }

    public function getArticle() :?Article
    {
        return Article::getById($this->articleId);
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public static function create(array $fields, Article $article, User $author): Comment
    {
        if (empty($fields['comment'])) {
            throw new InvalidArgumentException('Не передан текст комментария');
        }

        $comment = new Comment();

        $comment->setComment($fields['comment']);
        $comment->setAuthor($author);
        $comment->setArticle($article);
        $comment->save();

        return $comment;
    }

    public function update(array $fields): Comment
    {
        if (empty($fields['comment'])) {
            throw new InvalidArgumentException('Не передан текст комментария');
        }

        $this->setComment($fields['comment']);
        $this->save();

        return $this;
    }
    
    public function isCommentator(User $user): bool {
        return (int)$this->authorId === $user->getId();
    }
}
