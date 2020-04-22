<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getParsedText() ?></p>
    <p>Автор: <?= "{$article->getAuthor()->getNickname()} {$article->getCreatedAt()}" ?></p>

    <?php if (!empty($user) && $user->isAdmin() ) {?>
        <a href="/articles/<?=$article->getId() ?>/delete">Delete</a>
    <?php }?>
<?php include __DIR__ . '/_comments.php'; ?>
<?php include __DIR__ . '/../footer.php'; ?>
